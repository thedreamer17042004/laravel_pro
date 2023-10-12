<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $order;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $order, $name)
    {
        //
        $this->cart = $cart;
        $this->order = $order;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->view('email.order')
        ->with([
            'cart' => $this->cart,
            'order' => $this->order,
            'name' => $this->name
        ]);
    }

    
}
