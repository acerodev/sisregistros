<?php

include ('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$activar = 1;

$pdo->beginTransaction();

$sentencia = $pdo->prepare("UPDATE usuarios 
SET fyh_actualizacion=:fyh_actualizacion,
    estado=:estado
WHERE id_usuario=:id_usuario ");

$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':estado',$activar);
$sentencia->bindParam('id_usuario',$id_usuario);

try{
    if($sentencia->execute()){
        echo 'success';
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se activo el usuarios de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/usuarios");
    }else {
        echo 'error al registrar a la base de datos';
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }
}catch (Exception $exception){
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "El email de este usuario ya existe en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
