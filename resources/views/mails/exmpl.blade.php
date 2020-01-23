@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
you are successfulyy Register to Our website

Click below to start working right now
@component('mail::button', ['url' => $link])
Go to your inbox
@endcomponent
Sincerely,  
Mailtrap team.
@endcomponent