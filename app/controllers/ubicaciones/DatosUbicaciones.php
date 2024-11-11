<?php

$sql_ubicaciones = "SELECT * FROM ubicaciones AS ubi
INNER JOIN configuracion_instituciones as config_inst ON config_inst.id_config_institucion = ubi.config_institucion_id
INNER JOIN responsables as resp ON resp.id_responsable = ubi.responsable_id
where ubi.estado = '1' and ubi.id_ubicacion = '$id_ubicacion' ";
$query_ubicaciones = $pdo->prepare($sql_ubicaciones);
$query_ubicaciones->execute();
$ubicaciones = $query_ubicaciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($ubicaciones as $ubicacion){
    $id_config_institucion = $ubicacion['id_config_institucion'];
    $id_responsable = $ubicacion['id_responsable'];

    $piso = $ubicacion['piso'];
    $dependencia_ubi = $ubicacion['dependencia_ubi'];
    $dependencia_area = $ubicacion['dependencia_area'];

    $nombre_institucion = $ubicacion['nombre_institucion'];
    $nombres_resp = $ubicacion['nombres'];

    $fyh_creacion = $ubicacion['fyh_creacion'];
    $estado = $ubicacion['estado'];

}
