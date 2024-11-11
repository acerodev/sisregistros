<?php

$id_activo = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/tipos_activos/ListaTiposActivos.php');
include ('../../app/controllers/activos/DatosActivos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/activos/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="id_activo" value="<?=$id_activo;?>" hidden>
                                            <input type="text" name="tipo_activo_id" value="<?=$tipo_activo_id;?>" hidden>
                                            <label for="">Tipo Activo</label>                                            
                                            <a href="<?=APP_URL;?>/admin/tipos_activos/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="" id="" class="form-control" disabled>
                                                    <?php
                                                    foreach ($tiposactivos as $tiposactivo){ ?>
                                                        <option value="<?=$tiposactivo['id_tipo'];?>" <?=$tipo_activo_id==$tiposactivo['id_tipo'] ? 'selected' : ''?>><?=$tiposactivo['descripcion'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código SBN</label>
                                            <input type="text" name="codigo_sbn" class="form-control" value="<?= $codigo_sbn; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código CBP</label>
                                            <input type="text" name="codigo_cbp" class="form-control" value="<?= $codigo_cbp; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Marca</label>
                                            <input type="text" name="marca" class="form-control" value="<?= $marca; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Modelo</label>
                                            <input type="text" name="modelo" class="form-control" value="<?= $modelo; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Color</label>
                                            <input type="text" name="color" class="form-control" value="<?= $color; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Material / Carrocería</label>
                                            <input type="text" name="material" class="form-control" value="<?= $material; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Dimensiones</label>
                                            <input type="text" name="dimensiones" class="form-control" value="<?= $dimensiones; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Serie</label>
                                            <input type="text" name="serie" class="form-control" value="<?= $serie; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Año</label>
                                            <input type="number" name="anio" class="form-control" value="<?= $anio; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado de Conservación</label>
                                            <select name="estado_conservacion" id="" class="form-control">
                                                <option value="BUENO" <?=$estado_conservacion=="BUENO" ? 'selected' : ''?>>BUENO</option>
                                                <option value="REGULAR" <?=$estado_conservacion=="REGULAR" ? 'selected' : ''?>>REGULAR</option>
                                                <option value="MALO" <?=$estado_conservacion=="MALO" ? 'selected' : ''?>>MALO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado de Uso</label>
                                            <input type="text" name="de_baja" class="form-control" value="<?= $de_baja; ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado de Uso</label>
                                            <select name="de_baja" id="" class="form-control" readonly>
                                                <option value="OPERATIVO" <$de_baja=="OPERATIVO" ? 'selected' : ''?>>OPERATIVO</option>
                                                <option value="DE BAJA" <$de_baja=="DE BAJA" ? 'selected' : ''?>>DE BAJA</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Inicio de Uso</label>
                                            <input type="date" name="fecha_iniuso" class="form-control" value="<?= $fecha_iniuso; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Adquisición</label>
                                            <input type="date" name="fecha_adquisicion" class="form-control" value="<?= $fecha_adquisicion; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento de Adquisición</label>
                                            <input type="text" name="doc_adquisicion" class="form-control" value="<?= $doc_adquisicion; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento de Ingreso</label>
                                            <input type="text" name="doc_ingreso" class="form-control" value="<?= $doc_ingreso; ?>">
                                        </div>
                                    </div>                              
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones</label>
                                            <textarea id="observaciones" name="observaciones" value="<?=$observaciones?>" class="form-control" rows="3" oninput="autoExpand(this)"><?= isset($observaciones) ? htmlspecialchars($observaciones) : '' ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/activos" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

<script>
function autoExpand(field) {
    field.style.height = 'inherit'; // Ajustar la altura al contenido
    field.style.height = field.scrollHeight + 'px'; // Ajustar la altura de acuerdo al contenido
}
</script>