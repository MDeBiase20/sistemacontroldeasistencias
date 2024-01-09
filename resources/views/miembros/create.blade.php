@extends('layouts.admin')

@section('content')
<div class="content" style="margin-left: 20px">
    <h1>Crear miembros</h1>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach

<div class="row">

    <div class="col-md-11">
            
        <div class="card card-outline card-primary">

            <div class="card-header">
                 <h3 class="card-title"><b>Crear Miembros</b></h3>
            </div>

    <div class="card-body">
        <!--el multipart/form-data sirve para poder guardar imágenes a la base de datos-->
        <form action="{{url('/miembros')}}" method= "POST" enctype="multipart/form-data">
            @csrf 
            <div class="row">

            <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres y apellidos</label> <b>*</b>
                                <input type="text" name="nombre_apellido" value="{{old('nombre_apellido')}}" class="form-control" required>
                            </div>
                    </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Email</label> <b>*</b>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Teléfono</label> <b>*</b>
                        <input type="number" name="telefono" value="{{old('telefono')}}" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Fecha de nacimiento</label> <b>*</b>
                        <input type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Género</label>
                        <select name="genero" class="form-control" id="">

                            <option value="Masculino" {{old('genero')=='Masculino' ? 'selected' : ''}}>Masculino</option>
                            <option value="Femenino" {{old('genero')=='Femenino' ? 'selected' : ''}}>Femenino</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ministerio</label> <b>*</b>
                        <input type="text" name="ministerio" value="{{old('ministerio')}}" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dirección</label> <b>*</b>
                        <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Fotografía</label>
                <input type="file" name="foto" class="form-control">
            </div>
        </div>

</div>
<hr>
        <div class="row">
            <div class="col-md-3">
                <a href="" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Agregar</button>
            </div>
        </div>
</form>

    </div>

        </div>
    </div>

</div>
    
</div>
    
@endsection    