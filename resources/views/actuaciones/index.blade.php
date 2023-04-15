@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Actuaciones</h3>            
                            {{ Form::open(['route' => 'actuaciones.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}   
                            {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Escriba actuación']) }}                         
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
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Clave</th>
                                <th>Estátus</th>
                                <th>Herramientas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actuaciones as $act)
                                <tr>
                                    <td>
                                    {{$act->Nombre}}
                                    </td>
                                    <td>
                                    {{$act->clave}}
                                    </td>
                                    @if ( $act->activo==1)
                                    <td>
                                    <span class="badge badge-success">Activada</span>
                                    </td>
                                    @endif
                                    @if ( $act->activo==0)
                                    <td>
                                    <span class="badge badge-secondary">Desactivada</span>
                                    </td>
                                    @endif
                                    <td width="250px">
                                        <!--<a href="#" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Editar</a>-->
                                        <a href="{{route('actuaciones.edit', $act->id)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Editar</a>
                                        @canany(['admin']) 
                                        <a href="{{ route('destroy_actuacion',$act->id) }}" class="btn btn-outline-danger" onclick="return confirm('¿Realmente desea elimiar el regisro?')" title="Eliminar expediente"><i class="fas fa-trash-alt"></i> Eliminar</a>                         
                                        @endcanany
                                    </td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                        </table>

                    </div>
                <div class="card-footer" align="right">
                    {{$actuaciones->links()}}
                    <a href="{{route ('actuaciones.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Nueva</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection