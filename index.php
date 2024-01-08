<?php
$GLOBALS['base-url']='http://' . $_SERVER['HTTP_HOST'] . '/Comparateur-Vehicule/';

require_once 'router.php';

$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = parse_url($request_uri);


$path = $uri_parts['path'];

$router = new router();
$router->get($path);

?>


