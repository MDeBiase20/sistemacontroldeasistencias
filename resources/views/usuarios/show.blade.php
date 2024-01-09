@extends('layouts.admin')

@section('content')
<div class="content" style="margin-left: 20px">
    <h1>Usuario: {{$usuarios->name}}</h1>

<div class="row">

    <div class="col-md-8">
            
        <div class="card card-outline card-primary">

            <div class="card-header">
                 <h3 class="card-title"><b>Datos registrados</b></h3>
            </div>

    <div class="card-body"> 
            <div class="row">

            <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Nombre del usuario</label>
                                <input type="text" name="nombre_usuario" value ="{{$usuarios->name}}" class="form-control" disabled>
                            </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" value ="{{$usuarios->email}}" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Fecha de ingreso</label>
                        <input type="date" name="fecha_ingreso" value ="{{$usuarios->fecha_ingreso}}" class="form-control" disabled>
                    </div>
                </div>

            </div>
        </div>

</div>
<hr>
        <div class="row">
            <div class="col-md-3">
                <a href="{{url('/usuarios')}}" class="btn btn-danger">Volver</a>
            </div>
        </div>

    </div>

        </div>
    </div>

</div>
    
</div>
    
@endsection    