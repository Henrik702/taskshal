<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Product;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('product.index', compact('products'));
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allProducts()
    {
        $products = Product::get();
        return view('product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Product $product)
    {
        try {
            $request->validate([
                'title' => 'required',
                'pdf' => 'required|mimes:pdf|max:2048'

            ]);

            $pdf = $this->fileUpload($request);
            $product -> user_id = Auth::id();
            $product -> title = $request->title;
            $product -> pdf = $pdf;
            $product -> save();
            return redirect()->route('product.index')->with('success', 200);
        } catch (Exception $e) {
            return response()->json([
                'data' => [
                    'status' => 500,
                    'message' => 'Error',
                ],
            ], 500);
        }
    }


    public function fileUpload($req){

        $fileName = time().'.'.$req->pdf->extension();
        $req->pdf->move(public_path('pdf'), $fileName);
        return $fileName;
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }
    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product )
    {
        try {
            $request->validate([
                'title' => 'required'
            ]);

            if($request->pdf){
                $pdf = $this->fileUpload($request);
                $product -> pdf = $pdf;

            }

            $product -> title = $request->title;
            $product->save();
            return redirect()->route('product.index')->with('success', 200);

        } catch (Exception $e) {
            return response()->json([
                'data' => [
                    'status' => 500,
                    'message' => 'Error',
                ],
            ], 500);
        }
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'data' => [
                'status' => 200,
                'message' => 'deleted',
            ],
        ], 200);
    }
}
