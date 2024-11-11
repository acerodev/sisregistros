<?php
//Este consulta recoleta la lista de activos por su ubicación tiene en cuenta ACTIVOS, TIPO DE ACTIVO Y UBICACIÓN
$sql_ubiactivos = " SELECT act.*, tipact.*, ubi.*, hist.* FROM activos as act
INNER JOIN tipos_activos as tipact ON tipact.id_tipo = act.tipo_activo_id
INNER JOIN historial_ubicaciones as hist ON hist.activo_id = act.id_activo
INNER JOIN ubicaciones as ubi ON ubi.id_ubicacion = hist.ubicacion_id
WHERE act.estado = '1' AND act.de_baja='OPERATIVO'
AND hist.fecha_cambio = (
    SELECT MAX(fecha_cambio)
    FROM historial_ubicaciones
    WHERE activo_id = act.id_activo
)
ORDER BY act.fyh_creacion DESC";
$query_ubiactivos = $pdo->prepare($sql_ubiactivos);
$query_ubiactivos->execute();
$ubiactivos = $query_ubiactivos->fetchAll(PDO::FETCH_ASSOC);

/*
    $sql_ubiactivos = "SELECT * FROM activos as act
    INNER JOIN tipos_activos as tipact ON tipact.id_tipo = act.tipo_activo_id
    INNER JOIN historial_ubicaciones as hist ON hist.activo_id = act.id_activo
    INNER JOIN ubicaciones as ubi ON ubi.id_ubicacion = hist.ubicacion_id
    where act.estado = '1' ORDER BY act.fyh_creacion DESC";
    $query_ubiactivos = $pdo->prepare($sql_ubiactivos);
    $query_ubiactivos->execute();
    $ubiactivos = $query_ubiactivos->fetchAll(PDO::FETCH_ASSOC);
*/