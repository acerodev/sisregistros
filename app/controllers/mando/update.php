<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:08
 */

include ('../../../app/config.php');

$id_mando = $_POST['id_mando'];
$cia = $_POST['cia'];
$codigo = $_POST['codigo'];
$grado = $_POST['grado'];
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];

$pdo->beginTransaction();

/////////////////////// ACTUALIZAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('UPDATE mando
SET cia_man=:cia,
    codigo_man=:codigo,
    grado_man=:grado,
    dni_man=:dni,
    nombres_man=:nombres,
    apellidos_man=:apellidos,
    fyh_actualizacion=:fyh_actualizacion
WHERE  id_mando=:id_mando ');

$sentencia->bindParam(':cia',$cia);
$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':grado',$grado);
$sentencia->bindParam(':dni',$dni);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_mando',$id_mando);
//$sentencia->execute();


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el P.Mando de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/mando");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

