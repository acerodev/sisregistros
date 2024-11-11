<?php


$sql_partes = "SELECT * FROM parte where estado = '1' ";
$query_partes = $pdo->prepare($sql_partes);
$query_partes->execute();
$partesdashs = $query_partes->fetchAll(PDO::FETCH_ASSOC);
