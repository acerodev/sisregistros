<?php

include ('../../../app/config.php');

//$rol_id = $_POST['rol_id'];
$config_institucion_id = $_POST['config_institucion_id'];
$responsable_id = $_POST['responsable_id'];
$piso = $_POST['piso'];
$dependencia_ubi = $_POST['dependencia_ubi'];
$dependencia_area = $_POST['dependencia_area'];


$pdo->beginTransaction();

/////////////////////// INSERTAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('INSERT INTO ubicaciones
         (config_institucion_id, responsable_id, piso, dependencia_ubi, dependencia_area, fyh_creacion, estado)
VALUES (:config_institucion_id,:responsable_id,:piso,:dependencia_ubi,:dependencia_area,:fyh_creacion,:estado)');

$sentencia->bindParam(':config_institucion_id',$config_institucion_id);
$sentencia->bindParam(':responsable_id',$responsable_id);
$sentencia->bindParam(':piso',$piso);
$sentencia->bindParam(':dependencia_ubi',$dependencia_ubi);
$sentencia->bindParam(':dependencia_area',$dependencia_area);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se registro la ubicación de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/ubicaciones");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
