<?php
  error_reporting(E_ALL ^ E_NOTICE);

  include_once 'funciones/sesiones.php';
  include_once 'templates/header.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear evento
            <small>llena el formulario para crear un evento</small>
        </h1>
    </section>

    <div class="row">
        <div class="col-md-8">
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear evento</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" id="guardar-registro" name="guardar-registro" method="post"
                            action="modelo-evento.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="titulo_evento">Título:</label>
                                    <input type="text" class="form-control" id="titulo_evento" name="titulo_evento"
                                        placeholder="Título del evento">
                                </div>
                                <div class="form-group">
                                    <label for="categoria_evento">Categoría:</label>
                                    <select name="categoria_evento" class="form-control seleccionar" id="categoria_evento">
                                        <option value="0">- Seleccione -</option>
                                        <?php

                                    try {
                                        $sql = "SELECT * FROM categoria_evento ";
                                        $resultado = $conn->query($sql);
                                        while($cat_evento = $resultado->fetch_assoc()) { ?>
                                        <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                            <?php echo $cat_evento['cat_evento']; ?></option>
                                        <?php  }
                                    }catch(Exception $e){
                                        echo "Error: " . $e->getMessage();
                                    }

                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_evento">Fecha evento:</label>
                                    <div class="input-group date">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="fecha_evento" name="fecha_evento">
                                    </div>
                                </div>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label for="hora">Hora:</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" id="hora" name=hora_evento class="form-control timepicker">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="form-group">
                                    <label for="invitado">Invitado o Ponente:</label>
                                    <select name="invitado" class="form-control seleccionar" id="invitado">
                                        <option value="0">- Seleccione -</option>
                                        <?php

                                    try {
                                        $sql = "SELECT id_invitado, nombre_invitado, apellido_invitado FROM invitados ";
                                        $resultado = $conn->query($sql);
                                        while($invitados = $resultado->fetch_assoc()) { ?>
                                        <option value="<?php echo $invitados['id_invitado']; ?>">
                                            <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></option>
                                        <?php  }
                                    }catch(Exception $e){
                                        echo "Error: " . $e->getMessage();
                                    }

                                    ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary">Añadir</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
    </div>


</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>