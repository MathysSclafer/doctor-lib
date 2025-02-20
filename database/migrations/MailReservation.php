<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
use Queueable, SerializesModels;

public $reservation; // Vous pouvez passer l'objet de réservation ici

/**
* Create a new message instance.
*
* @param $reservation
* @return void
*/
public function __construct($reservation)
{
$this->reservation = $reservation;
}

/**
* Build the message.
*
* @return $this
*/
public function build()
{
return $this->subject('Confirmation de votre réservation')
->view('emails.reservation_confirmation');
}
}
