@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Listado de Usuarios</h1>
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
         <h3 class="card-title"><b>Listado de Usuarios</b></h3>

         <div class="card-tools">
            <a href="{{url('/usuarios/create')}}" class="btn btn-primary">
            <i class="bi bi-person-fill-add"></i> Agregar nuevo usuario
            </a>
         </div>
    </div>

  <div class="card-body" style="display: block;">

<table id="example1" class="table table-bordered table-striped table-sm">
<thead>
<tr>
      <th>#</th>
      <th>Nombre Usuario</th>
      <th>Email</th>
      <th>Fecha de ingreso</th>
      <th>Estado</th>
      <th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($usuarios as $usuario)
    <tr>
      <td>{{$usuario->id}}</td>
      <td>{{$usuario->name}}</td>
      <td>{{$usuario->email}}</td>
      <td>{{$usuario->fecha_ingreso}}</td>
      <td style="text-align:center">
        <button style="border-radius: 20px" class="btn btn-success">Activo</button>
      </td>
      <td style="text-align:center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('usuarios', $usuario->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
            <a href="{{route('usuarios.edit', $usuario->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
            <form action="{{url('usuarios', $usuario->id)}}" method="post">
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
                                        "info": "Mostrando START a END de TOTAL Usuarios",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                        "infoFiltered": "(Filtrado de MAX total Usuarios)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar MENU Usuarios",
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