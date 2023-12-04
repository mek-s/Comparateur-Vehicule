<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controller\marqueController.php";

class marqueView{

    private $controller;

    public function createMarqueView(){
        $this->controller = new marqueController();

        if (isset($_POST['create-marque'])) {
          $params=array(
            1 => $_POST['nom'],
            2 => $_POST['pays'],
            3 => $_POST['siege'],
            4 => $_POST['annee']
          );
          $this->controller->createMarqueController($params);
        } ?>
        <form method="POST">
          <input type="text" name="nom">
          <input type="text" name="pays">
          <input type="text" name="siege">
          <input type="text" name="annee">
          <input type="submit" name="create-marque"value="Enregistrer">
        </form>
      <?php  
      } 

    
}

?>