<?php

$id_parte = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/parte/datos_parte.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Datos de Parte: <?=$cod_parte;?></h1>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Unidad Vehicular</label><div class="form-inline">
                                            <p><?=$descripcion." | ".$placa;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Conductor</label>
                                        <p><?=$conductor;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">ID Parte</label>
                                        <p><?=$cod_parte;?></p>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Mes</label>
                                        <p><?=$mes;?></p>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Autoriza</label>
                                        <p><?=$codigo_aut." - ".$nombres_aut.", ".$apellidos_aut;?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Al Mando</label>
                                        <p><?=$codigo_man." - ".$nombres_man.", ".$apellidos_man;?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Motivo</label>
                                        <p><?=$codigo_mot." - ".$descripcion_mot;?></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">                                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Salida</label>
                                        <p><?=$fecha_salida;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Hora de Salida</label>
                                        <p><?=$hora_salida;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Ingreso</label>
                                        <p><?=$fecha_ingreso;?></p>
                                    </div>
                                </div>                                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Hora de Ingreso</label>
                                        <p><?=$hora_ingreso;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KM de Salida</label>
                                        <p><?=$km_salida;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KM de Ingreso</label>
                                        <p><?=$km_ingreso;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KM Recorrido</label>
                                        <p><?=$km_recorrido;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Horas recorridas</label>
                                        <p><?=$horas_recorridas;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Abastecimiento de combustible</label>
                                        <p><?=$abs_combustible;?></p>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <p><?=$direccion_parte;?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Observaciones</label>
                                        <p><?=$observaciones;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Creación</label>
                                        <p><?=$fyh_creacion;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p>
                                            <?php
                                            if($estado == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?=APP_URL;?>/admin/parte" class="btn btn-secondary">Volver</a>
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
