<?php

error_reporting(-1);
ini_set('display_errors', 'On');
header("Access-Control-Allow-Origin: *");  
header("Content-Type: application/json");

include_once 'api.php';
$api = new Api();


$funct = isset($_GET['function'])? $_GET['function'] : null;
$sort = isset($_GET['sort'])? $_GET['sort'] : null;
$filter = isset($_GET['filter'])? $_GET['filter'] : null;
$motive_name = isset($_GET['motiveName'])? $_GET['motiveName'] : null;
$state = isset($_GET['state'])? $_GET['state'] : null;
$type = isset($_GET['type'])? $_GET['type'] : null;
$id = isset($_GET['id'])? $_GET['id'] : null;




switch($funct){

    case 'GET/AllMotives':
        echo $api->getAll($sort);
    break;

    case 'GET/Motives':
        echo $api->getFiltered($filter);
    break;

    case 'UPDATE/Motive':
        echo $api->update($id, $motive_name, $state, $type);
    break;

    case 'POST/Motive':
        echo $api->post($motive_name, $state, $type);
    break;

    case 'DELETE/Motive':
        echo $api->delete($id);
    break;
}
