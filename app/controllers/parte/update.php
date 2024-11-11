<?php

include ('../../../app/config.php');

$id_parte = $_POST['id_parte'];
$administrativo_id = $_POST['administrativo_id'];
$autoriza_id = $_POST['autoriza_id'];
$mando_id = $_POST['mando_id'];
$motivo_id = $_POST['motivo_id'];
$unidad_vehicular_id = $_POST['unidad_vehicular_id'];

$cod_parte = $_POST['cod_parte'];
$mes = $_POST['mes'];
$fecha_salida = $_POST['fecha_salida'];
$hora_salida = $_POST['hora_salida'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$hora_ingreso = $_POST['hora_ingreso'];
$km_salida = $_POST['km_salida'];
$km_ingreso = $_POST['km_ingreso'];
$km_recorrido = $_POST['km_recorrido'];
$horas_recorridas = $_POST['horas_recorridas'];
$abs_combustible = $_POST['abs_combustible'];
$direccion_parte = $_POST['direccion_parte'];
$observaciones = $_POST['observaciones'];

try {

    $pdo->beginTransaction();

    $sentencia = $pdo->prepare('UPDATE parte
    SET cod_parte=:cod_parte,
        autoriza_id=:autoriza_id,
        mando_id=:mando_id,
        administrativo_id=:administrativo_id,
        motivo_id=:motivo_id,
        unidad_vehicular_id=:unidad_vehicular_id,
        mes=:mes,
        fecha_salida=:fecha_salida,
        hora_salida=:hora_salida,
        fecha_ingreso=:fecha_ingreso,
        hora_ingreso=:hora_ingreso,
        km_salida=:km_salida,
        km_ingreso=:km_ingreso, 
        direccion_parte=:direccion_parte,
        km_recorrido=:km_recorrido,
        horas_recorridas=:horas_recorridas,
        abs_combustible=:abs_combustible,
        observaciones=:observaciones,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_parte=:id_parte');

    $sentencia->bindParam(':administrativo_id',$administrativo_id);
    $sentencia->bindParam(':autoriza_id',$autoriza_id);
    $sentencia->bindParam(':mando_id',$mando_id);
    $sentencia->bindParam(':motivo_id',$motivo_id);
    $sentencia->bindParam(':unidad_vehicular_id',$unidad_vehicular_id);

    $sentencia->bindParam(':cod_parte',$cod_parte);
    $sentencia->bindParam(':mes',$mes);
    $sentencia->bindParam(':fecha_salida',$fecha_salida);
    $sentencia->bindParam(':hora_salida',$hora_salida);
    $sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
    $sentencia->bindParam(':hora_ingreso',$hora_ingreso);
    $sentencia->bindParam(':km_salida',$km_salida);
    $sentencia->bindParam(':km_ingreso',$km_ingreso);
    $sentencia->bindParam(':km_recorrido',$km_recorrido);
    $sentencia->bindParam(':horas_recorridas',$horas_recorridas);
    $sentencia->bindParam(':abs_combustible',$abs_combustible);
    $sentencia->bindParam(':direccion_parte',$direccion_parte);
    $sentencia->bindParam(':observaciones',$observaciones);
    $sentencia->bindParam('fyh_actualizacion',$fechaHora);
    $sentencia->bindParam('id_parte',$id_parte);



    if($sentencia->execute()){
        echo 'success';
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se actualizó el Parte de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/parte");
    //header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }

} catch (PDOException $e) {
    // Si hay un error, captura el mensaje
    $pdo->rollBack();
    session_start();
    $errorMessage = $e->getMessage();
    if (strpos($errorMessage, 'cod_parte') !== false) {
        $_SESSION['mensaje'] = "El ID Parte ya existe en la base de datos";
    } else {
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos, comuníquese con el administrador";
    }        

    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

