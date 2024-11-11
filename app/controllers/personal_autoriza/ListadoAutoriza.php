<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/1/2024
 * Time: 17:04
 */

$sql_autorizas = "SELECT * FROM autoriza where estado = '1' ";
$query_autorizas = $pdo->prepare($sql_autorizas);
$query_autorizas->execute();
$autorizas = $query_autorizas->fetchAll(PDO::FETCH_ASSOC);

