@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">

             
                <div class="card-header"><h3>Expedientes</h3>                        
                            {{ Form::open(['route' => 'expedientes.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}   
                            {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Escriba el folio']) }}                         
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"><i class="fas fa-search"></i></span>
                                    </button>
                                </div>                           
                            {{ Form::close() }}
                </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif 

                        <table class="table tablestreipped">
                        <thead align="center">
                            <tr>
                                <th>#</th>
                                <th>Folio</th>
                                <th>Herramientas</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach($expedientes as $exp)
                                <tr>
                                    <td>
                                        {{$exp->id}}
                                    </td>
                                    <td>
                                        {{$exp->folio}}
                                    </td>
                                <td width="450px">
                                        <a href="{{route('documentos.atach', $exp->id)}}" class="btn btn-outline-primary"><i class="fas fa-paperclip"></i> Adjuntar</a>
                                        <a href="{{route('asignadocumentos.show', $exp->id)}}" class="btn btn-outline-success"><i class="fas fa-eye"></i> Mostrar</a>
                                        <a href="{{route ('add_incidencia', $exp->id)}}" class="btn btn-outline-info"><i class="fas fa-plus">  </i> incidencia</a> 
                                    @canany(['admin'])    
                                        <a href="{{ route('destroy_expediente',$exp->id) }}" class="btn btn-outline-danger" onclick="return confirm('¿Realmente desea elimiar el regisro?')" title="Eliminar expediente"><i class="fas fa-trash-alt"></i> Eliminar</a>                       
                                    @endcanany 
                                </td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                        </table>

                    </div>
                <div class="card-footer" align="right">
                {{$expedientes->links()}}
                
                <a href="{{route ('actuaciones.create')}}" class="btn btn-success"><i class="fas fa-plus">  </i> Nueva actuacion</a>
                    <a href="{{route ('expedientes.create')}}" class="btn btn-success"><i class="fas fa-plus">  </i> Nuevo expediente</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection