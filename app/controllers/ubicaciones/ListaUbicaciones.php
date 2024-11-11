<?php

$sql_ubicaciones = "SELECT * FROM ubicaciones AS ubi
INNER JOIN configuracion_instituciones as config_inst ON config_inst.id_config_institucion = ubi.config_institucion_id
INNER JOIN responsables as resp ON resp.id_responsable = ubi.responsable_id
where ubi.estado = '1'
ORDER BY ubi.dependencia_area ASC";
$query_ubicaciones = $pdo->prepare($sql_ubicaciones);
$query_ubicaciones->execute();
$ubicaciones = $query_ubicaciones->fetchAll(PDO::FETCH_ASSOC);

