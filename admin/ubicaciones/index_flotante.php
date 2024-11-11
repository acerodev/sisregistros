<?php

//$id_ubicacion = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

//include ('../../app/controllers/ubicaciones/DatosUbicaciones.php');
include ('../../app/controllers/ubicaciones/ListaUbicaciones.php');
include ('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include ('../../app/controllers/responsables/ListaResponsables.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>LISTA DE UBICACIONES</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ubicaciones registrados</h3>
                            <div class="card-tools" style="text-align: right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="bi bi-cash"></i> Crear Ubicaciones
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; background-color: #0cd0e6">Nro</th>
                                        <th style="text-align: center; background-color: #0cd0e6">Dependencia (Área)</th>
                                        <th style="text-align: center; background-color: #0cd0e6">Piso</th>
                                        <th style="text-align: center; background-color: #0cd0e6">Responsable</th>
                                        <th style="text-align: center; background-color: #0cd0e6">Sede</th>
                                        <th style="text-align: center; background-color: #0cd0e6">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($ubicaciones as $ubicacion) {
                                        $id_ubicacion = $ubicacion['id_ubicacion'] ?? ''; // Usa el operador de fusión de null
                                        $contador++;
                                    ?>
                                        <tr>
                                            <td style="text-align: center"><?= htmlspecialchars($contador); ?></td>
                                            <td style="text-align: center"><?= htmlspecialchars($ubicacion['dependencia_area'] ?? ''); ?></td>
                                            <td style="text-align: center"><?= htmlspecialchars($ubicacion['piso'] ?? ''); ?></td>
                                            <td style="text-align: center"><?= htmlspecialchars($ubicacion['nombres'] ?? ''); ?></td>
                                            <td><?= htmlspecialchars($ubicacion['nombre_institucion'] ?? ''); ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" data-toggle="modal" data-target="#Modal_editar<?= htmlspecialchars($id_ubicacion); ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="Modal_editar<?= htmlspecialchars($id_ubicacion); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #0fbf0c">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar ubicación</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= APP_URL; ?>/app/controllers/ubicaciones/update.php" method="post">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" name="id_ubicacion" value="<?= htmlspecialchars($id_ubicacion); ?>" hidden>
                                                                                    <label for="">Dependencia (Área)</label>
                                                                                    <input type="text" name="dependencia_area" class="form-control" value="<?= htmlspecialchars($ubicacion['dependencia_area']); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Piso</label>
                                                                                    <input type="text" name="piso" class="form-control" value="<?= htmlspecialchars($ubicacion['piso']); ?>">
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
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form action="<?= APP_URL; ?>/app/controllers/ubicaciones/delete.php" onclick="preguntar(<?= htmlspecialchars($id_ubicacion); ?>, event)" method="post" id="miFormulario<?= htmlspecialchars($id_ubicacion); ?>">
                                                        <input type="text" name="id_ubicacion" value="<?= htmlspecialchars($id_ubicacion); ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                    <script>
                                                        function preguntar(id, event) {
                                                            event.preventDefault();
                                                            Swal.fire({
                                                                title: 'Eliminar registro',
                                                                text: '¿Desea eliminar este registro?',
                                                                icon: 'question',
                                                                showDenyButton: true,
                                                                confirmButtonText: 'Eliminar',
                                                                confirmButtonColor: '#a5161d',
                                                                denyButtonColor: '#270a0a',
                                                                denyButtonText: 'Cancelar',
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    var form = $('#miFormulario' + id);
                                                                    form.submit();
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Motivo",
                "infoEmpty": "Mostrando 0 a 0 de 0 Motivo",
                "infoFiltered": "(Filtrado de _MAX_ total Motivo)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Motivo",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,
            "columnDefs": [
                { 
                    "targets": -1, 
                    "visible": true, // Mantiene la columna visible en la vista
                    "className": 'noExport' // Añade una clase para identificación
                }
            ],
            "buttons": [
                {
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [
                        {
                            text: 'Copiar',
                            extend: 'copy',
                        },
                        {
                            extend: 'pdf',
                            text: 'Exportar a PDF',
                            exportOptions: {
                                columns: function (index, data, node) {
                                    // Excluye la última columna (Acciones) en PDF
                                    return $(node).hasClass('noExport') ? false : true;
                                }
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'Exportar a CSV',
                            exportOptions: {
                                columns: function (index, data, node) {
                                    // Excluye la última columna (Acciones) en CSV
                                    return $(node).hasClass('noExport') ? false : true;
                                }
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Exportar a Excel',
                            exportOptions: {
                                columns: function (index, data, node) {
                                    // Excluye la última columna (Acciones) en Excel
                                    return $(node).hasClass('noExport') ? false : true;
                                }
                            }
                        },
                        {
                            text: 'Imprimir',
                            extend: 'print',
                            exportOptions: {
                                columns: function (index, data, node) {
                                    // Excluye la última columna (Acciones) en impresión
                                    return $(node).hasClass('noExport') ? false : true;
                                }
                            }
                        }
                    ]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0cd0e6">
                <h5 class="modal-title" id="exampleModalLabel">Registrar ubicaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=APP_URL;?>/app/controllers/ubicaciones/create.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Sede</label>
                                <select name="config_institucion_id" id="" class="form-control">
                                    <?php
                                    foreach ($instituciones as $institucion){ ?>
                                        <option value="<?=$institucion['id_config_institucion'];?>"><?=$institucion['nombre_institucion'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Responsable</label>
                                <select name="responsable_id" id="" class="form-control">
                                    <?php
                                    foreach ($responsables as $responsable){ ?>
                                        <option value="<?=$responsable['id_responsable'];?>"><?=$responsable['nombres'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Piso</label>
                                <input type="text" name="piso" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Dependencia (Área)</label>
                                <input type="text" name="dependencia_area" class="form-control">
                            </div>
                        </div>                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>