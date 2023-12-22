<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";

class marqueView{

    private $controller;
    private $chemin;

    public function __construct() {
      $this->chemin = $GLOBALS['base-url'] . 'Images/marques/';
    }

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

      foreach ($principales as $marque) {?>
       <div class="marque<?php $marque['marque_id']?>">
        <a href="/Comparateur-Vehicule/marques/details?marque=<?php echo $marque['marque_id']?>">
          <img src="<?php echo $this->chemin.$marque['chemin']; ?>" alt="">
        </a>
        </div>
         
       <?php
      }
    }

    public function showMarquesView($marques){ ?>
      
      <div class="marques-zone">
      <?php foreach ($marques as $marque) { ?>

         <div class="marque" id="marque<?php$marque['marque_id']?>">
          <a href="/Comparateur-Vehicule/marques/details?marque=<?php echo $marque['marque_id']?>">
            <img src="<?php echo $this->chemin.$marque['chemin'] ;?>" alt="">
          </a>
         </div>

      <?php
      }
        echo '</div>';
    }

    public function showMarqueDetailsView($marque){

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home = new homeView();
      $home->showMenu();
      ?>
      <div class="details-container">
        <div class="marque-details">
          <div class="marque">
            <img src="<?php echo $this->chemin.$marque['chemin']; ?>">
          </div>
          <div class="infos">
            <h3>La marque <?php echo $marque['marque_nom']; ?></h3>
            <h3>Fonde en <?php echo $marque['annee_creation']; ?></h3>
            <h3>dans <?php echo $marque['pays_origine']; ?>,</h3>
            <h3><?php echo $marque['siege_social']; ?></h3>
            <p>dfdghjhkjgfghh
              rtergjkhgfjdhbvfkj
              dghjlkjytwrqiudhygv bdgjkflw
            </p>
          </div>
          
        </div>
        <div class="vehic-principals">
           <h1>Vehicules Populaires</h1>
        </div>
        <div class="vehicules">
         <h1>Vehicules de la marques<?php echo $marque['marque_nom']; ?></h1>
         
        </div>
      </div>
      <?php 
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php"); 
    }

   
}

?>