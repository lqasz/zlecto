@extends('index.layouts.layout-basic')

@section('scripts')
    <script src="{{asset('/assets/index/js/pages/wizard.js')}}"></script>
@stop

@section('content')
    @include('index.sessions.partials.register-form')
@stop
