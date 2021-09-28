@component('mail::message')
Hi there,

You've been sent a link by Paw Print Vets! You can find the details of the link below, and you can visit the link by clicking the button below.

@component('mail::button', ['url' => $link->shortUrl])
Visit Link
@endcomponent

Thanks,<br>
Paw Print Vets
@endcomponent
