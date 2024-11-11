<?php

$id_unidad_vehicular = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/unidad_vehicular/DatosUnidadVehiculo.php');
include ('../../app/controllers/tipos_activos/ListaTiposActivos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Unidad Vehicular: <?=$descripcion." ".$placa;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/unidad_vehicular/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-0">
                                        <div class="form-group">
                                            <input type="text" name="id_unidad_vehicular" value="<?=$id_unidad_vehicular;?>" hidden>
                                            <input type="text" name="activo_id" value="<?=$activo_id;?>" hidden>
                                            <input type="text" name="tipo_activo_id" value="<?=$tipo_activo_id;?>" hidden>
                                            <!--
                                                <label for="">Nombre del P.Autoriza</label>
                                                <a href="<APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                                <div class="form-inline">
                                                    <select name="rol_id" id="" class="form-control">
                                                        <
                                                        foreach ($roles as $role){ ?>
                                                            <option value="<$role['id_rol'];?>" <$nombre_rol==$role['nombre_rol'] ? 'selected' : ''?>><$role['nombre_rol'];?></option>
                                                            <
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Tipo Vehicular</label>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Placa</label>
                                            <input type="text" name="placa" value="<?=$placa;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Categoría</label>
                                            <select name="categoria" id="" class="form-control">
                                                <option value="M1" <?=$categoria=="M1" ? 'selected' : ''?>>M1</option>
                                                <option value="M2" <?=$categoria=="M2" ? 'selected' : ''?>>M2</option>
                                                <option value="M3" <?=$categoria=="M3" ? 'selected' : ''?>>M3</option>
                                                <option value="N1" <?=$categoria=="N1" ? 'selected' : ''?>>N1</option>
                                                <option value="N2" <?=$categoria=="N2" ? 'selected' : ''?>>N2</option>
                                                <option value="N3" <?=$categoria=="N3" ? 'selected' : ''?>>N3</option>
                                                <option value="O1" <?=$categoria=="O1" ? 'selected' : ''?>>O1</option>
                                                <option value="O2" <?=$categoria=="O2" ? 'selected' : ''?>>O2</option>
                                                <option value="O3" <?=$categoria=="O3" ? 'selected' : ''?>>O3</option>
                                                <option value="O4" <?=$categoria=="O4" ? 'selected' : ''?>>O4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Año Fabricación</label>
                                            <input type="number" name="ano_fab" value="<?=$ano_fab;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Número Motor</label>
                                            <input type="text" name="numero_motor" value="<?=$numero_motor;?>" class="form-control" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Número Chasis</label>
                                            <input type="text" name="numero_chasis" value="<?=$numero_chasis;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carroceria</label>
                                            <input type="text" name="material" value="<?=$material;?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código SBN</label>
                                            <input type="text" name="codigo_sbn" value="<?= $codigo_sbn ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código CBP</label>
                                            <input type="text" name="codigo_cbp" value="<?= $codigo_cbp ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Serie</label>
                                            <input type="text" name="serie" value="<?= $serie ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Modelo</label>
                                            <input type="text" name="modelo" value="<?= $modelo ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Marca</label>
                                            <input type="text" name="marca" value="<?= $marca ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Color</label>
                                            <input type="text" name="color" value="<?= $color ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Dimensiones</label>
                                            <input type="text" name="dimensiones" value="<?= $dimensiones ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Año</label>
                                            <input type="number" name="anio" value="<?= $anio ?>" class="form-control">
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
                                            <select name="de_baja" id="" class="form-control">
                                                <option value="OPERATIVO" <$de_baja=="OPERATIVO" ? 'selected' : ''?>>OPERATIVO</option>
                                                <option value="DE BAJA" <$de_baja=="DE BAJA" ? 'selected' : ''?>>DE BAJA</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Adquisición</label>
                                            <input type="date" name="fecha_adquisicion" value="<?= $fecha_adquisicion ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Inicio Uso</label>
                                            <input type="date" name="fecha_iniuso" value="<?= $fecha_iniuso ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento Adquisición</label>
                                            <input type="text" name="doc_adquisicion" value="<?= $doc_adquisicion ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento de Ingreso</label>
                                            <input type="text" name="doc_ingreso" value="<?= $doc_ingreso ?>" class="form-control">
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
                                            <a href="<?=APP_URL;?>/admin/unidad_vehicular" class="btn btn-secondary">Cancelar</a>
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