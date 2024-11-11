<?php

include ('../../../app/config.php');

//$rol_id = $_POST['rol_id'];
$activo_id = $_POST['activo_id'];
$tipo_movimiento = $_POST['tipo_movimiento'];
$lugar_origen = $_POST['lugar_origen'];
$lugar_destino = $_POST['lugar_destino'];
$fecha_movimiento = $_POST['fecha_movimiento'];
$documento_movimiento = $_POST['documento_movimiento'];
$descripcion_mov = $_POST['descripcion_mov'];
$cantidad_mov = 1;

$ubicacion_idresta = $_POST['ubicacion_idresta'];
$ubicacion_id = $_POST['ubicacion_id'];
$tipo_activo_id = $_POST['tipo_activo_id'];

$estado_usomov = "DE BAJA";

try {
    // Iniciar la transacción
    $pdo->beginTransaction();

    // Verificar si hay stock suficiente antes de proceder
    $sentencia_verificar = $pdo->prepare('SELECT cantidad FROM stock WHERE tipo_activo_id = :tipo_activo_id AND ubicacion_id = :ubicacion_id');
    $sentencia_verificar->bindParam(':tipo_activo_id', $tipo_activo_id);
    $sentencia_verificar->bindParam(':ubicacion_id', $ubicacion_idresta);
    $sentencia_verificar->execute();
    $cantidad_stock = $sentencia_verificar->fetchColumn();

    if ($cantidad_stock === false || $cantidad_stock < $cantidad_mov) {
        // Si no hay suficiente stock, no continuar con la transacción
        echo 'Error: No hay suficiente cantidad en stock para realizar la operación.';
        exit(); // Detener el script
    }

    // Preparar la sentencia de inserción
    $sentencia = $pdo->prepare('INSERT INTO movimientos_inventario
                (activo_id, tipo_movimiento, lugar_origen, lugar_destino, fecha_movimiento, documento_movimiento, descripcion_mov, cantidad_mov, fyh_creacion, estado)
        VALUES (:activo_id, :tipo_movimiento, :lugar_origen, :lugar_destino, :fecha_movimiento, :documento_movimiento, :descripcion_mov, :cantidad_mov, :fyh_creacion, :estado)');

    // Asignar valores a los parámetros
    $sentencia->bindParam(':activo_id', $activo_id);
    $sentencia->bindParam(':tipo_movimiento', $tipo_movimiento);
    $sentencia->bindParam(':lugar_origen', $lugar_origen);
    $sentencia->bindParam(':lugar_destino', $lugar_destino);
    $sentencia->bindParam(':fecha_movimiento', $fecha_movimiento);
    $sentencia->bindParam(':documento_movimiento', $documento_movimiento);
    $sentencia->bindParam(':descripcion_mov', $descripcion_mov);
    $sentencia->bindParam(':cantidad_mov', $cantidad_mov);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':estado', $estado_de_registro);
    $sentencia->execute();

    //$id_movimiento = $pdo->lastInsertId();

    // INSERTAR A LA TABLA HISTORIAL MOVIMIENTOS
    $sentencia = $pdo->prepare('INSERT INTO historial_ubicaciones
        (activo_id, ubicacion_id, fecha_cambio, fyh_creacion, estado)
        VALUES (:activo_id, :ubicacion_id, :fecha_cambio, :fyh_creacion, :estado)');

    $sentencia->bindParam(':activo_id', $activo_id);
    $sentencia->bindParam(':ubicacion_id', $ubicacion_id);
    $sentencia->bindParam(':fecha_cambio', $fechaHora);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':estado', $estado_de_registro);
    $sentencia->execute();

    //$id_historial = $pdo->lastInsertId();

    //////////////////////// RESTAR EN LA TABLA STOCK
    // Resta la cantidad en la ubicación de origen
    $sentencia = $pdo->prepare('UPDATE stock
        SET cantidad = cantidad - :cantidad,
            fecha_actualizacion = :fecha_actualizacion
        WHERE tipo_activo_id = :tipo_activo_id 
        AND ubicacion_id = :ubicacion_id
        AND cantidad > 0');

    $sentencia->bindParam(':tipo_activo_id', $tipo_activo_id);
    $sentencia->bindParam(':ubicacion_id', $ubicacion_idresta);
    $sentencia->bindParam(':cantidad', $cantidad_mov);
    $sentencia->bindParam(':fecha_actualizacion', $fechaHora);
    $sentencia->execute();

    ///////////// ESTO SIRVE PARA REALIZAR EL CAMBIO DE ESTADO DE USO, PASA DE "OPERATIVO" A "DE BAJA" CUANDO LA UBICACIÓN ES EL CENTRO DE ACOPIO
    if ($ubicacion_id == 10) {
        $sentencia = $pdo->prepare('UPDATE activos
            SET de_baja = :de_baja,
                fyh_actualizacion = :fyh_actualizacion
            WHERE id_activo = :activo_id ');

        $sentencia->bindParam(':activo_id', $activo_id);
        $sentencia->bindParam(':de_baja', $estado_usomov);
        $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
        $sentencia->execute();
    }

    /////////////////////// INSERTAR A LA TABLA STOCK
    $sentencia = $pdo->prepare('INSERT INTO stock
            (tipo_activo_id, ubicacion_id, cantidad, fecha_actualizacion, fyh_creacion, estado)
    VALUES (:tipo_activo_id,:ubicacion_id,:cantidad,:fecha_actualizacion,:fyh_creacion,:estado)
    ON DUPLICATE KEY UPDATE
        cantidad = cantidad + VALUES(cantidad),
        fecha_actualizacion = VALUES(fecha_actualizacion),
        estado = VALUES(estado), 
        fyh_creacion = VALUES(fyh_creacion)');

    $sentencia->bindParam(':tipo_activo_id',$tipo_activo_id);
    $sentencia->bindParam(':ubicacion_id',$ubicacion_id);
    $sentencia->bindParam(':cantidad',$cantidad_mov);
    $sentencia->bindParam(':fecha_actualizacion',$fechaHora);
    $sentencia->bindParam(':fyh_creacion',$fechaHora);
    $sentencia->bindParam(':estado',$estado_de_registro);

    // Ejecutar la sentencia
    if ($sentencia->execute()) {
        echo 'success';
        // Confirmar la transacción
        $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "Se registró el movimiento correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/movimientos_inventarios");
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
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    exit(); // Asegúrate de salir después de mostrar el mensaje
}
