<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\/vehiculeController.php";

class vehiculeView{

    private $controller;

    public function addVehiculeView(){
        $this->controller = new vehiculeController();
        if (isset($_POST['create-vehic'])) {
          $params = array(
            1   => $_POST['nom'],
            2   => $_POST['type'],
            3   => $_POST['marque']
          );
         
          $this->controller->addVehiculeController($params);
        } ?>
        <form method="POST">
          <input type="text" name="nom">
          <select name="type">
              <option value="voiture">Voiture</option>
              <option value="moto">Moto</option>
              <option value="camion">Camion</option>
          </select>
          <input type="number" name="marque">
          <input type="submit" name="create-vehic"value="Enregistrer">
        </form>
      <?php  
      
    }
}

?>