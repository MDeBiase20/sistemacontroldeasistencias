@extends('layouts.admin')

@section('content')
<div class="content" style="margin-left: 20px">
    <h1>Crear Ministerios</h1>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach

<div class="row">

    <div class="col-md-11">
            
        <div class="card card-outline card-primary">

            <div class="card-header">
                 <h3 class="card-title"><b>Crear Ministerios</b></h3>
            </div>

    <div class="card-body">
        <!--el multipart/form-data sirve para poder guardar imágenes a la base de datos-->
        <form action="{{url('/ministerios')}}" method= "POST">
            @csrf 
            <div class="row">

            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Nombres del Ministerio</label><b>*</b>
                                <input type="text" name="nombre_ministerio" value="{{old('nombre_ministerio')}}" class="form-control" required>
                            </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Fecha de ingreso</label> <b>*</b>
                        <input type="date" name="fecha_ingreso" value="{{old('fecha_ingreso')}}" class="form-control" required>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="" cols="30" rows="8"></textarea>
                        <script>
                            CKEDITOR.replace('descripcion');
                        </script>
                    </div>
                </div>

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