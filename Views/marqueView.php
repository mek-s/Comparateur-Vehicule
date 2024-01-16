<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";
require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\vehiculeController.php';
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\utilities\dataTable.php";

class marqueView{

    private $controller;
    private $cheminM;
    private $cheminV;

    public function __construct() {
      $this->cheminM = $GLOBALS['base-url'] . 'Images/marques/';
      $this->cheminV = $GLOBALS['base-url'] . 'Images/vehicules/';
    }

    // Le formulaire de creation d'une nouvelle marque
    public function addMarqueView(){
      if (isset($_POST['create-mrq'])) {
  
        // inserer l'image de la marque
        $this->controller = new imageController();
        $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
        $dir = 'Images/marques/';
        
        $imgId = $this->controller->createImageController($_FILES,$dir,$params);
        
          // inserer la marque
          $this->controller = new marqueController();
            $params = array(
              1   => $_POST['nom'],
              2   => $_POST['pays'],
              3   => $_POST['siege'],
              4   => $_POST['annee'],
              5   => (isset($_POST['principal']) && $_POST['principal'] == 'on') ? 1 : 0 ,
              6   => $imgId
            );
            $this->controller->createMarqueController($params);  

            header('Location: /Comparateur-Vehicule/admin/marques');
           
      } ?>
      <h1>Ajouter une nouvelle marque</h1>
      <form method="POST" enctype="multipart/form-data" >
        <div class="input">
          <label>Nom de la marque</label>
          <input type="text" name="nom" required>
        </div>
  
        <div class="input">
          <label>Le pays de la marque</label>
          <input type="text" name="pays" required>
        </div>
        <div class="input">
          <label>Le siege social de la marque</label>
          <input type="text" name="siege" required>
        </div>
        <div class="input">
          <label>L'annee de creation de la marque</label>
          <input type="number" name="annee" min="1900" max="2100" required>
        </div>
        <div class="input">
          <label>Image de la marque</label>
          <input type="file" name="image" id="image" >
        </div> 
        <div class="input">
          <label>Marque Principale ? </label>
          <input type="checkbox" name="principal">
        </div>
  
        <input type="submit" name="create-mrq" value="Enregistrer">
      </form>
    <?php 
    }
    // le formulaire de modification d'une marque
    public function modifMarqueView($marque){

      $imgId = $marque['image_id'];

      if (isset($_POST['mdf-mrq'])) {
        // if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        //   $this->controller = new imageController();
        //   $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
        //   $dir = 'Images/marques/';
        //   $imgId = $this->controller->createImageController($_FILES,$dir,$params);
        //  }


         $params = array(
              
              1   => $_POST['nom'],
              2   => $_POST['pays'],
              3   => $_POST['siege'],
              4   => $_POST['annee'],
              5   => (isset($_POST['principal']) && $_POST['principal'] == 'on') ? 1 : 0 ,
              6   => $imgId,
              7   => $_POST['id'],
         );

         $this->controller = new marqueController();
         $this->controller->modifMarqueController($params);

         header('Location: /Comparateur-Vehicule/admin/marques');
         
      }
      
      
      ?>
      <form  method="POST">
        <h2>Modifier une Marque</h2>
        <input type="hidden" name="id" value="<?php echo $marque['marque_id'];?>">
    
        <div class="input">
          <label>Nom de la marque</label>
          <input type="text" name="nom" value="<?php echo $marque['marque_nom'];?>" required>
        </div>
  
        <div class="input">
          <label>Le pays de la marque</label>
          <input type="text" name="pays" value="<?php echo $marque['pays_origine'];?>" required>
        </div>
        <div class="input">
          <label>Le siege social de la marque</label>
          <input type="text" name="siege"value="<?php echo $marque['siege_social'];?>"  required>
        </div>
        <div class="input">
          <label>L'annee de creation de la marque</label>
          <input type="number" name="annee" min="1900" max="2100" value="<?php echo $marque['annee_creation'];?>" required>
        </div>
        <!-- <div class="input">
          <label>Image de la marque</label>
          <input type="file" name="image" id="image" >
        </div>  -->
        <div class="input">
          <label>Marque Principale ? </label>
          <input type="checkbox" name="principal" <?php echo ($marque['principale'] == 1) ? 'checked' : ''; ?>>
        </div>
  
        <input type="submit" name="mdf-mrq" value="Enregistrer">
      </form>
   <?php }



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
    
    <div class="cards-container">
      <?php foreach ($marques as $marque) { ?>
             
              <a href="/Comparateur-Vehicule/marques/details?marque=<?php echo $marque['marque_id']?>" class="marque-card">
              <img src="<?php echo $this->cheminM.$marque['chemin'] ;?>" alt="">
              <span><?php echo $marque['marque_nom'];?></span>
          </a>
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

  //Affechier la table des marques pour admin
  public function showMarquesTableView($marques){
    if (isset($_POST['supp_mrq'])) {
      $this->controller= new marqueController();
      $this->controller->deleteMarqueController(array(1=> $_POST['marque_id']));
    }
    
    ?>
      
      <div class="">
        <h1>Gestion des Marques</h1>
        <a class="button" href="/Comparateur-Vehicule/admin/marques/new" ><i class="fa fa-plus-circle"></i> Ajouter une marque</a>
      </div>

      <div class="marque-table">

      <?php
                 $columns = array( 1 => 'Nom',
                                   2 => 'Pays',
                                   3 => 'Annee' );
                 $items = array();

                 foreach($marques as $marque) {
                  $item = [
                    'param1' => $marque['marque_nom'], 
                    'param2' => $marque['pays_origine'].','.$marque['siege_social'], 
                    'param3' => $marque['annee_creation'],
                    'actions' => [
                      ['type' => 'link', 'href' => '/Comparateur-Vehicule/admin/marques/modifier?marque='.$marque['marque_id'], 'class' => 'btn btn-warning rounded-pill', 'text' => 'Modifier'],
                      ['type' => 'link', 'href' => '/Comparateur-Vehicule/admin/vehicules?marque='.$marque['marque_id'], 'class' => 'btn btn-warning rounded-pill', 'text' => 'Voir vehicules'],
                      ['type' => 'form', 'hidden_name' => 'marque_id', 'hidden_value' => $marque['marque_id'], 'button_name' => 'supp_mrq', 'button_text' => 'Supprimer'],
                  ]];
                  $items[] = $item;
                 }
                
                 $table = new dataTable($columns,$items,3);
                 $table->render();
                ?>
        
      </div>
    <?php
  }



}

?>