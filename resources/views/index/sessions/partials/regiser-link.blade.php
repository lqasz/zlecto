@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'http://10.40.10.10/register'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
