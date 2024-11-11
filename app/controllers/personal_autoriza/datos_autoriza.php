<?php

$sql_autorizas = "SELECT * FROM autoriza where estado = '1' and id_autoriza = '$id_autoriza'";
$query_autorizas = $pdo->prepare($sql_autorizas);
$query_autorizas->execute();
$autorizas = $query_autorizas->fetchAll(PDO::FETCH_ASSOC);

foreach ($autorizas as $autoriza){
    $id_autoriza = $autoriza['id_autoriza'];

    $codigo = $autoriza['codigo_aut'];
    $grado = $autoriza['grado_aut'];
    $dni = $autoriza['dni_aut'];
    $nombres = $autoriza['nombres_aut'];
    $apellidos = $autoriza['apellidos_aut'];
    $fyh_creacion = $autoriza['fyh_creacion'];
    $estado = $autoriza['estado'];
    //$id_autoriza = $autoriza['id_autoriza'];
}