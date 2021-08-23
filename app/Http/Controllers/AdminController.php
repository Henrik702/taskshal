<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Computer;
use App\Models\Box;
use App\Models\Delivery;
use App\Models\Pickup;
use App\Models\Subject;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
    }


    public function index()
    {
    }
    public function pickupPrice(Request $request, Pickup $pickup)
    {
        $pickup = $pickup->first();
        if(isset($request->price)){
            if($pickup){
                $pickup->price = $request->price;
                $pickup->save();
            }else{
                $pickup = new Pickup();
                $pickup->price = $request->price;
                $pickup->save();
            }
        }

        return view('price.pickup', compact('pickup'));
    }

    public function deliveryPrice(Request $request, Delivery $delivery)
    {
        $delivery = $delivery->first();
        if(isset($request->price)){
            if($delivery){
                $delivery->price = $request->price;
                $delivery->save();
            }else{
                $delivery = new Delivery();
                $delivery->price = $request->price;
                $delivery->save();
            }
        }

        return view('price.delivery', compact('delivery'));
    }


}
