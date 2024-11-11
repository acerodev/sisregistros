<?php

include ('../../../app/config.php');

//$rol_id = $_POST['rol_id'];
$codigo = $_POST['codigo'];
$grado = $_POST['grado'];
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];


$pdo->beginTransaction();

/////////////////////// INSERTAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('INSERT INTO autoriza
         (codigo_aut, grado_aut, dni_aut, nombres_aut, apellidos_aut, fyh_creacion, estado)
VALUES ( :codigo,:grado,:dni,:nombres,:apellidos,:fyh_creacion,:estado)');

$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':grado',$grado);
$sentencia->bindParam(':dni',$dni);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se registro el personal que Autoriza de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/personal_autoriza");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
