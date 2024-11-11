<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:04
 */

$sql_motivo = "SELECT * FROM motivo where estado = '1' ";
$query_motivo = $pdo->prepare($sql_motivo);
$query_motivo->execute();
$motivos = $query_motivo->fetchAll(PDO::FETCH_ASSOC);

