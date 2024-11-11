<?php

include ('../../../app/config.php');
//include ('../../../app/inicio_session.php');


$unidad_vehicular_id = $_POST['unidad_vehicular_id'];
$idparte = $_POST['idparte'];
$mes = $_POST['mes'];
$autoriza_id = $_POST['autoriza_id'];
$mando_id = $_POST['mando_id'];
$administrativo_id = $_POST['administrativo_id'];
$motivo_id = $_POST['motivo_id'];
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


//////////////////////// INSERTAR A LA TABLA PERSONAS
$sentencia = $pdo->prepare('INSERT INTO parte
         (cod_parte,autoriza_id,mando_id,administrativo_id,motivo_id,unidad_vehicular_id,mes,
         fecha_salida, hora_salida, fecha_ingreso, hora_ingreso, km_salida, km_ingreso, 
         direccion_parte, km_recorrido, horas_recorridas, abs_combustible, observaciones, fyh_creacion, estado)
VALUES ( :idparte,:autoriza_id,:mando_id,:administrativo_id,:motivo_id,:unidad_vehicular_id,:mes,
        :fecha_salida,:hora_salida,:fecha_ingreso,:hora_ingreso,:km_salida,:km_ingreso,
        :direccion_parte,:km_recorrido,:horas_recorridas,:abs_combustible,:observaciones,:fyh_creacion,:estado)');

//$sentencia->bindParam(':tipo_veh',$tipo_veh);
$sentencia->bindParam(':idparte',$idparte);
$sentencia->bindParam(':autoriza_id',$autoriza_id);
$sentencia->bindParam(':mando_id',$mando_id);
$sentencia->bindParam(':administrativo_id',$administrativo_id);
$sentencia->bindParam(':motivo_id',$motivo_id);
$sentencia->bindParam(':unidad_vehicular_id',$unidad_vehicular_id);
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
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

//$sentencia->execute();
//$id_persona = $pdo->lastInsertId();

    if($sentencia->execute()){
        echo 'success';
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se registro el Parte de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/parte");
    //header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
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
