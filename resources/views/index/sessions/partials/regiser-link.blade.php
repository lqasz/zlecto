@component('mail::message')

{{ $first_name }},

@component('mail::button', ['url' => 'http://10.40.10.10/register/'.{{$token}}])
Zarejestruj
@endcomponent

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent
