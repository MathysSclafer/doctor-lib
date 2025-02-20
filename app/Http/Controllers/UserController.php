<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeNotation(StoreRatingRequest $data){

        Rating::create([
            'user_id' => $data['user_id'],
            'rating' => $data['rating'],
        ]);

        $this->updateNotation($data['user_id']);
    }

    public function updateNotation($doctor_id)
    {
        $averageRating = Rating::where('user_id', $doctor_id)->avg('rating');

        User::where('id', $doctor_id)->update(['rating' => $averageRating]);

        return view('search');
    }
}
