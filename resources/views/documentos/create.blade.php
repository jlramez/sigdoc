@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Adjuntar documentos</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('documentos.store_atach', $expedientes->id) }}" enctype="multipart/form-data">
                        @csrf

                        

                        <div class="form-group ">
                            <label for="estatus" >{{ __('Tipo de documento:') }}</label>

                            <div class="">
                                  <select name="actuacion_id" id="actuacion_id" class="form-control" required> 
                                  <option value="">--Seleccione una opción--</option> 
                                    @foreach ($actuaciones as $act) 
                                      <option value="{{ $act->id }}"> <b>{{ $act->clave }}</b>  {{ $act->Nombre }}</option required>
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
                            <label for="documento" >{{ __('Agregar archivo(s) adjunto(s) para certificar:') }}</label>
                                <input id="documento" type="file"  name="documento[]" multiple required>
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
            <a href="{{route('asignadocumentos.show', $expedientes->id)}}" class="btn btn-primary"><i class="fas fa-backward"></i> Regresar</a>
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection