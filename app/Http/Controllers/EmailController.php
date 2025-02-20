<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail(){
        $toEmail = 'zinacke@gmail.com';
        $message = 'samedi a 19H99 merci ';
        $subject = 'Salut Salut on vous confirme votre place avec MR trucmuch';

        $reponse = mail::to($toEmail)->send(new WelcomeEmail($message, $subject));
        dd($reponse);
    }
}
