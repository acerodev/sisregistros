<?php

$sql_motivos = "SELECT * FROM motivo where estado = '1' and id_motivo = '$id_motivo'";
$query_motivos = $pdo->prepare($sql_motivos);
$query_motivos->execute();
$motivos = $query_motivos->fetchAll(PDO::FETCH_ASSOC);

foreach ($motivos as $motivo){
    $id_motivo = $motivo['id_motivo'];

    $codigo = $motivo['codigo_mot'];
    $descripcion = $motivo['descripcion_mot'];
    $fyh_creacion = $motivo['fyh_creacion'];
    $estado = $motivo['estado'];
    //$id_autoriza = $autoriza['id_autoriza'];
}