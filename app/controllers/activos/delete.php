<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 4/1/2024
 * Time: 16:04
 */
include ('../../../app/config.php');

$id_activo = $_POST['id_activo'];

try {
    // Inicia la transacción
    $pdo->beginTransaction();

    // Prepara la sentencia de eliminación
    $sentencia = $pdo->prepare("DELETE FROM activos WHERE id_activo = :id_activo");
    $sentencia->bindParam(':id_activo', $id_activo);

    // Ejecuta la sentencia
    if ($sentencia->execute()) {
        // Aquí podrías agregar otras operaciones que deben realizarse junto con la eliminación

        // Si todo sale bien, confirma la transacción
        $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "Se eliminó el activo correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/activos");
    } else {
        // Si la eliminación falla, deshace los cambios
        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, comuníquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL . "/admin/activos");
    }
} catch (Exception $exception) {
    // En caso de excepción, deshace los cambios
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, porque este registro está en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL . "/admin/activos");
}

