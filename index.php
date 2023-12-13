<?php

require_once $_SERVER['DOCUMENT_ROOT']."\Comparateur-Vehicule\View\userViews\home.php";

$request_uri = $_SERVER['REQUEST_URI'];

// var_dump($request_uri);

switch ($request_uri) {

    case '/Comparateur-vehicule/':
        $home = new home();
        $home->showHome();
        break;
    // case '/news':
    //     include('controllers/newsController.php');
    //     break;
    // case '/compare':
    //     include('controllers/comparatorController.php');
    //     break;
    // case '/marques':
    //     include('controllers/brandsController.php');
    //     break;
    // case '/avis':
    //     include('controllers/reviewsController.php');
    //     break;
    // case '/guides':
    //     include('controllers/buyingGuideController.php');
    //     break;
    // case '/contact-us':
    //     include('controllers/contactController.php');
    //     break;
    // default:
    //     header('HTTP/1.0 404 Not Found');
    //     include('controllers/notFoundController.php');
    //     break;
}
?>