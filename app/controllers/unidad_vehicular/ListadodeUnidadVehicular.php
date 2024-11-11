<?php

$sql_unidad_vehicular = "SELECT * FROM unidad_vehicular as unid 
INNER JOIN activos as act ON act.id_activo = unid.activo_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where unid.estado = '1' ";
$query_unidad_vehicular = $pdo->prepare($sql_unidad_vehicular);
$query_unidad_vehicular->execute();
$unidad_vehs = $query_unidad_vehicular->fetchAll(PDO::FETCH_ASSOC);
