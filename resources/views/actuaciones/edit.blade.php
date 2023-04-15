
<style>

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Editar Actuaciones</h3></div>

                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                    <form method="POST" action="{{ route('actuaciones.update', $actuacione->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        

                        <div class="form-group ">
                            <label for="estatus" >{{ __('Nombre de la Actuación:') }}</label>

                            <div class="">
                            <input id="actuacion_nombre" name="actuacion_nombre" type="text" class="form-control @error('actuacion_nombre') is-invalid @enderror" name="actuacion_nombre" value="{{ old('actuacion_nombre', $actuacione->Nombre) }}" required autocomplete="actuacion_nombre" required>
                                @error('actuacion_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label for="estatus" >{{ __('Clave:') }}</label>

                            <div class="">
                            <input id="clave" type="text" class="form-control @error('clave') is-invalid @enderror" name="clave" value="{{ old('clave',$actuacione->clave) }}" required autocomplete="clave" required>
                                @error('clave')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="res_act" >{{ __('¿Activar?') }}</label>

                            <div class="form-check form-switch">
                            <label class="switch">
                                    <input name="activo" id="activo" type="checkbox">
                                    <span class="slider"></span>
                            </label>
                            
                            </div>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    
                </div>
                <div class="card-footer" align="right">
            <a href="{{route('actuaciones.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Regresar</a>
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection