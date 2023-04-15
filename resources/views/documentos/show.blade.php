@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Documentos de las actuaciones del expediente <b>{{$documento->folio}}</b></h3></div>

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
                            @foreach($documentos as $doc)
                                <tr>
                                    <td>
                                    {{$doc->nombre_dcto}}
                                    </td>
                                
                                <td>
                                <h6>{{$doc->Nombre}}</h6>
                                 </td>
                                <td width="350px">
                                <a href="/storage/estrados/2021/{{$doc->expedientes_id}}/{{$doc->nombre_dcto}}" target="_blank"class="btn btn-outline-primary"><i class="fas fa-file-pdf"></i> Descargar</a>
                                <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Eliminar</a>                        
                                </td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                        </table>

                    </div>
                <div class="card-footer" align="right">
                    <a href="{{route ('expedientes.create')}}" class="btn btn-success"><i class="fas fa-plus">  </i> Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection