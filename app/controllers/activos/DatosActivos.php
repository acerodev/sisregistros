<?php

$sql_activos = "SELECT * FROM activos as act
INNER JOIN tipos_activos as tipact ON tipact.id_tipo = act.tipo_activo_id
where act.estado = '1' AND act.id_activo = '$id_activo' ";
$query_activos = $pdo->prepare($sql_activos);
$query_activos->execute();
$activos = $query_activos->fetchAll(PDO::FETCH_ASSOC);

foreach ($activos as $activo){
    $id_activo = $activo['id_activo'];
    $tipo_activo_id = $activo['tipo_activo_id'];

    $descripcion = $activo['descripcion'];
    $codigo_sbn = $activo['codigo_sbn'];
    $codigo_cbp = $activo['codigo_cbp'];
    $material = $activo['material'];
    $marca = $activo['marca'];
    $modelo = $activo['modelo'];
    $color = $activo['color'];
    $estado_conservacion = $activo['estado_conservacion'];
    $dimensiones = $activo['dimensiones'];
    $serie = $activo['serie'];
    $anio = $activo['anio'];
    $de_baja = $activo['de_baja'];
    $fecha_iniuso = $activo['fecha_iniuso'];
    $fecha_adquisicion = $activo['fecha_adquisicion'];
    $doc_adquisicion = $activo['doc_adquisicion'];
    $doc_ingreso = $activo['doc_ingreso'];
    $observaciones = $activo['observaciones'];

    $fyh_creacion = $activo['fyh_creacion'];
    $estado = $activo['estado'];

}
