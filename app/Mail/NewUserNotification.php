<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('mearani@gmail.com', 'Mailtrap')
            ->subject('Register new Company')
            ->markdown('mails.exmpl')
            ->with([
                'name' => 'Thank you for Registeration',
                'link' => 'https://mailtrap.io/inboxes'
            ]);
    }
}
