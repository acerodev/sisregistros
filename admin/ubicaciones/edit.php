<?php

$id_ubicacion = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/ubicaciones/DatosUbicaciones.php');
include ('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include ('../../app/controllers/responsables/ListaResponsables.php');
//include ('../../app/controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Dependencia: <?=$dependencia_area;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/ubicaciones/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-0">
                                        <div class="form-group">
                                            <input type="text" name="id_ubicacion" value="<?=$id_ubicacion;?>" hidden>
                                            <!-- <label for="">Nombre del P.Autoriza</label>                                            
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
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Sede</label>
                                            <select name="config_institucion_id" id="" class="form-control">
                                                <?php
                                                foreach ($instituciones as $institucion){ ?>
                                                    <option value="<?=$institucion['id_config_institucion'];?>" <?=$institucion['id_config_institucion']==$ubicacion['config_institucion_id'] ? 'selected' : ''?> ><?=$institucion['nombre_institucion'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Dependencia</label>
                                            <input type="text" name="dependencia_ubi" class="form-control" value="<?= $dependencia_ubi; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Área</label>
                                            <input type="text" name="dependencia_area" class="form-control" value="<?= $dependencia_area; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Piso</label>
                                            <input type="text" name="piso" class="form-control" value="<?= htmlspecialchars($ubicacion['piso']); ?>">
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Responsable</label>
                                        <select name="responsable_id" id="" class="form-control">
                                            <?php
                                            foreach ($responsables as $responsable){ ?>
                                                <option value="<?=$responsable['id_responsable'];?>" <?=$responsable['id_responsable']==$ubicacion['responsable_id'] ? 'selected' : ''?> ><?=$responsable['nombres'];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/ubicaciones" class="btn btn-secondary">Cancelar</a>
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
