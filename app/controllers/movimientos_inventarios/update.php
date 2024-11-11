<?php

include ('../../../app/config.php');

$id_etiqueta = $_POST['id_etiqueta'];
$activo_id = $_POST['activo_id'];
$etiqueta_anno = $_POST['etiqueta_anno'];
$codigo_etiqueta = $_POST['codigo_etiqueta'];

try {
    // Iniciar la transacción
    $pdo->beginTransaction();

    // Preparar la sentencia de actualización
    $sentencia = $pdo->prepare('UPDATE etiquetas
        SET activo_id = :activo_id,
            etiqueta_anno = :etiqueta_anno,
            codigo_etiqueta = :codigo_etiqueta,
            fyh_actualizacion = :fyh_actualizacion
        WHERE id_etiqueta = :id_etiqueta');

    // Asignar valores a los parámetros
    $sentencia->bindParam(':activo_id', $activo_id);
    $sentencia->bindParam(':etiqueta_anno', $etiqueta_anno);
    $sentencia->bindParam(':codigo_etiqueta', $codigo_etiqueta);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id_etiqueta', $id_etiqueta); // Añadir ':' en 'id_etiqueta'

    // Ejecutar la sentencia
    if ($sentencia->execute()) {
        // Confirmar la transacción
        $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "Se actualizó la etiqueta correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/etiquetas");
        exit(); // Asegúrate de salir después de redirigir
    } else {
        // Deshacer la transacción en caso de error
        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos, comuníquese con el administrador";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
        exit(); // Asegúrate de salir después de mostrar el mensaje
    }
} catch (Exception $e) {
    // Deshacer la transacción en caso de excepción
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    exit(); // Asegúrate de salir después de mostrar el mensaje
}
