<?php

$sql_activos = "SELECT * FROM activos where estado = '1' ";
$query_activos = $pdo->prepare($sql_activos);
$query_activos->execute();
$activosdashs = $query_activos->fetchAll(PDO::FETCH_ASSOC);
