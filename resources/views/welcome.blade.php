<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
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
                    <img src="../img/img_estrados.jpg"></img>
                </div>
                <div class="title xs-b-md">
                    Estrados en línea
                </div>
                <div class="links">
                    <a href="#">Conoce las actuaciones de cada medio de impugnación.</a>                  
                </div>
                <div class="links">
                    <table>
                        <tbody>
                                <tr>
                                    <td>
                                        
                                    </td>                               
                                </tr>
                               
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/1')}}">JDC. Juicio para la Protección de los Derechos Político Electorales del Ciudadano</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                    <div class="links">
                                            <a href="{{url('/jdc/2')}}">RR. Recurso de Revisión</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/3')}}">JNE. Juicio de Nulidad Electoral</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                    <div class="links">
                                            <a href="{{url('/jdc/4')}}">JRL. Juicio de Relaciones Laborales</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                    <div class="links">
                                            <a href="{{url('/jdc/5')}}">AG. Asuntos Generales</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/6')}}">PES. Procedimiento Especial Sancionador</a>                  
                                        </div>
                                    </td>
                                </tr>                          
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/7')}}">JE. Juicio Electoral</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/8')}}">LSP. Listas de asuntos a tratar en sesión pública</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/9')}}">ASP. Acta de Sesión Pública</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/10')}}">ACG. Acuerdos Generales</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/11')}}">RC. Ratificaciones de Convenio</a>                  
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src="../img/folder.png" width="60" height="40">
                                    </td>
                                    <td align="left">
                                        <div class="links">
                                            <a href="{{url('/jdc/12')}}">CFDVEGE. Dictamen de la Elección de Gobernador</a>                  
                                        </div>
                                    </td>
                                </tr>
                              
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
