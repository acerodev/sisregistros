<?php

$id_etiqueta = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/etiquetas/DatosEtiquetas.php');
include ('../../app/controllers/activos/ListaActivos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Etiqueta: <?=$codigo_etiqueta;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/etiquetas/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="id_etiqueta" value="<?=$id_etiqueta;?>" hidden>                                            
                                            <label for="">Activos</label>                                            
                                            <a href="<?=APP_URL;?>/admin/activos/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="activo_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($activos as $activo){ ?>
                                                        <option value="<?=$activo['id_activo'];?>" <?=$activo_id==$activo['id_activo'] ? 'selected' : ''?>><?=$activo['codigo_sbn'].' | '.$activo['codigo_cbp'].' | '.$activo['denominacion'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Año</label>
                                            <input type="number" name="etiqueta_anno" value="<?=$etiqueta_anno;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Código</label>
                                            <input type="text" name="codigo_etiqueta" value="<?=$codigo_etiqueta;?>" class="form-control" required>
                                        </div>
                                    </div>                                    
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/etiquetas" class="btn btn-secondary">Cancelar</a>
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
