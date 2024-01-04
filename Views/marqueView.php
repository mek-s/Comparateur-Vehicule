<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";
require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\vehiculeController.php';
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";

class marqueView{

    private $controller;
    private $cheminM;
    private $cheminV;

    public function __construct() {
      $this->cheminM = $GLOBALS['base-url'] . 'Images/marques/';
      $this->cheminV = $GLOBALS['base-url'] . 'Images/vehicules/';
    }

  // Le formulaire de creation d'une nouvelle marque
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

  // Afficher les marques principales
  public function showMarquesPrincipalesView(){
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

  // afficher la page de marques 
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

  // afficher les principals vehicules d'une marque
  private function showPrincipalVehicules($Pvehicules){?>
    <div class="vehic-principals">
        <?php
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

    <?php 
  }
  
  // afficher les informations d'une marque
  private function showMarqueInfos($marque){ 
    $this->controller = new marqueController();
    $note = $this->controller->getMarqueNoteController($marque['marque_id']);?>

    <div class="marque-details">
      <div class="marque">
        <img src="<?php echo $this->cheminM.$marque['chemin']; ?>">
      </div>
      <div class="infos">
        <h3>La marque <?php echo $marque['marque_nom']; ?> Fonde en <?php echo $marque['annee_creation']; ?> dans <?php echo $marque['pays_origine']; ?>,<?php echo $marque['siege_social']; ?></h3>
        <div class="note">
              <img src="<?php echo $GLOBALS['base-url'].'Images/star.png';?>" alt="">
              <span><?php echo $note['NoteMoy']?></span>
              <p>/ 5  base sur revues</p>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
      </div>
    </div>
   <?php 
  }

  // afficher tous les vehicules d'une marque
  private function showAllVehicules($vehicules){
    $this->controller = new marqueController(); ?>

    <div class="vehicules">
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
               $this->controller = new vehiculeController();
               $caracs = $this->controller->getVehiculeCaracsController(array(1 => $vehicule['vehicule_id']));
               foreach ($caracs as $carac) {?>
                 <p><?php echo $carac['carac_nom'].':'.$carac['value']; ?> </p>
               <?php }
            ?>
          </div>
       </div>
        <?php }
        ?>
      </div>
   <?php 
  }

  // Afficher les details d'une marque
  public function showMarqueDetailsView($marque,$Pvehicules,$vehicules){

    require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
    $home = new homeView();
   
    $home->showMenu();?>
    <div class="details-container">
      <?php $this->showMarqueInfos($marque);?>
      <h1>Vehicules Principales</h1>
      <?php $this->showPrincipalVehicules($Pvehicules);?>
      <h1>Vehicules de la marques <?php echo $marque['marque_nom']; ?></h1>
      <?php $this->showAllVehicules($vehicules);?>
    </div>
    <?php 
    require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php"); 
  }

}

?>