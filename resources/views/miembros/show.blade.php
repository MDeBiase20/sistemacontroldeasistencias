@extends('layouts.admin')

@section('content')
<div class="content" style="margin-left: 20px">
    <h1>Datos del miembros</h1>

<div class="row">

    <div class="col-md-11">
            
        <div class="card card-outline card-primary">

            <div class="card-header">
                 <h3 class="card-title"><b>Datos del Miembro</b></h3>
            </div>

    <div class="card-body">
            <div class="row">

            <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres y apellidos</label>
                                <input type="text" name="nombre_apellido" value="{{$miembros->nombre_apellido}}" class="form-control" disabled>
                            </div>
                    </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" value="{{$miembros->email}}" name="email" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="number" value="{{$miembros->telefono}}" name="telefono" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" value="{{$miembros->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Género</label>
                        <select name="genero" class="form-control" id="" disabled>

                        @if($miembros->genero == 'Masculino')
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        @else
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            
                        @endif    
                            
                        </select>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ministerio</label>
                        <input type="text" value="{{$miembros->ministerio}}" name="ministerio" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <input type="text" value="{{$miembros->direccion}}" name="direccion" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Fotografía</label>
                <br>
                @if($miembros->fotografia == '')
                    @if($miembros->genero == 'Masculino')
                        <img src="{{url('images/avatar-man.jpg')}}" width="220px" alt="">
                    @else
                        <img src="{{url('images/avatar-woman.jpg')}}" width="220px" alt="">
                    @endif   
                @else
                        <img src="{{asset('storage').'/'. $miembros->fotografia}}"width="220px" alt="">
                @endif   
                
            </div>
        </div>

</div>

    </div>

        </div>
    </div>

</div>
    
</div>
    
@endsection    