<?php

$sql_movimientos = "SELECT * FROM movimientos_inventario AS movint
INNER JOIN activos AS act ON act.id_activo = movint.activo_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where movint.estado = '1' ORDER BY movint.fyh_creacion DESC";
$query_movimientos = $pdo->prepare($sql_movimientos);
$query_movimientos->execute();
$movimientos = $query_movimientos->fetchAll(PDO::FETCH_ASSOC);
