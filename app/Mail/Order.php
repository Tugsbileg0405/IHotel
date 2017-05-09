<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Order extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $rooms;
    public $price;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$rooms,$price,$user)
    {
        $this->order = $order;
        $this->rooms = $rooms;
        $this->price = $price;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@ihotel.mn')
            ->subject('Захиалгын мэдээлэл')->view('order.email')->with([
                'order' => $this->order,
                'rooms' => $this->rooms,
                'price' => $this->price,
                'user' => $this->user,
            ]);
    }
}
