@component('mail::message')
Hello Mailtrap team,  {{-- use double space for line break --}}
{{$detail}}

Click below to start working right now
@component('mail::button', ['url' => $link])
Go to your inbox
@endcomponent
Sincerely,  

From **{{$name}}**.
@endcomponent