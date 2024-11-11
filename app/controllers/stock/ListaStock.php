<?php

$sql_stocks = "SELECT * FROM stock AS stk
INNER JOIN tipos_activos AS tip ON tip.id_tipo = stk.tipo_activo_id
INNER JOIN ubicaciones AS ubi ON ubi.id_ubicacion = stk.ubicacion_id
where stk.estado = '1' AND stk.cantidad > 0 ORDER BY stk.fyh_creacion DESC";
$query_stocks = $pdo->prepare($sql_stocks);
$query_stocks->execute();
$stocks = $query_stocks->fetchAll(PDO::FETCH_ASSOC);
