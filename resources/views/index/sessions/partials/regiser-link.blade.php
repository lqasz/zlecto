<!-- @component('mail::message', ['firt_name' => $first_name, 'token' => $token])

{{$first_name}},

@component('mail::button', ['url' => ])
Zarejestruj
@endcomponent

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent -->

<div>
	{{$first_name}}

	<a href="http://10.40.10.10/register/'.{{$token}}" >Zarejestruj się!</a>
</div>