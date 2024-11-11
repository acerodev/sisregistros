<?php

$id_parte = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/parte/datos_parte.php');
include ('../../app/controllers/unidad_vehicular/ListadodeUnidadVehicular.php');
include ('../../app/controllers/personal_autoriza/ListadoAutoriza.php');
include ('../../app/controllers/mando/ListadodeMando.php');
include ('../../app/controllers/motivo/ListadodeMotivo.php');

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
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/parte/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="id_parte" value="<?=$id_parte;?>" hidden>
                                            <input type="text" name="id_autoriza" value="<?=$id_autoriza;?>" hidden>
                                            <input type="text" name="id_mando" value="<?=$id_mando;?>" hidden>
                                            <input type="text" name="id_motivo" value="<?=$id_motivo;?>" hidden>
                                            <input type="text" name="id_unidad_vehicular" value="<?=$id_unidad_vehicular;?>" hidden>                                            
                                            <label for="">Unidad Vehicular</label>
                                            <a href="<?=APP_URL;?>/admin/unidad_vehicular/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="unidad_vehicular_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($unidad_vehs as $unidad_veh){ ?>
                                                        <option value="<?=$unidad_veh['id_unidad_vehicular'];?>" <?=$id_unidad_vehicular==$unidad_veh['id_unidad_vehicular'] ? 'selected' : ''?>><?=$unidad_veh['descripcion']." | ".$unidad_veh['placa'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-0" hidden>
                                        <div class="form-group">
                                            <label for="">Conductor</label>
                                            <input type="text" name="administrativo_id" value="<?=$id_administrativo;?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Conductor</label>
                                            <input type="text" name="" value="<?=$conductor;?>" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">ID Parte</label>
                                            <input type="text" name="cod_parte" value="<?=$cod_parte;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Mes</label>
                                            <select name="mes" id="" class="form-control">
                                                <option value="ENERO" <?=$mes=="ENERO" ? 'selected' : ''?>>ENERO</option>
                                                <option value="FEBRERO" <?=$mes=="FEBRERO" ? 'selected' : ''?>>FEBRERO</option>
                                                <option value="MARZO" <?=$mes=="MARZO" ? 'selected' : ''?>>MARZO</option>
                                                <option value="ABRIL" <?=$mes=="ABRIL" ? 'selected' : ''?>>ABRIL</option>
                                                <option value="MAYO" <?=$mes=="MAYO" ? 'selected' : ''?>>MAYO</option>
                                                <option value="JUNIO" <?=$mes=="JUNIO" ? 'selected' : ''?>>JUNIO</option>
                                                <option value="JULIO" <?=$mes=="JULIO" ? 'selected' : ''?>>JULIO</option>
                                                <option value="AGOSTO" <?=$mes=="AGOSTO" ? 'selected' : ''?>>AGOSTO</option>
                                                <option value="SEPTIEMBRE" <?=$mes=="SEPTIEMBRE" ? 'selected' : ''?>>SEPTIEMBRE</option>
                                                <option value="OCTUBRE" <?=$mes=="OCTUBRE" ? 'selected' : ''?>>OCTUBRE</option>
                                                <option value="NOVIEMBRE" <?=$mes=="NOVIEMBRE" ? 'selected' : ''?>>NOVIEMBRE</option>
                                                <option value="DICIEMBRE" <?=$mes=="DICIEMBRE" ? 'selected' : ''?>>DICIEMBRE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="autoriza_id">Autoriza</label>
                                            <select name="autoriza_id" id="autoriza_id" class="form-control">
                                                <?php
                                                foreach ($autorizas as $autoriza){ ?>
                                                    <option value="<?=$autoriza['id_autoriza'];?>" <?=$autoriza['id_autoriza']==$id_autoriza ? 'selected' : ''?> ><?=$autoriza['codigo_aut']." | ".$autoriza['nombres_aut'].", ".$autoriza['apellidos_aut'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mando_id">Al Mando</label>
                                            <select name="mando_id" id="mando_id" class="form-control">
                                                <?php
                                                foreach ($mandos as $mando){ ?>
                                                    <option value="<?=$mando['id_mando'];?>" <?=$mando['id_mando']==$id_mando ? 'selected' : ''?> ><?=$mando['codigo_man']." - ".$mando['nombres_man'].", ".$mando['apellidos_man'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="motivo_id">Motivo</label>
                                            <select name="motivo_id" id="motivo_id" class="form-control">
                                                <?php
                                                foreach ($motivos as $motivo){ ?>
                                                    <option value="<?=$motivo['id_motivo'];?>" <?=$motivo['id_motivo']==$id_motivo ? 'selected' : ''?> ><?=$motivo['codigo_mot']." ".$motivo['descripcion_mot'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de salida</label>
                                            <input type="date" name="fecha_salida" value="<?=$fecha_salida;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Hora de salida</label>
                                            <input type="time" name="hora_salida" value="<?=$hora_salida;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de ingreso</label>
                                            <input type="date" name="fecha_ingreso" value="<?=$fecha_ingreso;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Hora de ingreso</label>
                                            <input type="time" name="hora_ingreso" value="<?=$hora_ingreso;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="km_salida">KM de salida</label>
                                            <input type="number" id="km_salida" name="km_salida" value="<?=$km_salida;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="km_ingreso">KM de ingreso</label>
                                            <input type="number" id="km_ingreso" name="km_ingreso" value="<?=$km_ingreso;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="km_recorrido">KM Recorrido</label>
                                            <input type="text" id="km_recorrido" name="km_recorrido" value="<?=$km_recorrido;?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Horas recorridas</label>
                                            <input type="text" name="horas_recorridas" value="<?=$horas_recorridas;?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Abastecimiento de combustible</label>
                                            <input type="text" name="abs_combustible" value="<?=$abs_combustible;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input type="address" name="direccion_parte" value="<?=$direccion_parte;?>" class="form-control" required>
                                        </div>
                                    </div>
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
                                            <a href="<?=APP_URL;?>/admin/parte" class="btn btn-secondary">Cancelar</a>
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

<!-- Inicializar Select2 -->
<script>
$(document).ready(function() {
        $('#autoriza_id').select2({
            placeholder: 'Seleccione una opción',
            allowClear: true
        });
    });
</script>

<script>
$(document).ready(function() {
        $('#mando_id').select2({
            placeholder: 'Seleccione una opción',
            allowClear: true
        });
    });
</script>

<script>
$(document).ready(function() {
        $('#motivo_id').select2({
            placeholder: 'Seleccione una opción',
            allowClear: true
        });
    });
</script>
<!-- FIN INICIAR SELECT2 PIPIPIPI -->

<script>
function autoExpand(field) {
    field.style.height = 'inherit'; // Ajustar la altura al contenido
    field.style.height = field.scrollHeight + 'px'; // Ajustar la altura de acuerdo al contenido
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kmSalida = document.getElementById('km_salida');
        const kmIngreso = document.getElementById('km_ingreso');
        const kmRecorrido = document.getElementById('km_recorrido');

        function calcularDiferencia() {
            const salida = parseFloat(kmSalida.value) || 0;
            const ingreso = parseFloat(kmIngreso.value) || 0;
            kmRecorrido.value = ingreso - salida;
        }

        kmSalida.addEventListener('input', calcularDiferencia);
        kmIngreso.addEventListener('input', calcularDiferencia);

        // Calcular la diferencia al cargar la página
        calcularDiferencia();
    });
</script>
