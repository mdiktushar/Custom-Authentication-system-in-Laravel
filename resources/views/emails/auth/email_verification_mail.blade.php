@component('mail::message')

Hello Mr. {{ $user->last_name }}

@component('mail::button', ['url' => ''])
Click hear to verify your email address
@endcomponent

<p>Or copy paste the following link on your web browser to verify your email address.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
