<?php

$sql_partes = "SELECT * FROM parte as par 
INNER JOIN autoriza as aut ON aut.id_autoriza = par.autoriza_id
INNER JOIN mando as man ON man.id_mando = par.mando_id
INNER JOIN motivo as mot ON mot.id_motivo = par.motivo_id
INNER JOIN administrativos as adm ON adm.id_administrativo = par.administrativo_id
INNER JOIN personas as pers ON pers.id_persona = adm.persona_id
INNER JOIN unidad_vehicular as univeh ON univeh.id_unidad_vehicular = par.unidad_vehicular_id
INNER JOIN activos as act ON act.id_activo = univeh.activo_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where par.estado = '1' and par.id_parte = '$id_parte' ";
$query_partes = $pdo->prepare($sql_partes);
$query_partes->execute();
$datospartes = $query_partes->fetchAll(PDO::FETCH_ASSOC);

foreach ($datospartes as $datosparte){
    $id_autoriza = $datosparte['id_autoriza'];
    $id_mando = $datosparte['id_mando'];
    $id_motivo = $datosparte['id_motivo'];
    $id_unidad_vehicular = $datosparte['id_unidad_vehicular'];
    $id_administrativo = $datosparte['id_administrativo'];
    
    $cod_parte = $datosparte['cod_parte'];
    $conductor = $datosparte['cod_conductor'];
    $mes = $datosparte['mes'];
    $fecha_salida = $datosparte['fecha_salida'];
    $hora_salida = $datosparte['hora_salida'];
    $fecha_ingreso = $datosparte['fecha_ingreso'];
    $hora_ingreso = $datosparte['hora_ingreso'];
    $km_salida = $datosparte['km_salida'];
    $km_ingreso = $datosparte['km_ingreso'];
    $direccion_parte = $datosparte['direccion_parte'];
    $km_recorrido = $datosparte['km_recorrido'];
    $horas_recorridas = $datosparte['horas_recorridas'];
    $abs_combustible = $datosparte['abs_combustible'];
    $observaciones = $datosparte['observaciones'];

    $codigo_aut = $datosparte['codigo_aut'];
    $nombres_aut = $datosparte['nombres_aut'];
    $apellidos_aut = $datosparte['apellidos_aut'];
    $codigo_man = $datosparte['codigo_man'];
    $nombres_man = $datosparte['nombres_man'];
    $apellidos_man = $datosparte['apellidos_man'];
    $codigo_mot = $datosparte['codigo_mot'];
    $descripcion_mot = $datosparte['descripcion_mot'];

    $descripcion = $datosparte['descripcion'];
    $placa = $datosparte['placa'];
    $fyh_creacion = $datosparte['fyh_creacion'];
    $estado = $datosparte['estado'];
    //$ = $administrativo[''];
}