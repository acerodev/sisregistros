<?php

include ('../../../app/config.php');

//$rol_id = $_POST['rol_id'];
//$tipo_veh = $_POST['tipo_veh'];
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

$cantidad = 1;

$ubicacion_id = $_POST['ubicacion_id'];

$pdo->beginTransaction();

try {
    /////////////////////// INSERTAR A LA TABLA ACTIVOS
    $sentencia = $pdo->prepare('INSERT INTO activos
            (tipo_activo_id,codigo_sbn,codigo_cbp,material,
            marca,modelo,color,estado_conservacion,dimensiones,
            serie,anio,fecha_iniuso,fecha_adquisicion,doc_ingreso,
            doc_adquisicion,de_baja,observaciones,fyh_creacion,estado)
    VALUES (:tipo_activo_id,:codigo_sbn,:codigo_cbp,:material,
            :marca,:modelo,:color,:estado_conservacion,:dimensiones,
            :serie,:anio,:fecha_iniuso,:fecha_adquisicion,:doc_ingreso,
            :doc_adquisicion,:de_baja,:observaciones,:fyh_creacion,:estado)');

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
    $sentencia->bindParam(':doc_ingreso',$doc_ingreso);
    $sentencia->bindParam(':doc_adquisicion',$doc_adquisicion);
    $sentencia->bindParam(':de_baja',$de_baja);
    $sentencia->bindParam(':observaciones',$observaciones);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_de_registro);
    $sentencia->execute();

    $activo_id = $pdo->lastInsertId();

    /////////////////////// INSERTAR A LA TABLA UNIDAD VEHICULAR
    $sentencia = $pdo->prepare('INSERT INTO unidad_vehicular
            (activo_id, placa, categoria, ano_fab, numero_motor, numero_chasis, fyh_creacion, estado)
    VALUES (:activo_id,:placa,:categoria,:ano_fab,:numero_motor,:numero_chasis,:fyh_creacion,:estado)');

    $sentencia->bindParam(':activo_id',$activo_id);
    //$sentencia->bindParam(':tipo_veh',$tipo_veh);
    $sentencia->bindParam(':placa',$placa);
    $sentencia->bindParam(':categoria',$categoria);
    $sentencia->bindParam(':ano_fab',$ano_fab);
    $sentencia->bindParam(':numero_motor',$numero_motor);
    $sentencia->bindParam(':numero_chasis',$numero_chasis);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_de_registro);
    $sentencia->execute();

    /////////////////////// INSERTAR A LA TABLA HISTORIAL UBICACIONES
    $sentencia = $pdo->prepare('INSERT INTO historial_ubicaciones
            (activo_id, ubicacion_id, fecha_cambio, fyh_creacion, estado)
    VALUES (:activo_id,:ubicacion_id,:fecha_cambio,:fyh_creacion,:estado)');

    $sentencia->bindParam(':activo_id',$activo_id);
    $sentencia->bindParam(':ubicacion_id',$ubicacion_id);
    $sentencia->bindParam(':fecha_cambio',$fechaHora);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_de_registro);
    $sentencia->execute();

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
    $sentencia->bindParam(':cantidad',$cantidad);
    $sentencia->bindParam(':fecha_actualizacion',$fechaHora);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_de_registro);

    if($sentencia->execute()){
        echo 'success';
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "Se registro la Unidad Vehicular de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/unidad_vehicular");
        exit();
    //header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
        exit();
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