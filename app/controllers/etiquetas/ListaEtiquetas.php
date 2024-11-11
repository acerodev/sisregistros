<?php

$sql_etiquetas = "SELECT * FROM etiquetas AS etiq
INNER JOIN activos AS act ON act.id_activo = etiq.activo_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where etiq.estado = '1' ORDER BY etiq.fyh_creacion DESC";
$query_etiquetas = $pdo->prepare($sql_etiquetas);
$query_etiquetas->execute();
$etiquetas = $query_etiquetas->fetchAll(PDO::FETCH_ASSOC);

