<?php

$id_movimiento = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/movimientos_inventarios/DatosMovimientos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Movimientos: <?=$codigo_sbn.' | '.$codigo_cbp.' | '.$descripcion;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos registrados</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tipo de Activo</label>
                                            <p><?=$descripcion;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tipo de Movimiento</label>
                                            <p><?=$tipo_movimiento;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de Movimiento</label>
                                            <p><?=$fecha_movimiento;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Lugar de Origen</label>
                                            <p><?=$lugar_origen;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Lugar de Destino</label>
                                            <p><?=$lugar_destino;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Documento de Movimiento</label>
                                            <p><?=$documento_movimiento;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Observaciones</label>
                                            <p><?=$descripcion_mov;?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de creación</label>
                                            <p><$fyh_creacion;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p>
                                                <
                                                if($estado == "1") echo "ACTIVO";
                                                else echo "INACTIVO";
                                                ?>
                                            </p>
                                        </div>
                                    </div> 
                                </div> -->
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=APP_URL;?>/admin/movimientos_inventarios" class="btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
