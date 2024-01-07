<?php
$GLOBALS['base-url']='http://' . $_SERVER['HTTP_HOST'] . '/Comparateur-Vehicule/';


if (isset($_POST['marqueId'])) {
    require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\compareController.php";
    $controller = new compareController();

    $params = array(1 => $_POST['marqueId']);
    $result = $controller->getModelesController($params);
    echo json_encode($result);
    exit();
}

if (isset($_POST['modeleId'])) {
    require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\compareController.php";
    $controller = new compareController();

    $params = array(1 => $_POST['modeleId']);
    $result = $controller->getVersionsController($params);
    echo json_encode($result);
    
    exit();
}

if (isset($_POST['versionId'])) {
    require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\compareController.php";
    $controller = new compareController();

    $params = array(1 => $_POST['versionId']);
    $result = $controller->getVersionController($params);
    echo json_encode($result);
    
    exit();
}

require_once 'router.php';

$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = parse_url($request_uri);


$path = $uri_parts['path'];

$router = new router();
$router->get($path);

?>


