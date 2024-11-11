<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/unidad_vehicular/ListadodeUnidadVehicular.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de Unidades Vehiculares</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Unidades Vehiculares registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nueva Unidad</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Tipo Vehiculo</center></th>
                                    <th><center>Estado de Uso</center></th>
                                    <th><center>Placa</center></th>
                                    <th><center>Marca</center></th>
                                    <th><center>Modelo</center></th>
                                    <th><center>Número Motor</center></th>
                                    <th><center>Número Chasis</center></th>
                                    <th><center>Año Fabricación</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_unidad_vehicular = 0;
                                foreach ($unidad_vehs as $unidad_veh){
                                    $id_unidad_vehicular = $unidad_veh['id_unidad_vehicular'];
                                    $contador_unidad_vehicular = $contador_unidad_vehicular +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_unidad_vehicular;?></td>
                                        <td><?=$unidad_veh['descripcion'];?></td>
                                        <td><?=$unidad_veh['de_baja'];?></td>
                                        <td><?=$unidad_veh['placa'];?></td>
                                        <td><?=$unidad_veh['marca'];?></td>
                                        <td><?=$unidad_veh['modelo'];?></td>
                                        <td><?=$unidad_veh['numero_motor'];?></td>
                                        <td><?=$unidad_veh['numero_chasis'];?></td>
                                        <td style="text-align: center"><?=$unidad_veh['ano_fab'];?></td>
                                        <!-- <td>
                                            <
                                            if($unidad_veh['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </td> -->
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_unidad_vehicular;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <?php if ($rol_sesion_usuario=="ADMINISTRADOR") { ?>
                                                <a href="edit.php?id=<?=$id_unidad_vehicular;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <!-- <form action="<APP_URL;?>/app/controllers/unidad_vehicular/delete.php" onclick="preguntar<$id_unidad_vehicular;?>(event)" method="post" id="miFormulario<$id_unidad_vehicular;?>">
                                                    <input type="text" name="id_unidad_vehicular" value="<$id_unidad_vehicular;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<$id_unidad_vehicular;?>(event) {
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
                                                                var form = $('#miFormulario<$id_unidad_vehicular;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script>-->                                                
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Unidades",
                "infoEmpty": "Mostrando 0 a 0 de 0 Unidades",
                "infoFiltered": "(Filtrado de _MAX_ total Unidades)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Unidades",
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