<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:04
 */

$sql_mando = "SELECT * FROM mando where estado = '1' ";
$query_mando = $pdo->prepare($sql_mando);
$query_mando->execute();
$mandos = $query_mando->fetchAll(PDO::FETCH_ASSOC);

