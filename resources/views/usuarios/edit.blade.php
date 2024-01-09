@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Actualización de un nuevo usuario</h1>
<!--Condición para mostrar el mensaje al guardar un registro-->
    @if($message = Session::get('mensaje'))
        <script>
            Swal.fire({
                title: "Exitos",
                text: "{{$message}}",
                icon: "success"
            });
        </script>
    @endif

<div class="row">
  <div class="col-md-8">
   <div class="card card-outline card-success">

    <div class="card-header">
         <h3 class="card-title"><b>Llene los datos del usuario</b></h3>

    </div>

    <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{url('/usuarios', $usuarios->id)}}">
                        @csrf
                        {{method_field('PATCH')}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuarios->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuarios->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Repita contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{url('/usuarios')}}" class="btn btn-danger">Atrás</a>
                                <button type="submit" class="btn btn-primary">
                                    Actualizar Usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
  </div>

  </div>

  </div>

</div>
 
@endsection