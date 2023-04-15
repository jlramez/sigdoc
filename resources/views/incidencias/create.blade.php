@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Crear Incidencias</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('incidencias.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group ">
                            <label for="estatus" >{{ __('Expediente origen:') }}</label>

                            <div class="">
                                  <select name="exp_id" id="exp_id" class="form-control" required> 
                                  <option value="">--Seleccione una opción--</option> 
                                    @foreach ($rsjuicios as $juicio) 
                                      <option value="{{ $juicio->id }}"><b>{{$juicio->nombre}}</b> </option required>
                                     @endforeach
                                </select> 
                                @error('juicio_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--<div class="form-group ">
                            <label for="folio_inc" >{{ __('Folio incidencia:') }}</label>

                            <div class="">
                                <input id="folio_inc" type="text" class="form-control @error('folio_inc') is-invalid @enderror" name="folio_inc" value="{{ old('folio_inc') }}" required autocomplete="folio_inc">

                                @error('folio_inc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->
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