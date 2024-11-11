<?php

$sql_tiposactivos = "SELECT * FROM tipos_activos
where estado = '1' and id_tipo = '$id_tipo'";
$query_tiposactivos = $pdo->prepare($sql_tiposactivos);
$query_tiposactivos->execute();
$tiposactivos = $query_tiposactivos->fetchAll(PDO::FETCH_ASSOC);

foreach ($tiposactivos as $tiposactivo){
    $descripcion = $tiposactivo['descripcion'];
    $categoria_tipo = $tiposactivo['categoria_tipo'];

    $fyh_creacion = $tiposactivo['fyh_creacion'];
    $estado = $tiposactivo['estado'];

}
