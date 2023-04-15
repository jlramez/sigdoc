@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">

             
                <div class="card-header"><h3>Accesos al sistema</h3>                        
                            {{ Form::open(['route' => 'accesos.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}   
                            {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Fecha (yyyy-mm-dd)']) }}                         
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
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>IP</th>
                                <th>Ingreso</th>
                                <th>Herramientas</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach($accesos as $acc)
                                <tr>
                                    <td>
                                        {{$acc->id}}
                                    </td>
                                    <td>
                                        {{$acc->user->name}}
                                    </td>
                                    <td>
                                        {{$acc->user->email}}
                                    </td>
                                    <td>
                                        {{$acc->ip}}
                                    </td>
                                    <td>
                                        {{$acc->last_login}}
                                    </td>
                                <td width="350px">

                                    @canany(['admin'])    
                                        <a href="{{ route('destroy_acceso',$acc->id) }}" class="btn btn-outline-danger" onclick="return confirm('¿Realmente desea elimiar el regisro?')" title="Eliminar expediente"><i class="fas fa-trash-alt"></i> Eliminar</a>                       
                                    @endcanany 
                                </td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                        </table>

                    </div>
                <div class="card-footer" align="right">
                {{$accesos->links()}}
               
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection