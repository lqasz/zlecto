@component('mail::message')
Witaj {{$first_name}},
	<br/><br/>

Aby aktywować swoje konto na <a href="http://10.40.10.10">zlec.to</a>, kliknij:

@component('mail::button', ['url' => 'http://10.40.10.10/register/{{$token}}'])
Zarejestruj się!
@endcomponent

Zespół,{{ config('app.name') }}
@endcomponent
