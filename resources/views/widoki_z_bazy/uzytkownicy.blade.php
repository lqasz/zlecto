<!-- welcome.blade.php -->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>zlec.to</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div className="container">
            <nav className="navbar navbar-default">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <a className="navbar-brand" href="/">Główna</a>
                    </div>
                    <ul className="nav navbar-nav">
                        <li><a href="/ogloszenia">Ogloszenia</a></li>
                        <li><a href="/uzytkownicy">Użytkownicy</a></li>
                        <li><a href="/opinie">Opinie</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div id="example">
            <span>Kolumny w tabeli uzytkownicy:</span>
            <ol>
                @foreach($kolumny as $kolumna)
                    <li>{{$kolumna}}</li>
                @endforeach
            </ol>
        </div>
        <!-- <script src="{{asset('js/app.js')}}" ></script> -->
    </body>
</html>