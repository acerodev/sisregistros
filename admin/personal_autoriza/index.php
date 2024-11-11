<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/personal_autoriza/ListadoAutoriza.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado del Personal que Autoriza</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">P.Autoriza registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo P.Autoriza</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Código</center></th>
                                    <th><center>Grado</center></th>
                                    <th><center>Nombres y Apellidos</center></th>
                                    <th><center>DNI</center></th>
                                    <th><center>Estado</center></th>
                                    <!-- <th><center>Acciones</center></th> -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_autorizas = 0;
                                foreach ($autorizas as $autoriza){
                                    $id_autoriza = $autoriza['id_autoriza'];
                                    $contador_autorizas = $contador_autorizas +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_autorizas;?></td>
                                        <td><?=$autoriza['codigo_aut'];?></td>
                                        <td><?=$autoriza['grado_aut'];?></td>
                                        <td><?=$autoriza['nombres_aut'].", ".$autoriza['apellidos_aut'];?></td>
                                        <td><?=$autoriza['dni_aut'];?></td>
                                        <!-- <td>
                                            <
                                            if($autoriza['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </td> -->
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_autoriza;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <?php if ($rol_sesion_usuario=="ADMINISTRADOR") { ?>
                                                <a href="edit.php?id=<?=$id_autoriza;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <form action="<?=APP_URL;?>/app/controllers/personal_autoriza/delete.php" onclick="preguntar<?=$id_autoriza;?>(event)" method="post" id="miFormulario<?=$id_autoriza;?>">
                                                    <input type="text" name="id_autoriza" value="<?=$id_autoriza;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_autoriza;?>(event) {
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
                                                                var form = $('#miFormulario<?=$id_autoriza;?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Autoriza",
                "infoEmpty": "Mostrando 0 a 0 de 0 Autoriza",
                "infoFiltered": "(Filtrado de _MAX_ total Autoriza)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Autoriza",
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