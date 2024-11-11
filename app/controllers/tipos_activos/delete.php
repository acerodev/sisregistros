<?php

include ('../../../app/config.php');

$id_tipo = $_POST['id_tipo'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tipos_activos where id_tipo=:id_tipo ");

$sentencia->bindParam('id_tipo',$id_tipo);

try {
    // Ejecutar la sentencia
    if ($sentencia->execute()) {
        // Confirmar la transacción si la eliminación es exitosa
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se eliminó el tipo de activo correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/tipos_activos");
    } else {
        // En caso de que no se elimine, lanzar una excepción
        throw new Exception('No se pudo eliminar el registro');
    }
} catch (Exception $exception) {
    // Deshacer los cambios si hay un error
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, porque este registro está en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL . "/admin/tipos_activos");
}