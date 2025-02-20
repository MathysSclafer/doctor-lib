<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocation;



class account extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    public function name(request $request){
        $user = Auth::user();
        $user -> name = $request -> name;
        if(is_null($request -> name)){
            return view('profil', compact('user'));
        }
        $user -> save();
        return view('profil', compact('user'));
    }
    public function first_name(request $request){
        $user = Auth::user();
        if(is_null($request -> first_name)){
            return view('profil', compact('user'));
        }
        $user -> first_name = $request -> first_name;
        $user -> save();
        return view('profil', compact('user'));
    }

    public function age(request $request){
        $user = Auth::user();
        if(is_null($request -> age)){
            return view('profil', compact('user'));
        }
        $user -> age = $request -> age;
        $user -> save();
        return view('profil', compact('user'));
    }

    public function email(request $request){
        $user = Auth::user();
        if(is_null($request -> email)){
            return view('profil', compact('user'));
        }
        $user -> email = $request -> email;
        $user -> save();
        return view('profil', compact('user'));
    }
    public function area(request $request){
        $user = Auth::user();
        if(is_null($request -> area)){
            return view('profil', compact('user'));
        }
        $user -> area = $request -> area;
        $user -> save();
        return view('profil', compact('user'));
    }

    public function city(request $request){
        $user = Auth::user();
        if(is_null($request -> city)){
            return view('profil', compact('user'));
        }
        $user -> city = $request -> city;
        $user -> save();
        return view('profil', compact('user'));
    }
}
