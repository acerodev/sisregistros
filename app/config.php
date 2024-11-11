<?php

define('SERVIDOR','localhost');
define('USUARIO','u802871820_bomgestion');
define('PASSWORD','QvcPeru23$');
define('BD','u802871820_bomgestion');

define('APP_NAME','GESTION DE REGISTROS');
define('APP_URL','https://bomgestion.acerodev.com');
define('KEY_API_MAPS','');
define('APP_FAVICON','https://bomgestion.acerodev.com/public/images/logobomberos.png');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "conexión existosa a la base de datos";
}catch (PDOException $e){
    print_r($e);
    echo "error no se pudo conectar a la base de datos";
}

date_default_timezone_set("America/Lima");
$fechaHora = date('Y-m-d H:i:s');

$horaActual = date('H:i:s');

$fecha_actual = date('Y-m-d');
$dia_actual = date('d');
$mes_actual = date('m');
$ano_actual = date('Y');

$estado_de_registro = '1';



