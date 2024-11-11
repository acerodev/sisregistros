<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/movimientos_inventarios/ListaMovimientos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de Movimientos</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Movimientos registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo Movimiento</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Activo</center></th>
                                    <th><center>Tipo Movimiento</center></th>
                                    <th><center>Origen</center></th>
                                    <th><center>Destino</center></th>
                                    <th><center>Fecha Movimiento</center></th>
                                    <th><center>Documento</center></th>
                                    <!-- <th><center>Descripción</center></th> -->
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_movimientos = 0;
                                foreach ($movimientos as $movimiento){
                                    $id_movimiento = $movimiento['id_movimiento'];
                                    $contador_movimientos = $contador_movimientos +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_movimientos;?></td>
                                        <td><?=$movimiento['codigo_sbn'].' | '.$movimiento['codigo_cbp'].' | '.$movimiento['descripcion'];?></td>
                                        <td><?=$movimiento['tipo_movimiento'];?></td>
                                        <td><?=$movimiento['lugar_origen'];?></td>
                                        <td><?=$movimiento['lugar_destino'];?></td>
                                        <td><?=$movimiento['fecha_movimiento'];?></td>
                                        <td><?=$movimiento['documento_movimiento'];?></td>
                                        <!-- <td><$movimiento['descripcion_mov'];?></td> -->
                                        <!--<td>
                                            <
                                            if($movimiento['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </td>-->
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_movimiento;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <!-- <a href="edit.php?id=<$id_movimiento;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <form action="<APP_URL;?>/app/controllers/movimientos_inventarios/delete.php" onclick="preguntar<$id_movimiento;?>(event)" method="post" id="miFormulario<$id_movimiento;?>">
                                                    <input type="text" name="id_movimiento" value="<$id_movimiento;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<$id_movimiento;?>(event) {
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
                                                                var form = $('#miFormulario<$id_movimiento;?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Movimiento",
                "infoEmpty": "Mostrando 0 a 0 de 0 Movimiento",
                "infoFiltered": "(Filtrado de _MAX_ total Movimiento)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Movimiento",
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