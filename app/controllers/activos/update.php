<?php

include ('../../../app/config.php');

$id_activo = $_POST['id_activo'];
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

    //$tipo_activo_id = filter_input(INPUT_POST, 'material', FILTER_SANITIZE_NUMBER_INT);

    $pdo->beginTransaction();

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
    $sentencia->bindParam(':id_activo',$id_activo);
    //$sentencia->execute();


    if($sentencia->execute()){
        echo 'success';
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se actualizó el activo correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/activos");
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
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $errorMessage = $e->getMessage();

    if(strpos($errorMessage, 'codigo_sbn') !== false){
        $_SESSION['mensaje'] = "Error: El Código SBN ya existe en la base de datos.";        
    } else {
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos, comuníquese con el administrador";
    }

    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    exit();
}