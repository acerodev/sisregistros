<?php

$sql_stockactivos = "SELECT 
                        act.codigo_sbn AS 'Activo SBN', 
                        tipact.descripcion AS 'Tipo de Activo', 
                        ubi.dependencia_area AS 'Ubicación',
                        hist.fecha_cambio AS 'Fecha de Cambio'
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
                    ORDER BY 
                        tipact.descripcion";
$query_stockactivos = $pdo->prepare($sql_stockactivos);
$query_stockactivos->execute();
$stockactivos = $query_stockactivos->fetchAll(PDO::FETCH_ASSOC);