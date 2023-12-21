<?php

// Include necessary files and start session if needed

// Define routes
$routes = [
    '/' => 'HomeController@index',
    '/news' => 'NewsController@index',
    '/comparison' => 'ComparisonController@index',
    '/brands' => 'BrandsController@index',
    '/reviews' => 'ReviewsController@index',
    '/buying-guide' => 'BuyingGuideController@index',
    '/contact' => 'ContactController@index',
    '/login' => 'AuthController@login',
    '/registration' => 'AuthController@registration',
    '/user-profile' => 'UserController@profile',
    '/admin' => 'AdminController@index',
    '/admin/vehicles' => 'VehicleAdminController@index',
    '/admin/reviews' => 'ReviewAdminController@index',
    '/admin/news' => 'NewsAdminController@index',
    '/admin/users' => 'UserAdminController@index',
    '/admin/settings' => 'SettingsAdminController@index',
];

// Parse the URL
$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = parse_url($request_uri);

// Extract the path from the URL
$path = $uri_parts['path'];

// Check if the path is in the routes
if (array_key_exists($path, $routes)) {
    // Split the controller and method
    list($controllerName, $method) = explode('@', $routes[$path]);

    // Include the necessary controller file
    include_once __DIR__ . "/controllers/{$controllerName}.php";

    // Create an instance of the controller
    $controller = new $controllerName();

    // Call the method
    $controller->$method();
} else {
    // Handle 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
    // You can include a 404.php file or handle it as you see fit
}
