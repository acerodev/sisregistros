<?php

$sql_responsables = "SELECT * FROM responsables where estado = '1' ";
$query_responsables = $pdo->prepare($sql_responsables);
$query_responsables->execute();
$responsables = $query_responsables->fetchAll(PDO::FETCH_ASSOC);

