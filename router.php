<?php

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

if (isset($_POST['vehic'])) {
  require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\vehiculeController.php';
  $controller = new vehiculeController();

  $params=array(
    1 => $_POST['version'] ,
    2 => $_POST['annee'] ,
  );
  $result = $controller->getVehicByVersionController($params);
  echo json_encode($result);
  exit();
}

if (isset($_POST['formData'])) {
    $data = $_POST['formData'];

    $params1 = array(1 => $data[0]['vehic_id']);
    $params2 = array(1 => $data[1]['vehic_id']);
    $params3 = array(1 => $data[2]['vehic_id']);
    $params4 = array(1 => $data[3]['vehic_id']);

    require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\vehiculeController.php';
    $controller = new vehiculeController();

    
    $vehic1Caracs = $controller->getVehiculeCaracsController($params1);
    $vehic2Caracs = $controller->getVehiculeCaracsController($params2);
    $vehic3Caracs = $controller->getVehiculeCaracsController($params3);
    $vehic4Caracs = $controller->getVehiculeCaracsController($params4);

    // Example: Send the data as JSON
    //the result is emty !!!
    $result = array(
        'vehic1Data' => $vehic1Caracs,
        'vehic2Data' => $vehic2Caracs,
        'vehic3Data' => $vehic3Caracs,
        'vehic4Data' => $vehic4Caracs
    );

    echo json_encode($result);
    exit();
}



class router{

    private $routes = [
    '/Comparateur-Vehicule/' => 'userHomeController@showHomeController',
    '/Comparateur-Vehicule/contact-us' => 'userHomeController@showContactPageController',
    '/Comparateur-Vehicule/marques'=> 'marqueController@showMarquesController',
    '/Comparateur-Vehicule/marques/details' => 'marqueController@showMarqueDetailsController',
    '/Comparateur-Vehicule/vehicules/details' => 'vehiculeController@showVehiculeDetailsController',
    '/Comparateur-Vehicule/compare' => 'compareController@showComparateurController',
    '/Comparateur-Vehicule/compare/result' => 'compareController@showComparResultController',
    '/Comparateur-Vehicule/news' => 'newsController@showNewsController',
    '/Comparateur-Vehicule/news/details' => 'newsController@showNewsDeatailsController',
    '/Comparateur-Vehicule/login' => 'usersController@showLoginFormController',
    '/Comparateur-Vehicule/profil' => 'usersController@showUserProfilController',
    '/Comparateur-Vehicule/admin' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/marques' => 'marqueController@showAdminMarqueController',
    '/Comparateur-Vehicule/admin/marques/new' => 'marqueController@showMarqueFormController',
    '/Comparateur-Vehicule/admin/marques/modifier' => 'marqueController@showModifMarqueFormController',
    '/Comparateur-Vehicule/admin/vehicules' => 'vehiculeController@showAdminVehiculeController',
    '/Comparateur-Vehicule/admin/vehicules/new' => 'vehiculeController@showVehiculeFormController',
    '/Comparateur-Vehicule/admin/vehicules/details' => 'vehiculeController@showAdminVehiculeDetailsController',
    '/Comparateur-Vehicule/admin/vehicules/modifier' => 'vehiculeController@showModifVehiculeFormController',
    '/Comparateur-Vehicule/admin/users' => 'usersController@showAdminUsersController',
    '/Comparateur-Vehicule/admin/avis' => 'avisController@showAdminAvisController',
    '/Comparateur-Vehicule/admin/news' => 'newsController@showAdminNewsController',
    '/Comparateur-Vehicule/admin/news/new' => 'newsController@showNewsFormController',
    '/Comparateur-Vehicule/admin/parametres' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/guides' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/contacts' => 'adminHomeController@showContactsController',
    '/Comparateur-Vehicule/admin/parametres/contacts/new' => 'adminHomeController@showContactsFormController',
    '/Comparateur-Vehicule/admin/parametres/diaporama' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/style' => 'adminHomeController@showHomeController',
];

  public function get($path){

    if (array_key_exists($path, $this->routes)) {

        list($controllerName, $method) = explode('@', $this->routes[$path]);

        
        include_once __DIR__ . "/Controllers/{$controllerName}.php";
        $controller = new $controllerName();
        $controller->$method();

    } else {
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
    }
  }
}

?>