<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/tipos_activos/ListaTiposActivos.php');
include ('../../app/controllers/ubicaciones/ListaUbicaciones.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Crear un nuevo activo</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/activos/create.php" method="post">
                                <div class="row">
                                    <!--
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <a href="<APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <
                                                    foreach ($roles as $role){ ?>
                                                        <option value="<$role['id_rol'];?>"><$role['nombre_rol'];?></option>
                                                        <
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Tipo de Activo</label>
                                            <a href="<?=APP_URL;?>/admin/tipos_activos/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>                                            
                                            <div class="form-inline">
                                                <select name="tipo_activo_id" id="" class="form-control" style="width: 100%;">
                                                    <?php
                                                    foreach ($tiposactivos as $tiposactivo){ ?>
                                                        <option value="<?=$tiposactivo['id_tipo'];?>"><?=$tiposactivo['descripcion'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ubicaciones</label>
                                            <a href="<?=APP_URL;?>/admin/ubicaciones/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>                                            
                                            <div class="form-inline">
                                                <select name="ubicacion_id" id="" class="form-control" style="width: 100%;">
                                                    <?php
                                                    foreach ($ubicaciones as $ubicacion){ ?>
                                                        <option value="<?=$ubicacion['id_ubicacion'];?>"><?= $ubicacion['dependencia_area'].' | Piso: '.$ubicacion['piso'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código de SBN</label>
                                            <input type="text" name="codigo_sbn" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código de CBP</label>
                                            <input type="text" name="codigo_cbp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Serie</label>
                                            <input type="text" name="serie" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Marca</label>
                                            <input type="text" name="marca" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Modelo</label>
                                            <input type="text" name="modelo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Color</label>
                                            <input type="text" name="color" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Material</label>
                                            <input type="text" name="material" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Dimensiones</label>
                                            <input type="text" name="dimensiones" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Año</label>
                                            <input type="number" name="anio" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado de Conservación</label>
                                            <select name="estado_conservacion" id="" class="form-control" style="width: 100%;">
                                                <option value="BUENO">BUENO</option>
                                                <option value="REGULAR">REGULAR</option>
                                                <option value="MALO">MALO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado de Uso</label>
                                            <select name="de_baja" id="" class="form-control" style="width: 100%;">
                                                <option value="OPERATIVO">OPERATIVO</option>
                                                <option value="DE BAJA">DE BAJA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Inicio Uso</label>
                                            <input type="date" name="fecha_iniuso" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Adquisición</label>
                                            <input type="date" name="fecha_adquisicion" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento de Adquisición</label>
                                            <input type="text" name="doc_adquisicion" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Documento de Ingreso</label>
                                            <input type="text" name="doc_ingreso" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-0" hidden>
                                        <div class="form-group">
                                            <label for="" >Cantidad</label>
                                            <input type="number" name="cantidad" value="1" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones</label>
                                            <textarea id="observaciones" name="observaciones" class="form-control" rows="3" oninput="autoExpand(this)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
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