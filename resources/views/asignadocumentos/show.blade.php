@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Documentos de las actuaciones del expediente <b>{{$asignadocumento->folio}}</b></h3></div>

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
                                    <td>
                                    {{$adoc->documentos->nombre_dcto}}
                                    </td>
                                
                                <td>
                                <h6>{{$adoc->documentos->actuaciones->Nombre}}</h6>
                                 </td>
                                <td width="350px">
                                <a href="/storage/estrados/2021/{{$asignadocumento->folio}}/{{$adoc->documentos->nombre_dcto}}" target="_blank"class="btn btn-outline-primary"><i class="fas fa-file-pdf"></i> Descargar</a>
                                <a href="{{route('documentos.edit', $adoc->documentos_id)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Editar</a> 
                                @canany(['admin']) 
                                    <a href="{{ url('asignadocumentos/'.$adoc->id.'/delete') }}" class="btn btn-outline-danger" onclick="return confirm('¿Realmente desea elimiar el regisro?')" title="Eliminar expediente"><i class="fas fa-trash-alt"></i> Eliminar</a>                       
                                @endcanany
                                </td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                        </table>

                    </div>
                <div class="card-footer" align="right">
                <a href="{{route ('expedientes.index')}}" class="btn btn-primary"><i class="fas fa-backward">  </i> Regresar</a>
                    <a href="{{route ('expedientes.create')}}" class="btn btn-success"><i class="fas fa-plus">  </i> Nuevo Expediente</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

