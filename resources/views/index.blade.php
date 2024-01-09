@extends('layouts.admin')

@section('content')
    <h1>Página Principal</h1>

    
    <div class="row" style="margin-left: 5px">
        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 160px">
              <div class="inner">
                <?php $contador_ministerios = 0;?>
                @foreach($ministerios as $ministerio)
                    <?php $contador_ministerios++;?>
                @endforeach
                <h3><?php echo $contador_ministerios;?></h3>

                <p>Ministerios</p>
              </div>
              <div class="icon">
              <i class="bi bi-building"></i>
              </div>
              <a href="{{url('ministerios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-success" style="height: 160px">
              <div class="inner">
                <?php $contador_miembros = 0;?>
                @foreach($miembros as $miembro)
                    <?php $contador_miembros++;?>
                @endforeach
                <h3><?php echo $contador_miembros;?></h3>

                <p>Miembros</p>
              </div>
              <div class="icon">
              <i class="bi bi-file-person-fill"></i>
              </div>
              <a href="{{url('miembros')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-warning" style="height: 160px">
              <div class="inner">
                <?php $contador_usuarios = 0;?>
                @foreach($usuarios as $usuario)
                    <?php $contador_usuarios++;?>
                @endforeach
                <h3><?php echo $contador_usuarios;?></h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
              <i class="bi bi-person-vcard"></i>
              </div>
              <a href="{{url('usuarios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-primary" style="height: 160px">
              <div class="inner">
                <?php $contador_asistencia = 0;?>
                @foreach($asistencias as $asistencia)
                    <?php $contador_asistencia++;?>
                @endforeach
                <h3><?php echo $contador_asistencia;?></h3>

                <p>Asistencias</p>
              </div>
              <div class="icon">
              <i class="bi bi-calendar2-week"></i>
              </div>
              <a href="{{url('asistencias')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
    </div>
@endsection