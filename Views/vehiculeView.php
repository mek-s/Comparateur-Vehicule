<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\/vehiculeController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";

class vehiculeView{

    private $controller;

   // user views

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
     <div>
      
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

    //admin views

    
    public function addVehiculeView(){
      $this->controller = new vehiculeController();
        if (isset($_POST['create-vehic'])) {
    
          $params = array(
            1   => $_POST['nom'],
            2   => $_POST['type'],
            3   => $_POST['version'],
            4   => $_POST['annee']
          );
         
          $msg = $this->controller->addVehiculeController($params);
          echo $msg;
        } ?>
        <form method="POST" >
          <div class="input">
            <label>Nom vehicule</label>
            <input type="text" name="nom" required>
          </div>

          <div class="input">
            <label>Type vehicule</label>
            <select name="type" required>
                <option value="voiture">Voiture</option>
                <option value="moto">Moto</option>
                <option value="camion">Camion</option>
            </select>
          </div>
          <div class="input">
            <label>La marque du vehicule</label>
            <input type="number" name="version" required>
          </div>
          <div class="input">
            <label>L'annee de creation du vehicule</label>
            <input type="number" name="annee" min="1900" max="2100" required>
          </div>

          <input type="submit" name="create-vehic" value="Enregistrer">
        </form>
      <?php 
      
    }

    public function showVehiculeTableView($vehicules) {?>
      <div class="">
      <h1>Gestion des Vehicules</h1>
      <button id="myBtn"><i class="fa fa-plus-circle"></i> Ajouter un vehicule</button>
      </div>

      <div class="AddForm">
          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <span class="close">&times;</span>
              <h1>Ajouter un vehicule</h1>
              <?php $this->addVehiculeView();?>
            </div>

          </div>
      </div>

      <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        span.onclick = function() {
          modal.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
         
      </script>
    <?php }
}

?>