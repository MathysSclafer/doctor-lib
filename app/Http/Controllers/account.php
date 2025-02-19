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

    public function medecin(request $request){
        $user = Auth::user();
        $user -> role = 'medecin';
        $user -> save();
        return view('profil', compact('user'));
    }

    public function client(){
        $user = Auth::user();
        $user -> role = 'patient';
        $user -> save();
        return view('profil', compact('user'));
    }
    public function name(request $request){
        $user = Auth::user();
        $user -> name = $request -> name;
        $user -> save();
        return view('profil', compact('user'));
    }
    public function first_name(request $request){
        $user = Auth::user();
        $user -> first_name = $request -> first_name;
        $user -> save();
        return view('profil', compact('user'));
    }

    public function age(request $request){
        $user = Auth::user();
        $user -> age = $request -> age;
        $user -> save();
        return view('profil', compact('user'));
    }

    public function email(request $request){
        $user = Auth::user();
        $user -> email = $request -> email;
        $user -> save();
        return view('profil', compact('user'));
    }
}
