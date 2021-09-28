<?php

namespace App\Mail;

use App\Models\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShortUrl extends Mailable
{
    use Queueable, SerializesModels;

    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('someone@pawprintvets.com')
            ->subject('Your link from Paw Print Vets')
            ->markdown('emails.send-short-url');
    }
}
