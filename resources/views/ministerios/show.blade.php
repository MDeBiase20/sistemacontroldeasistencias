@extends('layouts.admin')

@section('content')
<div class="content" style="margin-left: 20px">
    <h1>Ministerios: {{$ministerios->nombre_ministerio}}</h1>

<div class="row">

    <div class="col-md-11">
            
        <div class="card card-outline card-primary">

            <div class="card-header">
                 <h3 class="card-title"><b>Datos registrados</b></h3>
            </div>

    <div class="card-body"> 
            <div class="row">

            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Nombres del Ministerio</label><b>*</b>
                                <input type="text" name="nombre_ministerio" value ="{{$ministerios->nombre_ministerio}}" class="form-control" disabled>
                            </div>
                    </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Fecha de ingreso</label> <b>*</b>
                        <input type="date" name="fecha_ingreso" value ="{{$ministerios->fecha_ingreso}}" class="form-control" disabled>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <p>{!!$ministerios->descripcion!!}</p>
                    </div>
                </div>

            </div>
        </div>

</div>
<hr>
        <div class="row">
            <div class="col-md-3">
                <a href="{{url('/ministerios')}}" class="btn btn-danger">Volver</a>
            </div>
        </div>

    </div>

        </div>
    </div>

</div>
    
</div>
    
@endsection    