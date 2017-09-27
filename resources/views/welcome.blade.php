<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
            
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
            
                background-image: url({{asset('img/bg01.jpeg')}});
                background-color: white;
                background-repeat: no-repeat;
                background-size: cover;
                color: #022e44;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #022e44;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ url('/login') }}">Inicio de sesión</a>
                        <a href="{{ url('/register') }}">Formulario de registro</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="font-size: 1.5em;">
                    <img src="{{asset('img/header-logo.png')}}" /><br/>
                    Plataforma para proceso de tala/poda de arboles aislados<br>
                    y denuncias ciudadanas.
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentacion</a>
                    <a href="http://corponor.gov.co/">Corponor</a>
                    <a href="http://www.minambiente.gov.co/">Minambiente</a>
                    <br>
                    <a href="https://es-la.facebook.com/corponor.nortedesantander/"  />Siguenos</a>
                    <a href="https://es-la.facebook.com/corponor.nortedesantander/" title="Facebook"><img src="img/Facebook.png" alt="Facebook" />
                    <a href="https://twitter.com/iniciarsesion?lang=es/" title="Twitter"><img src="img/Twitter.png" alt="Twitter" /></a>
                                       
                </div>
            </div>
        </div>
    </body>
</html>
