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


if (isset($_POST['formData'])) {
    $data = $_POST['formData'];

    $params1 = array(1 => $data[0]['version_id'] , 2 => $data[0]['annee']);
    $params2 = array(1 => $data[1]['version_id'] , 2 => $data[1]['annee']);
    if (!empty($data[2])) { $params3 = array(1 => $data[2]['version_id'] , 2 => $data[2]['annee']);}
    if (!empty($data[3])) {
      $params4 = array(1 => $data[3]['version_id'] , 2 => $data[3]['annee']);
    }

    require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\vehiculeController.php';
    $controller = new vehiculeController();

   // get the vehicules by version_id and annee    
    $vehic1 = $controller->getVehicByVersionController($params1);
    $vehic2 = $controller->getVehicByVersionController($params2);
    $vehic3 = $controller->getVehicByVersionController($params3);
    $vehic4 = $controller->getVehicByVersionController($params4);

     $controller->createComparaisonController(array(
      1 => $vehic1['vehicule_id'] , 
      2 => $vehic2['vehicule_id'] , 
      3 => $vehic3['vehicule_id'] , 
      4 => $vehic4['vehicule_id'] ));


    $controller->showComparResultView();
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
    '/Comparateur-Vehicule/compareV'=> 'compareController@showComparController',
    '/Comparateur-Vehicule/news' => 'newsController@showNewsController',
    '/Comparateur-Vehicule/news/details' => 'newsController@showNewsDeatailsController',
    '/Comparateur-Vehicule/signin' => 'usersController@showSigninFormController',
    '/Comparateur-Vehicule/signup'=>  'usersController@showSignupFormController',
    '/Comparateur-Vehicule/admin' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/marques' => 'marqueController@showAdminMarqueController',
    '/Comparateur-Vehicule/admin/marques/new' => 'marqueController@showMarqueFormController',
    '/Comparateur-Vehicule/admin/marques/modifier' => 'marqueController@showModifMarqueFormController',
    '/Comparateur-Vehicule/admin/vehicules' => 'vehiculeController@showAdminVehiculeController',
    '/Comparateur-Vehicule/admin/vehicules/new' => 'vehiculeController@showVehiculeFormController',
    '/Comparateur-Vehicule/admin/vehicules/details' => 'vehiculeController@showAdminVehiculeDetailsController',
    '/Comparateur-Vehicule/admin/vehicules/modifier' => 'vehiculeController@showModifVehiculeFormController',
    '/Comparateur-Vehicule/admin/users' => 'usersController@showAdminUsersController',
    '/Comparateur-Vehicule/admin/users/profil' => 'adminHomeController@showAdminUserProfilController',
    '/Comparateur-Vehicule/admin/avis' => 'avisController@showAdminAvisController',
    '/Comparateur-Vehicule/admin/news' => 'newsController@showAdminNewsController',
    '/Comparateur-Vehicule/admin/news/new' => 'newsController@showNewsFormController',
    '/Comparateur-Vehicule/admin/news/modifier' => 'newsController@showModifNewsController',
    '/Comparateur-Vehicule/admin/parametres' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/guides' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/contacts' => 'adminHomeController@showContactsController',
    '/Comparateur-Vehicule/admin/parametres/contacts/modifier' => 'adminHomeController@modifContactsFormController',
    '/Comparateur-Vehicule/admin/parametres/contacts/new' => 'adminHomeController@showContactsFormController',
    '/Comparateur-Vehicule/admin/parametres/diaporama' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/admin/parametres/style' => 'adminHomeController@showHomeController',
    '/Comparateur-Vehicule/profil' => 'usersController@showUserProfilController',
    '/Comparateur-Vehicule/logout' => 'usersController@logoutController'
    ];

  private function isProtectedRoute($path) {
    $protectedRoutes = [
      '/Comparateur-Vehicule/admin',
      '/Comparateur-Vehicule/admin/marques',
      '/Comparateur-Vehicule/admin/marques/new',
      '/Comparateur-Vehicule/admin/marques/modifier',
      '/Comparateur-Vehicule/admin/vehicules',
      '/Comparateur-Vehicule/admin/vehicules/new' ,
      '/Comparateur-Vehicule/admin/vehicules/details',
      '/Comparateur-Vehicule/admin/vehicules/modifier',
      '/Comparateur-Vehicule/admin/users',
      '/Comparateur-Vehicule/admin/avis',
      '/Comparateur-Vehicule/admin/news',
      '/Comparateur-Vehicule/admin/news/new',
      '/Comparateur-Vehicule/admin/parametres',
      '/Comparateur-Vehicule/admin/parametres/guides',
      '/Comparateur-Vehicule/admin/parametres/contacts',
      '/Comparateur-Vehicule/admin/parametres/contacts/new',
      '/Comparateur-Vehicule/admin/parametres/diaporama',
      '/Comparateur-Vehicule/admin/parametres/style',
      '/Comparateur-Vehicule/profil'
    ];

    return in_array($path, $protectedRoutes);
  }

  public function get($path){

       

        if ($this->isProtectedRoute($path) && !isset($_SESSION['auth_a']) && !isset($_SESSION['auth_u'])) {
            header('Location: /Comparateur-Vehicule/signin');
            exit();
        }
        
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