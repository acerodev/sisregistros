<?php

include ('../../../app/config.php');

$descripcion = $_POST['descripcion'];
$categoria_tipo = $_POST['categoria_tipo'];

$pdo->beginTransaction();

/////////////////////// INSERTAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('INSERT INTO tipos_activos
         (descripcion, categoria_tipo, fyh_creacion, estado)
VALUES (:descripcion,:categoria_tipo,:fyh_creacion,:estado)');

$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':categoria_tipo',$categoria_tipo);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

try {
    if ($sentencia->execute()) {
        // Confirmar la transacción si la inserción es exitosa
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se registró el tipo de activo de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/tipos_activos");
        exit; // Asegúrate de salir después de redirigir
    } else {
        // Lanzar una excepción si no se pudo ejecutar la sentencia
        throw new Exception('Error al registrar en la base de datos');
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
