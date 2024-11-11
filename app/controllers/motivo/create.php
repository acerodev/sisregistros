<?php

include ('../../../app/config.php');

//$rol_id = $_POST['rol_id'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];


$pdo->beginTransaction();

/////////////////////// INSERTAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('INSERT INTO motivo
         (codigo_mot, descripcion_mot, fyh_creacion, estado)
VALUES (:codigo,:descripcion,:fyh_creacion,:estado)');

$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se registro el Motivo de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/motivo");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

