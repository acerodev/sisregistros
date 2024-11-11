<?php

$id_activo = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/activos/DatosActivos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Tipo de Activo: <?=$descripcion;?></h1>
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
                                            <label for="">Tipo de Activo</label>
                                            <p><?=$descripcion;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código SBN </label>
                                            <p><?=$codigo_sbn;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código CBP</label>
                                            <p><?=$codigo_cbp;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Marca</label>
                                            <p><?=$marca;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Modelo</label>
                                            <p><?=$modelo;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Color</label>
                                            <p><?=$color;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Material / Carrocería</label>
                                            <p><?=$material;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Dimensiones</label>
                                            <p><?=$dimensiones;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Serie</label>
                                            <p><?=$serie;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Año</label>
                                            <p><?=$anio;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado Conservación</label>
                                            <p><?=$estado_conservacion;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado de Uso</label>
                                            <p><?=$de_baja;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Inicio de Uso</label>
                                            <p><?=$fecha_iniuso;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Adquisición</label>
                                            <p><?=$fecha_adquisicion;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento de Adquisición</label>
                                            <p><?=$doc_adquisicion;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento de Ingreso</label>
                                            <p><?=$doc_ingreso;?></p>
                                        </div>
                                    </div>                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de creación</label>
                                            <p><?=$fyh_creacion;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Observaciones</label>
                                            <p><?=$observaciones;?></p>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p>
                                                <
                                                if($estado == "1") echo "ACTIVO";
                                                else echo "INACTIVO";
                                                ?>
                                            </p>
                                        </div>
                                    </div>-->
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=APP_URL;?>/admin/activos" class="btn btn-secondary">Volver</a>
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
