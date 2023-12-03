<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controller\/vehiculeController.php";

class vehiculeView{

    private $controller;

    public function addVehiculeView(){
        $this->controller = new vehiculeController();
        if (isset($_POST['create-vehic'])) {
          $nom=$_POST['nom'];
          $type=$_POST['type'];
          $marque=$_POST['marque'];
          $this->controller->addVehiculeController($nom ,$type, $marque,NULL,NULL,
           NULL, NULL, NULL, NULL, NULL,NULL,NULL, NULL, NULL);
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