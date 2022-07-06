@component('mail::message')

Hello Mr. {{ $user->last_name }}
Verification Code: {{ $user->verification_code }}

@component('mail::button', ['url' => "http://127.0.0.1:8000/auth/verify-email/$user->verification_code/$user->email"])
Click hear to verify your email address
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
