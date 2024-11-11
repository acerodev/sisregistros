<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 4/1/2024
 * Time: 16:04
 */
include ('../../../app/config.php');

$id_parte = $_POST['id_parte'];


$sentencia = $pdo->prepare("DELETE FROM parte where id_parte=:id_parte ");

$sentencia->bindParam('id_parte',$id_parte);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino el Parte de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/parte");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/parte");
    }
}catch (Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro esta en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/parte");
}







