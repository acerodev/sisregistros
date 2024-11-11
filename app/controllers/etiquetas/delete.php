<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 4/1/2024
 * Time: 16:04
 */
include ('../../../app/config.php');

$id_etiqueta = $_POST['id_etiqueta'];


$sentencia = $pdo->prepare("DELETE FROM etiquetas where id_etiqueta=:id_etiqueta ");

$sentencia->bindParam('id_etiqueta',$id_etiqueta);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino la etiqueta de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/etiquetas");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/etiquetas");
    }
}catch (Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro esta en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/etiquetas");
}







