<?php

include ('../../../app/config.php');

$id_tipo = $_POST['id_tipo'];
$descripcion = $_POST['descripcion'];
$categoria_tipo = $_POST['categoria_tipo'];

$pdo->beginTransaction();

/////////////////////// ACTUALIZAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('UPDATE tipos_activos
SET descripcion=:descripcion,
    categoria_tipo=:categoria_tipo,
    fyh_actualizacion=:fyh_actualizacion
WHERE  id_tipo=:id_tipo ');

$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':categoria_tipo',$categoria_tipo);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_tipo',$id_tipo);
//$sentencia->execute();

try {
    if ($sentencia->execute()) {
        // Confirmar la transacción si la actualización es exitosa
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se actualizó el tipo de activo correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/tipos_activos");
        exit; // Asegúrate de salir después de redirigir
    } else {
        // En caso de que no se actualice, lanzar una excepción
        throw new Exception('Error al actualizar el registro');
    }
} catch (Exception $exception) {
    // Deshacer los cambios si hay un error
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error: " . $exception->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: ' . APP_URL . "/admin/tipos_activos");
    exit; // Asegúrate de salir después de redirigir
}