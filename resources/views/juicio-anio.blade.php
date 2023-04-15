<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>.:Estrados en línea .- TRIJEZ.:</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
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
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"></a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="img-fluid small">
                    <img src="../../img/img_estrados.jpg"></img>
                </div>
                <div class="title xs-b-md">
                    Estrados en línea
                </div>
                <div class="links">
                    <a href="#">{{$nombre_juicio}}</a>                  
                </div>
                    <table>
                            <tbody>
                                 <tr>
                                    <td>
                                    <a href="{{ url('/jdc/'.$id_juicios) }}"><img src="../../img/folder_up.png" width="60" height="50"></a> 
                                    </td>                               
                                </tr>
                                 @foreach($expedientes as $exp)
                                        <tr>
                                            <td>
                                                
                                            </td>                               
                                        </tr>
                                        <tr>
                                            <td>
                                            <img src="../../img/folder.png" width="60" height="40">
                                            </td>
                                            <td align="left">
                                                <div class="links">
                                                    <a href="{{ route('show_jdc', $exp->id) }}">{{$exp->folio}}</a>                  
                                                </div>
                                            </td>
                                    </tr>
                                    @endforeach                                    
                            </tbody>
                    </table>
                    <div class="card-footer" align="right">
                        {{$expedientes->links()}}
                    </div>        
            </div>
           
        </div>
    </body>
</html>
