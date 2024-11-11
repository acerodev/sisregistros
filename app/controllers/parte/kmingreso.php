<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:08
 */

include ('../../../app/config.php');

if (isset($_POST['id_unidad_vehicular'])) {
    $id_unidad_vehicular = $_POST['id_unidad_vehicular'];

    // Verifica si se está recibiendo correctamente el id_unidad_vehicular
    error_log('ID Unidad Vehicular recibido: ' . $id_unidad_vehicular);

    // Consulta para obtener el último valor de km_ingreso para el vehículo seleccionado
    $sql = "SELECT par.km_ingreso FROM parte as par
            WHERE par.unidad_vehicular_id = ?
            AND par.estado = '1'
            ORDER BY par.id_parte DESC LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute([$id_unidad_vehicular]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Verifica si la consulta devuelve resultados
    error_log('Resultado de la consulta: ' . print_r($result, true));

    //echo $result;
    // Retornar el resultado como JSON
    echo json_encode($result);
} else {
    error_log('ID Unidad Vehicular no recibido');
}

/*
$tipo_veh = $_POST['tipo_veh'];

if (isset($tipo_veh)) {
    $tipo_veh = $_POST['tipo_veh'];

    // Consulta para obtener el último valor de km_ingreso para el vehículo seleccionado
    $sql = "SELECT par.km_ingreso FROM parte as par
            WHERE par.unidad_vehicular_id = ?
            AND par.estado = '1'
            ORDER BY par.id_parte DESC LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute([$tipo_veh]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
} else {
    $result = 0;
}
    */

?>