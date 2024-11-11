<?php

$sql_unidad_vehicular = "SELECT * FROM unidad_vehicular as unid
INNER JOIN activos as act ON act.id_activo = unid.activo_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where unid.estado = '1' and unid.id_unidad_vehicular = '$id_unidad_vehicular'";
$query_unidad_vehicular = $pdo->prepare($sql_unidad_vehicular);
$query_unidad_vehicular->execute();
$unidades_vehs = $query_unidad_vehicular->fetchAll(PDO::FETCH_ASSOC);

foreach ($unidades_vehs as $unidades_veh){
    $id_unidad_vehicular = $unidades_veh['id_unidad_vehicular'];
    $activo_id = $unidades_veh['activo_id'];
    $tipo_activo_id = $unidades_veh['tipo_activo_id'];
    
    $placa = $unidades_veh['placa'];
    $categoria = $unidades_veh['categoria'];
    $ano_fab = $unidades_veh['ano_fab'];
    $numero_motor = $unidades_veh['numero_motor'];
    $numero_chasis = $unidades_veh['numero_chasis'];

    $codigo_sbn = $unidades_veh['codigo_sbn'];
    $codigo_cbp = $unidades_veh['codigo_cbp'];
    $material = $unidades_veh['material'];
    $marca = $unidades_veh['marca'];
    $modelo = $unidades_veh['modelo'];
    $color = $unidades_veh['color'];
    $estado_conservacion = $unidades_veh['estado_conservacion'];
    $dimensiones = $unidades_veh['dimensiones'];
    $serie = $unidades_veh['serie'];
    $anio = $unidades_veh['anio'];
    $de_baja = $unidades_veh['de_baja'];
    $fecha_iniuso = $unidades_veh['fecha_iniuso'];
    $fecha_adquisicion = $unidades_veh['fecha_adquisicion'];
    $doc_adquisicion = $unidades_veh['doc_adquisicion'];
    $doc_ingreso = $unidades_veh['doc_ingreso'];
    $observaciones = $unidades_veh['observaciones'];
    
    $descripcion = $unidades_veh['descripcion'];

    $fyh_creacion = $unidades_veh['fyh_creacion'];
    $estado = $unidades_veh['estado'];
    //$id_autoriza = $autoriza['id_autoriza'];
}