<?php

namespace App\Mail;

use App\Order; // nes maila siusim su order informacija
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

		public $order; // uzsakymo informacija

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
      $this->order = $order; // pridedam ir i konstruktoriu
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject('Order #' . $this->order->id)->view('emails.order.shipped'); // cia aprasyti kelia iki html sablono tam tikro sukurta
    }
}
