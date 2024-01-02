<?php

$GLOBALS['base-url']='http://' . $_SERVER['HTTP_HOST'] . '/Comparateur-Vehicule/';
// Define routes
$routes = [
    '/Comparateur-Vehicule/' => 'userHomeController@showHomeController',
    '/Comparateur-Vehicule/marques'=> 'marqueController@showMarquesController',
    '/Comparateur-Vehicule/marques/details' => 'marqueController@showMarqueDetailsController',
    '/Comparateur-Vehicule/vehicules/details' => 'vehiculeController@showVehiculeDetailsController',
    '/Comparateur-Vehicule/compare' => 'compareController@showComparateurController',
    '/Comparateur-Vehicule/admin' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/marques' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/vehicules' => 'vehiculeController@showAdminVehiculeController',
    '/Comparateur-Vehicule/admin/users' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/avis' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/news' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/guides' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/contacts' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/diaporama' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/style' => 'adminHomeController@showHomeController',
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
