<?php

$sql_historial = "SELECT * FROM historial_ubicaciones AS hist
INNER JOIN activos AS act ON act.id_activo = hist.activo_id
INNER JOIN ubicaciones AS ubi ON ubi.id_ubicacion = hist.ubicacion_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where hist.estado = '1' ORDER BY hist.fyh_creacion DESC";
$query_historial = $pdo->prepare($sql_historial);
$query_historial->execute();
$historiales = $query_historial->fetchAll(PDO::FETCH_ASSOC);
