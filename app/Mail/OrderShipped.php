<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * OrderShipped constructor.
     *
     * @param $data
     */
    public function __construct( $data ) {
        $this->data  = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'])
                    ->view('site.email', ['name' => $this->data['name'], 'text' => $this->data['text']]);
    }
}
