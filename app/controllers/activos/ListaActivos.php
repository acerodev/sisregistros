<?php

$sql_activos = "SELECT * FROM activos as act
INNER JOIN tipos_activos as tipact ON tipact.id_tipo = act.tipo_activo_id
where act.estado = '1' ORDER BY act.fyh_creacion DESC";
$query_activos = $pdo->prepare($sql_activos);
$query_activos->execute();
$activos = $query_activos->fetchAll(PDO::FETCH_ASSOC);
