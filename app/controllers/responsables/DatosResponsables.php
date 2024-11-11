<?php

$sql_responsables = "SELECT * FROM responsables where estado = '1' and id_responsable = '$id_responsable'";
$query_responsables = $pdo->prepare($sql_responsables);
$query_responsables->execute();
$responsabless = $query_responsables->fetchAll(PDO::FETCH_ASSOC);

foreach ($responsabless as $responsablee){

    $nombres = $responsablee['nombres'];
    $cargo = $responsablee['cargo'];
    $contacto = $responsablee['contacto'];
    $fyh_actualizacion = $responsablee['fyh_actualizacion'];
    $estado = $responsablee['estado'];
    $id_responsable = $responsablee['id_responsable'];
    //$id_autoriza = $autoriza['id_autoriza'];
}