<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\/vehiculeController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";

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

    private function showInfosVehicule($vehicule,$note,$caracs){?>
       <div class="infos-vehic">
         <div class="image">
          <img src="<?php echo $GLOBALS['base-url'].'Images/vehicules/'.$vehicule['chemin'];?>">
         </div>
         <div class="infos">
           <h1><?php echo $vehicule['marque_nom'].' '.$vehicule['vehicule_nom'].' '.$vehicule['annee'];?></h1>
           <div class="note">
            <img src="<?php echo $GLOBALS['base-url'].'Images/star.png';?>" alt="">
            <span><?php echo $note['NoteMoy']?></span>
            <p>/ 5  base sur revues</p>
           </div>
           <div class="key-caracs" style="background-color: #0076a8;">
            <?php 
             foreach ($caracs as $caracteristique) {?>
               <div class="carac">
                 <img src="<?php echo $GLOBALS['base-url'].'Images/caracs/'.$caracteristique['chemin'];?>" alt="">
                 <p><?php echo $caracteristique['carac_nom'];?></p>
                 <p> <?php echo $caracteristique['value'].' '.$caracteristique['unite_mesure'];?></p>
               </div>
             <?php 
             }
            
            ?>
           </div>
           <a href="/Comparateur-Vehicule/comparaisons?vehic-1=<?php echo $vehicule['vehicule_id'];?>">Comparer</a>
         </div>
       </div>
      <?php
    }

    private function showCaracteristiquesVehicule($caracs){?>
      <?php print_r($caracs); ?>
      <div class="key-caracs">
      <?php 
       foreach ($caracs as $carac) {?>
         <div class="carac">
           <p><?php echo $carac['carac_nom'];?> : <?php echo $carac['value'];?></p>
         </div>
      <?php }
      
      ?>
     </div>
     <?php 
    }

    private function showAvisVehicule(){
      echo 'AvisVehicule';
    }

    private function showPopularVehiculeComparaisons(){
        echo 'PopularVehiculeComparaisons';
    }

    public function showVehiculeDetailsView($vehicule,$note,$caracs){
      $home = new homeView();

      require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\header.php");
      $home->showMenu();?>

      <div class="details-container">
        <?php $this->showInfosVehicule($vehicule,$note,$caracs);?>
        <h1>Les caracteristiques du vehicule</h1>
        <?php $this->showCaracteristiquesVehicule($caracs);?>
        <h1>Les avis des clients</h1>
        <?php $this->showAvisVehicule($note);?>
        <h1>Les comparaisons populaires</h1>
        <?php $this->showPopularVehiculeComparaisons();?>
      </div>

      <?php require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\/footer.php"); 

    }
}

?>