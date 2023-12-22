<?php

$GLOBALS['base-url']='http://' . $_SERVER['HTTP_HOST'] . '/Comparateur-Vehicule/';
// Define routes
$routes = [
    '/Comparateur-Vehicule/' => 'homeController@showHomeController',
    '/Comparateur-Vehicule/marques'=> 'marqueController@showMarquesController',
    '/Comparateur-Vehicule/marques/details' => 'marqueController@showMarqueDetailsController'
];


$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = parse_url($request_uri);


$path = $uri_parts['path'];


if (array_key_exists($path, $routes)) {

    list($controllerName, $method) = explode('@', $routes[$path]);

    
    include_once __DIR__ . "/Controllers/{$controllerName}.php";

    
    $controller = new $controllerName();

    $controller->$method();
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
    // You can include a 404.php file or handle it as you see fit
}
