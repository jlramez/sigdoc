@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Crear Expedientes</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('expedientes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group ">
                            <label for="estatus" >{{ __('Tipo de Juicio:') }}</label>

                            <div class="">
                                  <select name="juicio_id" id="juicio_id" class="form-control" required> 
                                  <option value="">--Seleccione una opción--</option> 
                                    @foreach ($rsjuicios as $juicio) 
                                      <option value="{{ $juicio->id }}"><b>{{$juicio->Clave}}</b> {{ $juicio->Nombre }}</option required>
                                     @endforeach
                                </select> 
                                @error('juicio_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="estatus" >{{ __('Año:') }}</label>

                            <div class="">
                                  <select name="year" id="year" class="form-control" required> 
                                
                                  <option value="">--Seleccione una opción--</option> 
                                      <option value="2021"><b>2021</option>
                                      <option value="2020"><b>2020</option>
                                      <option value="2019"><b>2019</option>
                                      <option value="2018"><b>2018</option>
                                      <option value="2017"><b>2017</option>
                                      <option value="2016"><b>2016</option>
                                </select> 
                                @error('juicio_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    
                </div>
            <div class="card-footer" align="right">
            <a href="{{route('expedientes.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Regresar</a>
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection