<?php

include ('../../../app/config.php');

$id_ubicacion = $_POST['id_ubicacion'];
$dependencia_ubi = $_POST['dependencia_ubi'];
$dependencia_area = $_POST['dependencia_area'];
$piso = $_POST['piso'];
$responsable_id = $_POST['responsable_id'];
$config_institucion_id = $_POST['config_institucion_id'];

$pdo->beginTransaction();

/////////////////////// ACTUALIZAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('UPDATE ubicaciones
SET dependencia_ubi=:dependencia_ubi,
    dependencia_area=:dependencia_area,
    piso=:piso,
    responsable_id=:responsable_id,
    config_institucion_id=:config_institucion_id,
    fyh_actualizacion=:fyh_actualizacion
WHERE  id_ubicacion=:id_ubicacion ');

$sentencia->bindParam(':dependencia_ubi',$dependencia_ubi);
$sentencia->bindParam(':dependencia_area',$dependencia_area);
$sentencia->bindParam(':piso',$piso);
$sentencia->bindParam(':responsable_id',$responsable_id);
$sentencia->bindParam(':config_institucion_id',$config_institucion_id);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_ubicacion',$id_ubicacion);
//$sentencia->execute();


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la ubicación de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/ubicaciones");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

