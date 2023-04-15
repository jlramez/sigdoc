@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
             <br>
            <div class="card">
             
                <div class="card-header"><h3>Editar documentos</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('documentos.update', $documento->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        

                        <div class="form-group ">
                            <label for="actuacion" >{{ __('Actuación:') }}</label>

                            <div class="">
                                <input id="actuacion" type="text" class="form-control @error('actuacion') is-invalid @enderror" name="actuacion" value="{{ old('actuacion', $documento->actuaciones->Nombre) }}" required autocomplete="actuacion" disabled>

                                @error('folio')
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
            
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection