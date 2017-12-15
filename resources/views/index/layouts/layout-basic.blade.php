<!DOCTYPE html>
<html>
<head>
    <title>Laraspace - Laravel Admin</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <script src="{{asset('/assets/admin/js/core/pace.js')}}"></script>
    <link href="{{ mix('/assets/admin/css/laraspace.css') }}" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('index.layouts.partials.favicons')
    @yield('styles')
</head>
<body class="layout-default skin-default">
    @include('index.layouts.partials.laraspace-notifs')

    <div id="app" class="site-wrapper">
        <div class="mobile-menu-overlay"></div>

        @yield('content')

        @include('index.layouts.partials.footer')
    </div>

    <script src="{{mix('/assets/admin/js/core/plugins.js')}}"></script>
    <script src="{{asset('/assets/admin/js/demo/skintools.js')}}"></script>
    <script src="{{mix('/assets/admin/js/core/app.js')}}"></script>
    @yield('scripts')
</body>
</html>
