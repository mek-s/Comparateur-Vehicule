<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";

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

    public function getMarquesPrincipalesView(){
      $this->controller = new marqueController();

      $principales = $this->controller->getMarquesPrincipalesController();
      foreach ($principales as $marque) {
        $chemin= './Images/marques/'.$marque['chemin'];
       ?>
       <div class="marque<?php $marque['marque_id']?>">
        <a href="/Comparateur-Vehicule/marques/?marque=<?php echo $marque['marque_id']?>">
          <img src="<?php echo $chemin ?>" alt="">
        </a>
        </div>
         
       <?php
      }
    }
}

?>