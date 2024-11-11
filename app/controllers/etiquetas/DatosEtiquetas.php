<?php

$sql_etiquetas = "SELECT * FROM etiquetas AS etiq
INNER JOIN activos AS act ON act.id_activo = etiq.activo_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where etiq.estado = '1' AND etiq.id_etiqueta='$id_etiqueta' ";
$query_etiquetas = $pdo->prepare($sql_etiquetas);
$query_etiquetas->execute();
$etiquetas = $query_etiquetas->fetchAll(PDO::FETCH_ASSOC);

foreach ($etiquetas as $etiqueta){
    $id_etiqueta = $etiqueta['id_etiqueta'];
    $activo_id = $etiqueta['activo_id'];

    $codigo_sbn_etiq = $etiqueta['codigo_sbn'];
    $codigo_cbp_etiq = $etiqueta['codigo_cbp'];
    $descripcion = $etiqueta['descripcion'];

    $etiqueta_anno = $etiqueta['etiqueta_anno'];
    $codigo_etiqueta = $etiqueta['codigo_etiqueta'];
    $fyh_creacion = $etiqueta['fyh_creacion'];
    $estado = $etiqueta['estado'];
    //$id_autoriza = $autoriza['id_autoriza'];
}