<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $conf = config('custom.admin');
        return $this->view('emails.register')
            ->from($conf['email'], $conf['first_name'].' '.$conf['last_name'])
            ->subject('Успешная регистрация на сайте ads.loc')
            ->with([ 'password' => $this->data['password'] ]);
    }
}
