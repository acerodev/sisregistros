<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:08
 */

include ('../../../app/config.php');

$id_motivo = $_POST['id_motivo'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];

$pdo->beginTransaction();

/////////////////////// ACTUALIZAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('UPDATE motivo
SET codigo_mot=:codigo,
    descripcion_mot=:descripcion,
    fyh_actualizacion=:fyh_actualizacion
WHERE  id_motivo=:id_motivo ');

$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_motivo',$id_motivo);
//$sentencia->execute();


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el Motivo de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/motivo");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

