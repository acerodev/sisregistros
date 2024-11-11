<?php

include ('../../../app/config.php');

//$rol_id = $_POST['rol_id'];
$activo_id = $_POST['activo_id'];
$etiqueta_anno = $_POST['etiqueta_anno'];
$codigo_etiqueta = $_POST['codigo_etiqueta'];

try {
    // Iniciar la transacción
    $pdo->beginTransaction();

    // Preparar la sentencia de inserción
    $sentencia = $pdo->prepare('INSERT INTO etiquetas
        (activo_id, etiqueta_anno, codigo_etiqueta, fyh_creacion, estado)
        VALUES (:activo_id, :etiqueta_anno, :codigo_etiqueta, :fyh_creacion, :estado)');

    // Asignar valores a los parámetros
    $sentencia->bindParam(':activo_id', $activo_id);
    $sentencia->bindParam(':etiqueta_anno', $etiqueta_anno);
    $sentencia->bindParam(':codigo_etiqueta', $codigo_etiqueta);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':estado', $estado_de_registro);

    // Ejecutar la sentencia
    if ($sentencia->execute()) {
        echo 'success';
        // Confirmar la transacción
        $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "Se registró la etiqueta correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/etiquetas");
        exit(); // Asegúrate de salir después de redirigir
    } else {
        echo 'error al registrar a la base de datos';
        // Deshacer la transacción en caso de error
        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos, comuníquese con el administrador";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
        exit(); // Asegúrate de salir después de mostrar el mensaje
    }
} catch (Exception $e) {
    echo 'error al registrar a la base de datos';
    // Deshacer la transacción en caso de excepción
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    exit(); // Asegúrate de salir después de mostrar el mensaje
}
