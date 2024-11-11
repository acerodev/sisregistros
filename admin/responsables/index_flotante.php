<?php

//$id_responsable = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

//include ('../../app/controllers/responsables/DatosResponsable.php');
include ('../../app/controllers/responsables/ListaResponsables.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>LISTA DE RESPONSABLES</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Responsables registrados</h3>
                            <div style="text-align: right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="bi bi-cash"></i> Crear Responsables
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm table-hovers">
                                <tr>
                                    <th style="text-align: center;background-color: #0cd0e6">Nro</th>
                                    <th style="text-align: center;background-color: #0cd0e6">Apellidos y Nombres</th>
                                    <th style="text-align: center;background-color: #0cd0e6">Cargo</th>
                                    <th style="text-align: center;background-color: #0cd0e6">Contacto</th>
                                    <th style="text-align: center;background-color: #0cd0e6">Acciones</th>
                                </tr>
                                <?php
                                $contador = 0;
                                foreach ($responsables as $responsable){
                                    $id_responsable = $responsable['id_responsable']; ?>
                                    <tr>
                                        <td><center><?=$contador = $contador +1;?></center></td>
                                        <td><?=$responsable['nombres'];?></td>
                                        <td><center><?=$responsable['cargo'];?></center></td>
                                        <td><center><?=$responsable['contacto'];?></center></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" data-toggle="modal" data-target="#Modal_editar<?=$id_responsable;?>" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="Modal_editar<?=$id_responsable;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #0fbf0c">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar responsable</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?=APP_URL;?>/app/controllers/responsables/update.php" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <input type="text" name="id_responsable" value="<?=$id_responsable;?>" hidden>
                                                                                <label for="">Apellidos y Nombres</label>
                                                                                <input type="text" name="nombres" class="form-control" value="<?=$responsable['nombres'];?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Cargo</label>
                                                                                <input type="text" name="cargo" class="form-control" value="<?=$responsable['cargo'];?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Contacto</label>
                                                                                <input type="text" name="contacto" value="<?=$responsable['contacto'];?>" class="form-control">
                                                                            </div>
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

                                                <form action="<?=APP_URL;?>/app/controllers/responsables/delete.php" onclick="preguntar(<?=$id_responsable;?>)(event)" method="post" id="miFormulario<?=$id_responsable;?>">
                                                    <input type="text" name="id_responsable" value="<?=$id_responsable;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 0px 0px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar(id) {
                                                        return function(event) {
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
                                                    }
                                                </script>
                                                <!-- <a href="ticket_pago.php?id=<$id_responsable;?>&&id_responsable=<$id_responsable;?>" type="button" class="btn btn-warning btn-sm" target="_blank"><i class="bi bi-printer"></i></a>-->
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

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

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0cd0e6">
                <h5 class="modal-title" id="exampleModalLabel">Registrar responsables</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=APP_URL;?>/app/controllers/responsables/create.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Apellidos y Nombres</label>
                                <input type="text" name="nombres" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Cargo</label>
                                <input type="text" name="cargo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Contacto</label>
                                <input type="text" name="contacto" class="form-control">
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