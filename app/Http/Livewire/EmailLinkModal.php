<?php

namespace App\Http\Livewire;

use App\Mail\ShortUrl;
use App\Models\Link;
use Illuminate\Support\Facades\Mail;
use LivewireUI\Modal\ModalComponent;

class EmailLinkModal extends ModalComponent
{
    public $email;

    public $link;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function send()
    {
        $this->validate();

        $link = Link::find($this->link);

        Mail::to($this->email)->send(new ShortUrl($link));

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.email-link-modal');
    }
}
