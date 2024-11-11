<?php

include ('../../../app/config.php');

$id_unidad_vehicular = $_POST['id_unidad_vehicular'];
$activo_id = $_POST['activo_id'];
$placa = $_POST['placa'];
$categoria = $_POST['categoria'];
$ano_fab = $_POST['ano_fab'];
$numero_motor = $_POST['numero_motor'];
$numero_chasis = $_POST['numero_chasis'];

$tipo_activo_id = $_POST['tipo_activo_id'];
$codigo_sbn = $_POST['codigo_sbn'];
$codigo_cbp = $_POST['codigo_cbp'];
$material = $_POST['material'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$estado_conservacion = $_POST['estado_conservacion'];
$dimensiones = $_POST['dimensiones'];
$serie = $_POST['serie'];
$anio = $_POST['anio'];
$fecha_iniuso = $_POST['fecha_iniuso'];
$fecha_adquisicion = $_POST['fecha_adquisicion'];
$doc_adquisicion = $_POST['doc_adquisicion'];
$doc_ingreso = $_POST['doc_ingreso'];
$de_baja = $_POST['de_baja'];
$observaciones = $_POST['observaciones'];

try {

    $pdo->beginTransaction();

    /////////////////////// ACTUALIZAR A LA TABLA UNIDAD VEHICULAR
    $sentencia = $pdo->prepare('UPDATE unidad_vehicular
    SET activo_id=:activo_id,
        placa=:placa,
        categoria=:categoria,
        ano_fab=:ano_fab,
        numero_motor=:numero_motor,
        numero_chasis=:numero_chasis,
        fyh_actualizacion=:fyh_actualizacion
    WHERE  id_unidad_vehicular=:id_unidad_vehicular ');

    $sentencia->bindParam(':activo_id',$activo_id);
    $sentencia->bindParam(':placa',$placa);
    $sentencia->bindParam(':categoria',$categoria);
    $sentencia->bindParam(':ano_fab',$ano_fab);
    $sentencia->bindParam(':numero_motor',$numero_motor);
    $sentencia->bindParam(':numero_chasis',$numero_chasis);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia->bindParam('id_unidad_vehicular',$id_unidad_vehicular);
    $sentencia->execute();

    /////////////////////// ACTUALIZAR A LA TABLA ADMINISTRATIVOS
    $sentencia = $pdo->prepare('UPDATE activos
    SET tipo_activo_id=:tipo_activo_id,
        codigo_sbn=:codigo_sbn,
        codigo_cbp=:codigo_cbp,
        material=:material,
        marca=:marca,
        modelo=:modelo,
        color=:color,
        estado_conservacion=:estado_conservacion,
        dimensiones=:dimensiones,
        serie=:serie,
        anio=:anio,
        fecha_iniuso=:fecha_iniuso,
        fecha_adquisicion=:fecha_adquisicion,
        doc_adquisicion=:doc_adquisicion,
        doc_ingreso=:doc_ingreso,
        de_baja=:de_baja,
        observaciones=:observaciones,
        fyh_actualizacion=:fyh_actualizacion
    WHERE  id_activo=:id_activo ');

    $sentencia->bindParam(':tipo_activo_id',$tipo_activo_id);
    $sentencia->bindParam(':codigo_sbn',$codigo_sbn);
    $sentencia->bindParam(':codigo_cbp',$codigo_cbp);
    $sentencia->bindParam(':material',$material);
    $sentencia->bindParam(':marca',$marca);
    $sentencia->bindParam(':modelo',$modelo);
    $sentencia->bindParam(':color',$color);
    $sentencia->bindParam(':estado_conservacion',$estado_conservacion);
    $sentencia->bindParam(':dimensiones',$dimensiones);
    $sentencia->bindParam(':serie',$serie);
    $sentencia->bindParam(':anio',$anio);
    $sentencia->bindParam(':fecha_iniuso',$fecha_iniuso);
    $sentencia->bindParam(':fecha_adquisicion',$fecha_adquisicion);
    $sentencia->bindParam(':doc_adquisicion',$doc_adquisicion);
    $sentencia->bindParam(':doc_ingreso',$doc_ingreso);
    $sentencia->bindParam(':de_baja',$de_baja);
    $sentencia->bindParam(':observaciones',$observaciones);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia->bindParam(':id_activo',$activo_id);


    if($sentencia->execute()){
        echo 'success';
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se actualizó la Unidad Vehicular correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/unidad_vehicular");
    //header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }
} catch (Exception $e) {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}