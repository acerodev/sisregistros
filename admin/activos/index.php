<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/tipos_activos/ListaTiposActivos.php');
include ('../../app/controllers/activos/ListaActivos.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Lista de Activos</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Activos registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo Activo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Tipo de Activo</center></th>
                                    <th><center>Estado Uso</center></th>
                                    <th><center>Código SBN</center></th>
                                    <th><center>Código CBP</center></th>
                                    <th><center>Marca</center></th>
                                    <th><center>Modelo</center></th>
                                    <th><center>Color</center></th>
                                    <th><center>Material / Carrocería</center></th>
                                    <th><center>Dimensiones</center></th>
                                    <th><center>Serie</center></th>
                                    <th><center>Año</center></th>
                                    <th><center>Estado Conservación</center></th>
                                    <th><center>Fecha Ini.Uso</center></th>
                                    <th><center>Fecha Adqui.</center></th>
                                    <th><center>Doc. Adqui.</center></th>
                                    <th><center>Doc. Ingreso</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_activos = 0;
                                foreach ($activos as $activoo){
                                    $id_activo = $activoo['id_activo'];
                                    $contador_activos = $contador_activos +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_activos;?></td>
                                        <td><?=$activoo['descripcion'];?></td>
                                        <td><?=$activoo['de_baja'];?></td>
                                        <td><?=$activoo['codigo_sbn'];?></td>
                                        <td><?=$activoo['codigo_cbp'];?></td>
                                        <td><?=$activoo['marca'];?></td>
                                        <td><?=$activoo['modelo'];?></td>
                                        <td><?=$activoo['color'];?></td>
                                        <td><?=$activoo['material'];?></td>
                                        <td><?=$activoo['dimensiones'];?></td>
                                        <td><?=$activoo['serie'];?></td>
                                        <td><?=$activoo['anio'];?></td>
                                        <td><?=$activoo['estado_conservacion'];?></td>
                                        <td><?=$activoo['fecha_iniuso'];?></td>
                                        <td><?=$activoo['fecha_adquisicion'];?></td>
                                        <td><?=$activoo['doc_adquisicion'];?></td>
                                        <td><?=$activoo['doc_ingreso'];?></td>
                                        <!--<td>
                                            <
                                            if($activoo['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </td>-->
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_activo;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="edit.php?id=<?=$id_activo;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <!-- <form action="<APP_URL;?>/app/controllers/activos/delete.php" onclick="preguntar<$id_activo;?>(event)" method="post" id="miFormulario<$id_activo;?>">
                                                    <input type="text" name="id_activo" value="<$id_activo;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<$id_activo;?>(event) {
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
                                                                var form = $('#miFormulario<$id_activo;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script> -->
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Activos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Activos",
                "infoFiltered": "(Filtrado de _MAX_ total Activos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Activos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
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