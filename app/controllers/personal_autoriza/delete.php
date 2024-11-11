<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 4/1/2024
 * Time: 16:04
 */
include ('../../../app/config.php');

$id_autoriza = $_POST['id_autoriza'];


$sentencia = $pdo->prepare("DELETE FROM autoriza where id_autoriza=:id_autoriza ");

$sentencia->bindParam('id_autoriza',$id_autoriza);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino al personal que Autoriza de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/personal_autoriza");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/personal_autoriza");
    }
}catch (Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro esta en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/personal_autoriza");
}







