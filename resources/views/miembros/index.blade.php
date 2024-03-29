@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Listado de miembros</h1>
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
  <div class="col-md-12">
   <div class="card card-outline card-primary">

    <div class="card-header">
         <h3 class="card-title"><b>Listado de Miembros</b></h3>

         <div class="card-tools">
            <a href="{{url('/miembros/create')}}" class="btn btn-primary">
            <i class="bi bi-person-fill-add"></i> Agregar nuevo miembro
            </a>
         </div>
    </div>

  <div class="card-body" style="display: block;">

<table id="example1" class="table table-bordered table-striped table-sm">
<thead>
<tr>
      <th>#</th>
      <th>Nombre y apellido</th>
      <th>Teléfono</th>
      <th>email</th>
      <th>estado</th>
      <th>fecha_ingreso</th>
      <th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($miembros as $miembro)
    <tr>
      <td>{{$miembro->id}}</td>
      <td>{{$miembro->nombre_apellido}}</td>
      <td>{{$miembro->telefono}}</td>
      <td>{{$miembro->email}}</td>
      <td style="text-align:center">
        <button style="border-radius: 20px" class="btn btn-success">Activo</button>
      </td>
      <td>{{$miembro->fecha_ingreso}}</td>
      <td style="text-align:center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('miembros', $miembro->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
            <a href="{{route('miembros.edit', $miembro->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
            <form action="{{url('miembros', $miembro->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este registro?')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
            </form>
        </div>
      </td>
    </tr>
    @endforeach
</tbody>
</table>

<!--Script para pasar a español el DataTable-->
<script>
  $(function () {
           $("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando START a END de TOTAL Miembros",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Miembros",
                                        "infoFiltered": "(Filtrado de MAX total Miembros)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar MENU Miembros",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true, "lengthChange": true, "autoWidth": false,
                                    buttons: [{
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: 'Copiar',
                                            extend: 'copy',
                                        }, {
                                            extend: 'pdf'
                                        },{
                                            extend: 'csv'
                                        },{
                                            extend: 'excel'
                                        },{
                                            text: 'Imprimir',
                                            extend: 'print'
                                        }
                                        ]
                                    },
                                        {
                                            extend: 'colvis',
                                            text: 'Visor de columnas',
                                            collectionLayout: 'fixed three-column'
                                        }
                                    ],
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            });
</script>

</div>
  </div>

  </div>

  </div>

</div>
 
@endsection    