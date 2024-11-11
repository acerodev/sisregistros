<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/unidad_vehicular/ListadodeUnidadVehicular.php');
include ('../../app/controllers/personal_autoriza/ListadoAutoriza.php');
include ('../../app/controllers/mando/ListadodeMando.php');
include ('../../app/controllers/administrativos/ListadoConductor.php');
include ('../../app/controllers/motivo/ListadodeMotivo.php');
//include ('../../app/controllers/parte/ultimokmingreso.php');
//include ('../../app/inicio_session.php')

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creación de un nuevo Parte</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/parte/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="unidadVehicular">Unidad Vehicular</label>
                                            <a href="<?=APP_URL;?>/admin/unidad_vehicular/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="unidad_vehicular_id" id="unidadVehicular" class="form-control" style="width: 100%;">
                                                    <?php
                                                    foreach ($unidad_vehs as $unidad_veh){ ?>
                                                        <option value="<?=$unidad_veh['id_unidad_vehicular'];?>"><?=$unidad_veh['descripcion']." | ".$unidad_veh['placa']." | ".$unidad_veh['de_baja'];?></option>
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
                                            <input type="text" value="<?=$idadministrativosesion?>" name="administrativo_id" class="form-control" required readonly>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Conductor</label>
                                            <input type="text" value="<?=$codnombresdelusuario?>" name="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">ID Parte</label>
                                            <input type="text" name="idparte" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Mes</label>
                                            <select name="mes" id="" class="form-control" style="width: 100%;">
                                                <option value="ENERO">ENERO</option>
                                                <option value="FEBRERO">FEBRERO</option>
                                                <option value="MARZO">MARZO</option>
                                                <option value="ABRIL">ABRIL</option>
                                                <option value="MAYO">MAYO</option>
                                                <option value="JUNIO">JUNIO</option>
                                                <option value="JULIO">JULIO</option>
                                                <option value="AGOSTO">AGOSTO</option>
                                                <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                                <option value="OCTUBRE">OCTUBRE</option>
                                                <option value="NOVIEMBRE">NOVIEMBRE</option>
                                                <option value="DICIEMBRE">DICIEMBRE</option>
                                            </select>
                                        </div>
                                    </div>                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="autoriza_id">Autoriza</label>
                                            <select name="autoriza_id" id="autoriza_id" class="form-control select2" style="width: 100%;">
                                                <?php
                                                foreach ($autorizas as $autoriza){ ?>
                                                    <option></option>
                                                    <option value="<?=$autoriza['id_autoriza'];?>"><?=$autoriza['codigo_aut']." | ".$autoriza['nombres_aut'].", ".$autoriza['apellidos_aut'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mando_id">Al mando</label>
                                            <select name="mando_id" id="mando_id" class="form-control select2" style="width: 100%;">
                                                <?php
                                                foreach ($mandos as $mando){ ?>
                                                    <option></option>
                                                    <option value="<?=$mando['id_mando'];?>"><?=$mando['codigo_man']." | ".$mando['nombres_man'].", ".$mando['apellidos_man'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="motivo_id">Motivo</label>
                                            <select name="motivo_id" id="motivo_id" class="form-control select2" style="width: 100%;">
                                                <?php
                                                foreach ($motivos as $motivo){ ?>
                                                    <option></option>
                                                    <option value="<?=$motivo['id_motivo'];?>"><?=$motivo['codigo_mot']." | ".$motivo['descripcion_mot'];?></option>
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
                                            <label for="">Fecha de Salida</label>
                                            <input type="date" name="fecha_salida" class="form-control" value="<?= $fecha_actual ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Hora de Salida</label>
                                            <input type="time" name="hora_salida" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Ingreso</label>
                                            <input type="date" name="fecha_ingreso" class="form-control" value="<?= $fecha_actual ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Hora de Ingreso</label>
                                            <input type="time" name="hora_ingreso" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="km_salida">KM de Salida</label>
                                            <input type="number" id="km_salida" name="km_salida" class="form-control" value="0">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="km_ingreso">KM de Ingreso</label>
                                            <input type="number" id="km_ingreso" name="km_ingreso" class="form-control" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="km_recorrido">KM Recorrido</label>
                                            <input type="text" id="km_recorrido" name="km_recorrido" class="form-control" value="0" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Horas Recorridas</label>
                                            <input type="text" name="horas_recorridas" class="form-control">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Abastecimiento de combustible</label>
                                            <input type="text" name="abs_combustible" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input type="address" name="direccion_parte" class="form-control">
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
$(document).ready(function () {
    $('.select2').select2({
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
        // Obtener referencias a los campos
        const kmSalida = document.getElementById('km_salida');
        const kmIngreso = document.getElementById('km_ingreso');
        const resultado = document.getElementById('km_recorrido');

        // Función para calcular la diferencia
        function calcularDiferencia() {
            // Obtener valores y convertirlos a números
            const salida = parseFloat(kmSalida.value) || 0;
            const ingreso = parseFloat(kmIngreso.value) || 0;

            // Calcular la diferencia
            const diferencia = ingreso - salida;

            // Mostrar el resultado
            resultado.value = diferencia;
        }

        // Agregar eventos para recalcular cuando cambie el valor
        kmSalida.addEventListener('input', calcularDiferencia);
        kmIngreso.addEventListener('input', calcularDiferencia);
    });
    /*
        // Obtener referencias a los campos
        const kmSalida = document.getElementById('km_salida');
        const kmIngreso = document.getElementById('km_ingreso');
        const resultado = document.getElementById('km_recorrido');

        // Función para calcular la diferencia
        function calcularDiferencia() {
            // Obtener valores y convertirlos a números
            const salida = parseFloat(km_salida.value) || 0;
            const ingreso = parseFloat(km_ingreso.value) || 0;

            // Calcular la diferencia
            const diferencia = ingreso - salida;

            // Mostrar el resultado
            km_recorrido.value = diferencia;
        }

        // Agregar eventos para recalcular cuando cambie el valor
        km_salida.addEventListener('input', calcularDiferencia);
        km_ingreso.addEventListener('input', calcularDiferencia);
        */
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tipoVehSelect = document.getElementById('unidadVehicular');

        tipoVehSelect.addEventListener('change', function() {
            var idUnidadVehicular = this.value;

            // Verifica si el valor se está capturando correctamente
            //console.log('Vehículo seleccionado:', idUnidadVehicular);

            fetch('https://bomgestion.acerodev.com/app/controllers/parte/kmingreso.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id_unidad_vehicular=' + encodeURIComponent(idUnidadVehicular)
            })
            .then(function(response) {
                // Verifica si la respuesta del servidor es correcta
                //console.log('Respuesta del servidor:', response);
                return response.json(); // Convertir la respuesta en JSON
            })
            .then(function(data) {
                var kmSalidaInput = document.getElementById('km_salida');
                //console.log('Datos recibidos:', data);

                if (data && data.km_ingreso) {
                    kmSalidaInput.value = Number(data.km_ingreso); // Actualizar el valor de km_salida
                } else {
                    kmSalidaInput.value = '0'; // Limpiar si no hay datos
                }
            })
            .catch(function(error) {
                console.error('Error en la solicitud:', error); // Mostrar error si falla la solicitud
            });
        });
    });
</script>