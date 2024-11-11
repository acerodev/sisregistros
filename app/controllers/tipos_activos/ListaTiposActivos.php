<?php

$sql_tiposactivos = "SELECT * FROM tipos_activos
where estado = '1' ORDER BY fyh_creacion DESC";
$query_tiposactivos = $pdo->prepare($sql_tiposactivos);
$query_tiposactivos->execute();
$tiposactivos = $query_tiposactivos->fetchAll(PDO::FETCH_ASSOC);

