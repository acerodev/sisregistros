<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:08
 */

include ('../../../app/config.php');

$id_responsable = $_POST['id_responsable'];
$nombres = $_POST['nombres'];
$cargo = $_POST['cargo'];
$contacto = $_POST['contacto'];

$pdo->beginTransaction();

/////////////////////// ACTUALIZAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('UPDATE responsables
SET nombres=:nombres,
    cargo=:cargo,
    contacto=:contacto,
    fyh_actualizacion=:fyh_actualizacion
WHERE  id_responsable=:id_responsable ');

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':cargo',$cargo);
$sentencia->bindParam(':contacto',$contacto);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_responsable',$id_responsable);
//$sentencia->execute();


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el Responsable de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/responsables");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

