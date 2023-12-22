<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\/vehiculeModel.php";

class marqueView{

    private $controller;
    private $model;
    private $cheminM;
    private $cheminV;

    public function __construct() {
      $this->cheminM = $GLOBALS['base-url'] . 'Images/marques/';
      $this->cheminV = $GLOBALS['base-url'] . 'Images/vehicules/';
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
          <img src="<?php echo $this->cheminM.$marque['chemin']; ?>" alt="">
        </a>
        </div>
         
       <?php
      }
    }

    public function showMarquesView($marques){ ?>
      
      <div class="marques-zone">
      <?php foreach ($marques as $marque) { ?>

         <div class="marque" id="marque<?php echo $marque['marque_id'];?>">
            
            <a href="/Comparateur-Vehicule/marques/details?marque=<?php echo $marque['marque_id']?>">
              <img src="<?php echo $this->cheminM.$marque['chemin'] ;?>" alt="">
            </a>
            
            <span><?php echo $marque['marque_nom'];?></span>
         </div>

      <?php
      }
        echo '</div>';
    }

    public function showMarqueDetailsView($marque){

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home = new homeView();
      $this->model = new vehiculeModel();

      $home->showMenu();

      $vehicules = $this->model->getMarquesVehiculesModel(array(1 => $marque['marque_id']));
      
      ?>
      <div class="details-container">
        <div class="marque-details">
          <div class="marque">
            <img src="<?php echo $this->cheminM.$marque['chemin']; ?>">
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
        <h1>Vehicules Principales</h1>
        <div class="vehic-principals">
          <?php
           $Pvehicules = $this->model->getPrincipalesVehiculesModel(array(1 => $marque['marque_id']));
           foreach ($Pvehicules as $vehicule) {?>
            <div class="principals-images">
             <a href="/Comparateur-Vehicule/vehicules/details?vehicule=<?php echo $vehicule['vehicule_id']?>">
               <img src="<?php echo $this->cheminV.$vehicule['chemin']; ?>" alt="">
             </a>
             </div>
              
            <?php
           }
          ?> 
        </div>
        <div class="vehicules">
         <h1>Vehicules de la marques <?php echo $marque['marque_nom']; ?></h1>
          <?php
           foreach ($vehicules as $vehicule) {?>
            <div class="vehicule">
              <a href="/Comparateur-Vehicule/vehicules/details?vehicule=<?php echo $vehicule['vehicule_id']?>">
               <img src="<?php echo $this->cheminV.$vehicule['chemin'];?>">
              </a>
              <div class="details">
                <p>Nom : <?php echo $vehicule['vehicule_nom']; ?></p>
                <p>Modele: <?php echo $vehicule['modele_nom']; ?></p>
                <p>Version :<?php echo $vehicule['version_nom']; ?></p>
              </div>
              <div class="caracteristiques">
              <?php
                 $caracteristiques = $this->model->getVehiculeCracteristiques(array(1 => $vehicule['vehicule_id']));

                 foreach ($caracteristiques as $carac) {?>
                   <p><?php echo $carac['carac_nom'].':'.$carac['value']; ?> </p>
                 <?php }
              ?>
            </div>
         </div>
          <?php }
          ?>
        </div>
      </div>
      <?php 
      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php"); 
    }

   
}

?>