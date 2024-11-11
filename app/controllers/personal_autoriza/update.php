<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:08
 */

include ('../../../app/config.php');

$id_autoriza = $_POST['id_autoriza'];
$codigo = $_POST['codigo'];
$grado = $_POST['grado'];
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];

$pdo->beginTransaction();

/////////////////////// ACTUALIZAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('UPDATE autoriza
SET codigo_aut=:codigo,
    grado_aut=:grado,
    dni_aut=:dni,
    nombres_aut=:nombres,
    apellidos_aut=:apellidos,
    fyh_actualizacion=:fyh_actualizacion
WHERE  id_autoriza=:id_autoriza ');

$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':grado',$grado);
$sentencia->bindParam(':dni',$dni);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_autoriza',$id_autoriza);
//$sentencia->execute();


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el P.Autoriza de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/personal_autoriza");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

