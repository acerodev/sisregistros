<?php

$sql_mandos = "SELECT * FROM mando where estado = '1' and id_mando = '$id_mando'";
$query_mandos = $pdo->prepare($sql_mandos);
$query_mandos->execute();
$mandos = $query_mandos->fetchAll(PDO::FETCH_ASSOC);

foreach ($mandos as $mando){
    $id_mando = $mando['id_mando'];

    $cia = $mando['cia_man'];
    $codigo = $mando['codigo_man'];
    $grado = $mando['grado_man'];
    $dni = $mando['dni_man'];
    $nombres = $mando['nombres_man'];
    $apellidos = $mando['apellidos_man'];
    $fyh_creacion = $mando['fyh_creacion'];
    $estado = $mando['estado'];
    //$id_autoriza = $autoriza['id_autoriza'];
}