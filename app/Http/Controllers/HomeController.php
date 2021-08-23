<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\CategoryText;
use App\Models\Computer;
use App\Models\Box;
use App\Models\Contact;
use App\Models\Subject;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
    }


    public function index()
    {
        $header = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'header')->first();

        $about_1 = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'about_1')->first();

        $about_2 = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'about_2')->first();

        $welcome = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'welcome')->first();

        $advantages = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'advantages')->first();

        $services = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'services')->first();


        $dangerous_1 = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'dangerous_1')->first();

        $dangerous_2 = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'dangerous_2')->first();

        $dangerous_3 = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'dangerous_3')->first();

        $dangerous_4 = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'dangerous_4')->first();

        $contact_title = CategoryText::where('status' , "1")->with(['text' => function ($query) {
            $query->with(['translate' => function($q){
                $q->where('slug',  App::getLocale());
            }]);
        }])->where('name' , 'contact_title')->first();

        $contact = Contact::where('status', '1')->with(['translate' =>  function($query){
            $query->where('slug',  App::getLocale());
        }])->first();
        return view('user.index', compact('header','about_1', 'about_2', 'welcome', 'advantages', 'services',
                                                        'dangerous_1', 'dangerous_2', 'dangerous_3', 'dangerous_4', 'contact_title', 'contact'));
    }
    public function order()
    {
        $boxes = Box::where('status', 1)->get();
        return view('user.order', compact('boxes'));
    }

    public function getProfile()
    {
        return view('auth.profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route('profile')->with('success', 200);

    }
}
