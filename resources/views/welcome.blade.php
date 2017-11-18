<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>zlec.to</title>

        <!-- Css -->
        <link href="/css/app.css" rel="stylesheet"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app">
            <home></home>
        </div>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
