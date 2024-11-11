<?php

$sql_movimientos = "SELECT * FROM movimientos_inventario AS mov
INNER JOIN activos AS act ON act.id_activo = mov.activo_id
INNER JOIN tipos_activos AS tip ON tip.id_tipo = act.tipo_activo_id
where mov.estado = '1' AND mov.id_movimiento='$id_movimiento' ";
$query_movimientos = $pdo->prepare($sql_movimientos);
$query_movimientos->execute();
$movimientos = $query_movimientos->fetchAll(PDO::FETCH_ASSOC);

foreach ($movimientos as $movimiento){
    $id_movimiento = $movimiento['id_movimiento'];
    $activo_id = $movimiento['activo_id'];

    $tipo_activo_id = $movimiento['tipo_activo_id'];
    $codigo_sbn = $movimiento['codigo_sbn'];
    $codigo_cbp = $movimiento['codigo_cbp'];

    $descripcion = $movimiento['descripcion'];

    $tipo_movimiento = $movimiento['tipo_movimiento'];
    $lugar_origen = $movimiento['lugar_origen'];
    $lugar_destino = $movimiento['lugar_destino'];
    $fecha_movimiento = $movimiento['fecha_movimiento'];
    $documento_movimiento = $movimiento['documento_movimiento'];
    $descripcion_mov = $movimiento['descripcion_mov'];
    $cantidad_mov = $movimiento['cantidad_mov'];
    $fyh_creacion = $movimiento['fyh_creacion'];
    //$id_autoriza = $autoriza['id_autoriza'];
}