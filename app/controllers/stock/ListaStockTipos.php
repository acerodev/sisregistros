<?php

$sql_stocktipos = "SELECT 
                        ubi.dependencia_area AS 'Ubicación', 
                        tipact.descripcion AS 'Tipo de Activo', 
                        COUNT(act.id_activo) AS 'Cantidad'
                    FROM 
                        activos AS act
                    INNER JOIN 
                        tipos_activos AS tipact ON act.tipo_activo_id = tipact.id_tipo
                    INNER JOIN 
                        historial_ubicaciones AS hist ON hist.activo_id = act.id_activo
                    INNER JOIN 
                        ubicaciones AS ubi ON ubi.id_ubicacion = hist.ubicacion_id
                    INNER JOIN 
                        (
                            SELECT activo_id, MAX(fecha_cambio) AS ultima_fecha
                            FROM historial_ubicaciones
                            GROUP BY activo_id
                        ) AS ult_hist ON hist.activo_id = ult_hist.activo_id AND hist.fecha_cambio = ult_hist.ultima_fecha
                    WHERE 
                        act.estado = '1'
                    GROUP BY 
                        ubi.dependencia_area, tipact.descripcion
                    ORDER BY 
                        ubi.dependencia_area, tipact.descripcion";
$query_stocktipos = $pdo->prepare($sql_stocktipos);
$query_stocktipos->execute();
$stocktipos = $query_stocktipos->fetchAll(PDO::FETCH_ASSOC);