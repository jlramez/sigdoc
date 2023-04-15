<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>.:Estrados en línea .- TRIJEZ.:</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
                .btn-trijez {
            color: #cccccc;
            background-color: #367068;
            border-color: #367068;
            }
            .btn-trijez:hover {
            color: #fff;
            background-color: #367068;
            border-color: #367068;
            }
            .card-header-trijez {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(54, 112, 104, 0.65);
            border-bottom: 1px solid rgba(54, 112, 104, 0.125);
            color: #ffffff
}
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
                    <img src="/img/img_estrados.jpg"></img>
                </div>
                <div class="title xs-b-md">
                Estrados en línea
                </div>
                <div class="links">
                <div class="card-header"><h3>Documentos de las actuaciones del expediente <b>{{$expediente->folio}}</b></h3></div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif 

    <table class="table tablestreipped">
    <thead align="center">
        <tr >
            <th>Nombre del documento</th>
            <th>Actuación</th>
            <th >Herramientas</th>
        </tr>
    </thead>
    <tbody align="center">
        @foreach($ad as $adoc)
            <tr>
                <td align="center">
                {{$adoc->documentos->nombre_dcto}}
                </td>
            
            <td>
            <h6>{{$adoc->documentos->actuaciones->Nombre}}</h6>
             </td>
            <td width="350px">
            <a href="/storage/estrados/2021/{{$expediente->folio}}/{{$adoc->documentos->nombre_dcto}}" target="_blank"class="btn btn-trijez"><i class="fas fa-file-pdf"></i> Descargar</a>
                             
            </td>
            
            </tr>
        @endforeach
    </tbody>
    </table>

</div>
<div class="card-footer" align="center">
Copyrigth 2021. Tribunal de Justicia Electoral del Estado de Zacatecas
</div>
            </div>
        </div>
    </body>
</html>