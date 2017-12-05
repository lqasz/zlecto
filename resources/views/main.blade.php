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
        <link href="https://fonts.googleapis.com/css?family=Dosis:400,800&amp;subset=latin-ext" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded sticky-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="navbar-brand" href="/">zlec.to</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-outline-primary mr-sm-2" data-toggle="modal" data-target="#login-modal">Zaloguj</button>
                    <a href="/rejestracja" class="btn btn-primary my-2 my-sm-0">Zarejestruj</a>
                </form>
            </div>
        </nav>

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Zaloguj się do zlec.to</h1><br>
                <form>
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Hasło">
                    <input type="submit" name="login" class="login loginmodal-submit btn" value="Zaloguj">
                </form>

                <div class="login-help">
                    <a class="btn btn-primary btn-sm" href="/rejestracja">Zarejestruj</a>
                    <a class="btn btn-link" href="/v1/zapomniane">Nie pamiętam hasła</a>
                </div>
                </div>
            </div>
        </div>

        <div id="app">
            <template></template>
        </div>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
