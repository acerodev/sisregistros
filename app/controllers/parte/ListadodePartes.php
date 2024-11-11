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
where par.estado = '1' ORDER BY par.fyh_creacion DESC ";
$query_partes = $pdo->prepare($sql_partes);
$query_partes->execute();
$partes = $query_partes->fetchAll(PDO::FETCH_ASSOC);
