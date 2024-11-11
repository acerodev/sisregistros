<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 4/1/2024
 * Time: 16:04
 */
include ('../../../app/config.php');

$id_ubicacion = $_POST['id_ubicacion'];


$sentencia = $pdo->prepare("DELETE FROM ubicaciones where id_ubicacion=:id_ubicacion ");

$sentencia->bindParam('id_ubicacion',$id_ubicacion);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino la ubicación de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/ubicaciones");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/ubicaciones");
    }
}catch (Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro esta en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/ubicaciones");
}







