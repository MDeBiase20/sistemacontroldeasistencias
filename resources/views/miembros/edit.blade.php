@extends('layouts.admin')

@section('content')
<div class="content" style="margin-left: 20px">
    <h1>Editar información de los miembros</h1>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach

<div class="row">

    <div class="col-md-11">
            
        <div class="card card-outline card-success">

            <div class="card-header">
                 <h3 class="card-title"><b>Editar Miembros</b></h3>
            </div>

    <div class="card-body">
        <!--el multipart/form-data sirve para poder guardar imágenes a la base de datos-->
        <form action="{{url('/miembros',$miembros->id)}}" method= "POST" enctype ="multipart/form-data">
            @csrf 
            <!--Método PATCH para actualizar los registros de la tabla -->
            {{method_field('PATCH')}}
            <div class="row">

            <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres y apellidos</label> <b>*</b>
                                <input type="text" name="nombre_apellido" value="{{$miembros->nombre_apellido}}" class="form-control" required>
                            </div>
                    </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Email</label> <b>*</b>
                        <input type="email" name="email" value="{{$miembros->email}}" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Teléfono</label> <b>*</b>
                        <input type="number" name="telefono" value="{{$miembros->telefono}}" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Fecha de nacimiento</label> <b>*</b>
                        <input type="date" name="fecha_nacimiento" value="{{$miembros->fecha_nacimiento}}" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Género</label>
                        <select name="genero" class="form-control" id="">

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
                        <label for="">Ministerio</label> <b>*</b>
                        <input type="text" name="ministerio" value="{{$miembros->ministerio}}" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dirección</label> <b>*</b>
                        <input type="text" name="direccion" value="{{$miembros->direccion}}" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Fotografía</label>
                <input type="file" name="foto" class="form-control">
                <center>
                <output id="list">
                    @if($miembros->fotografia == "")
                        @if($miembros->genero == "Masculino")
                        <img src="{{url('images/avatar-man.jpg')}}" width="220px" alt="">
                        @else
                        <img src="{{url('images/avatar-woman.jpg')}}" width="220px" alt="">                        @endif
                    @else
                        <img src="{{asset('storage').'/'. $miembros->fotografia}}"width="220px" alt="">
                    @endif
                </output>
</center>
            </div>
        </div>

</div>
<hr>
        <div class="row">
            <div class="col-md-3">
                <a href="" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </div>
</form>

    </div>

        </div>
    </div>

</div>
    
</div>
    
@endsection    