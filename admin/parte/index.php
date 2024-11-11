<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/parte/ListadodePartes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de Partes</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Partes registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear Parte</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Unidad Vehicular</center></th>
                                    <th><center>Mes</center></th>
                                    <th><center>ID Parte</center></th>
                                    <th><center>Fecha de Salida</center></th>
                                    <th><center>Hora de Salida</center></th>
                                    <th><center>Fecha de Ingreso</center></th>
                                    <th><center>Hora de Ingreso</center></th>
                                    <th><center>KM de Salida</center></th>
                                    <th><center>KM de Ingreso</center></th>
                                    <th><center>Dirección</center></th>
                                    <th><center>Autoriza</center></th>
                                    <th><center>Al Mando</center></th>
                                    <th><center>Conductor</center></th>
                                    <th><center>Motivo</center></th>
                                    <th><center>KM Recorrido</center></th>
                                    <th><center>Horas Recorridas</center></th>
                                    <th><center>Abastecimiento de combustible</center></th>
                                    <th><center>Observaciones</center></th>
                                    <!--<th><center>Estado</center></th>-->
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_partes = 0;
                                foreach ($partes as $parte){
                                    $id_parte = $parte['id_parte'];
                                    $contador_partes = $contador_partes +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_partes;?></td>
                                        <td><?=$parte['descripcion']." - ".$parte['placa'];?></td>
                                        <td><?=$parte['mes'];?></td>
                                        <td><?=$parte['cod_parte'];?></td>
                                        <td><?=$parte['fecha_salida'];?></td>
                                        <td><?=$parte['hora_salida'];?></td>
                                        <td><?=$parte['fecha_ingreso'];?></td>
                                        <td><?=$parte['hora_ingreso'];?></td>
                                        <td><?=$parte['km_salida'];?></td>
                                        <td><?=$parte['km_ingreso'];?></td>
                                        <td><?=$parte['direccion_parte'];?></td>
                                        <td><?=$parte['codigo_aut']." | ".$parte['nombres_aut'].", ".$parte['apellidos_aut'];?></td>
                                        <td><?=$parte['codigo_man']." | ".$parte['nombres_man'].", ".$parte['apellidos_man'];?></td>
                                        <td><?=$parte['cod_conductor'];?></td>
                                        <td><?=$parte['codigo_mot']." | ".$parte['descripcion_mot'];?></td>
                                        <td><?=$parte['km_recorrido'];?></td>
                                        <td><?=$parte['horas_recorridas'];?></td>
                                        <td><?=$parte['abs_combustible'];?></td>
                                        <td><?=$parte['observaciones'];?></td>
                                        <?php $cod_conductor = $parte['cod_conductor']; ?>
                                        <!--<td>
                                            <
                                            if($parte['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </td>-->
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_parte;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <?php if (($rol_sesion_usuario=="ADMINISTRADOR") || ($rol_sesion_usuario=="SEGUNDO JEFE") || ($cod_conductor==$codnombresdelusuario)) { ?>
                                                <a href="edit.php?id=<?=$id_parte;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <?php } ?>
                                                <?php if (($rol_sesion_usuario=="ADMINISTRADOR") || ($rol_sesion_usuario=="SEGUNDO JEFE")) { ?>
                                                <form action="<?=APP_URL;?>/app/controllers/parte/delete.php" onclick="preguntar<?=$id_parte;?>(event)" method="post" id="miFormulario<?=$id_parte;?>">
                                                    <input type="text" name="id_parte" value="<?=$id_parte;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_parte;?>(event) {
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
                                                                var form = $('#miFormulario<?=$id_parte;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script>
                                                <?php } ?>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Partes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Partes",
                "infoFiltered": "(Filtrado de _MAX_ total Partes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Partes",
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