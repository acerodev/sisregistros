<?php

include ('../../../app/config.php');

//$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$cargo = $_POST['cargo'];
$contacto = $_POST['contacto'];


$pdo->beginTransaction();

/////////////////////// INSERTAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('INSERT INTO responsables
         (nombres, cargo, contacto, fyh_creacion, estado)
VALUES (:nombres,:cargo,:contacto,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':cargo',$cargo);
$sentencia->bindParam(':contacto',$contacto);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se registro el responsable de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/responsables");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
