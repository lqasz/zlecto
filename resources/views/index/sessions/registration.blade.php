@extends('admin.layouts.layout-login')

@section('scripts')
    <script src="/assets/admin/js/sessions/register.js"></script>
@stop

@section('content')
    @include('index.sessions.forms.register-form')
@stop
