<?php

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/activos/ListaActivosUbicaciones.php'); //ListaActivosUbicaciones se encuentra en controllers activos
include ('../../app/controllers/ubicaciones/ListaUbicaciones.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Crea un nuevo movimiento</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/movimientos_inventarios/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Activos</label>
                                            <a href="<?=APP_URL;?>/admin/activos/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="activo_id" id="activoSelect" class="form-control select2" style="width: 100%;">
                                                    <?php
                                                    foreach ($ubiactivos as $ubiactivo){ ?>
                                                        <option value="<?=$ubiactivo['id_activo'];?>"
                                                            data-origen="<?=$ubiactivo['dependencia_area'].' | Piso: '.$ubiactivo['piso'].' | '.$ubiactivo['dependencia_ubi'];?>"
                                                            data-origenid="<?=$ubiactivo['ubicacion_id'];?>"
                                                            data-tipoactivo="<?=$ubiactivo['tipo_activo_id'];?>">
                                                            <?=$ubiactivo['codigo_sbn'].' | '.$ubiactivo['codigo_cbp'].' | '.$ubiactivo['descripcion'];?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tipo de Movimiento</label>
                                            <select name="tipo_movimiento" id="" class="form-control" style="width: 100%;">
                                                <option value="TRASLADO">TRASLADO</option>
                                                <option value="DEVOLUCION">DEVOLUCIÓN</option>
                                                <option value="FUERA DE SERVICIO">FUERA DE SERVICIO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-0" hidden>
                                        <div class="form-group">
                                            <label for="">tipo de Activo</label>
                                            <input type="text" id="tipoactivoInput" name="tipo_activo_id" value="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-0" hidden>
                                        <div class="form-group">
                                            <label for="">Ubicación ID Origen</label>
                                            <input type="text" id="origenIDInput" name="ubicacion_idresta" value="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ubicación de Origen</label>
                                            <input type="text" id="origenInput" name="lugar_origen" value="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ubicación de Destino</label>
                                            <a href="<?=APP_URL;?>/admin/ubicaciones/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm" hidden><i class="bi bi-file-plus"></i></a>                                            
                                            <div class="form-inline">
                                                <select name="ubicacion_id" id="ubicacionSelect" class="form-control select2" style="width: 100%;">
                                                    <?php
                                                    foreach ($ubicaciones as $ubicacion){ ?>
                                                        <option value="<?=$ubicacion['id_ubicacion'];?>" 
                                                            data-destino="<?=$ubicacion['dependencia_area'].' | Piso: '.$ubicacion['piso'].' | '.$ubicacion['dependencia_ubi'];?>">
                                                            <?=$ubicacion['dependencia_area'].' | Piso: '.$ubicacion['piso'].' | '.$ubicacion['dependencia_ubi'];?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-0" hidden>
                                        <div class="form-group">
                                            <label for="">Lugar Destino</label>
                                            <input type="text" id="destinoInput" name="lugar_destino" value="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fecha</label>
                                            <input type="date" name="fecha_movimiento" class="form-control" value="<?= $fecha_actual ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-0" hidden>
                                        <div class="form-group">
                                            <label for="">Cantidad</label>
                                            <input type="number" name="" class="form-control" value="1" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Documento de movimiento</label>
                                            <input type="text" name="documento_movimiento" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Observaciones</label>
                                            <input type="text" name="descripcion_mov" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                            <a href="<?=APP_URL;?>/admin/movimientos_inventarios" class="btn btn-secondary">Cancelar</a>
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
    document.addEventListener("DOMContentLoaded", function() {
        const activoSelect = document.getElementById('activoSelect');
        const origenInput = document.getElementById('origenInput');
        const tipoactivoInput = document.getElementById('tipoactivoInput');
        const origenIDInput = document.getElementById('origenIDInput');

        // Inicializar Select2
        $(activoSelect).select2();

        // Al cargar la página, se establece el origen y tipo del primer activo seleccionado
        const selectedIndex = activoSelect.selectedIndex;
        origenInput.value = activoSelect.options[selectedIndex].dataset.origen;
        tipoactivoInput.value = activoSelect.options[selectedIndex].dataset.tipoactivo;
        origenIDInput.value = activoSelect.options[selectedIndex].dataset.origenid;

        // Detectar cuando el usuario cambia de activo en Select2
        $(activoSelect).on('select2:select', function(e) {
            const selectedOption = e.params.data.element; // Opción seleccionada dentro de Select2
            const origen = selectedOption.dataset.origen;
            const tipoactivo = selectedOption.dataset.tipoactivo; // Obtener el tipo de activo
            const origenid = selectedOption.dataset.origenid; // Obtener el origenID

            // Actualizar los campos con los valores correspondientes
            origenInput.value = origen;
            tipoactivoInput.value = tipoactivo;
            origenIDInput.value = origenid;
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ubicacionSelect = document.getElementById('ubicacionSelect');
        const destinoInput = document.getElementById('destinoInput');

        // Inicializar Select2
        $(ubicacionSelect).select2();

        // Al cargar la página, se establece el destino del primer activo seleccionado
        destinoInput.value = ubicacionSelect.options[ubicacionSelect.selectedIndex].dataset.destino;

        // Detectar cuando el usuario cambia de activo en Select2
        $(ubicacionSelect).on('select2:select', function(e) {
            const selectedOption2 = e.params.data.element; // Opción seleccionada dentro de Select2
            const destino = selectedOption2.dataset.destino;

            // Actualizar el campo de destino con el valor de data-destino
            destinoInput.value = destino;
        });
    });
</script>

<script>
// Forzar la recarga de la página completamente siempre que el usuario regrese a ella
window.addEventListener('pageshow', function(event) {
    if (event.persisted || window.performance && window.performance.navigation.type === 2) {
        // Recargar siempre cuando el usuario vuelva a la página
        window.location.reload();
    }
});

</script>