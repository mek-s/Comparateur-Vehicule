<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\/vehiculeController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\imageController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\utilities\dataTable.php";

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
           <a href="/Comparateur-Vehicule/compareV?v1=<?php echo $vehicule['vehicule_id'];?>&v2=">Comparer</a>
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

    private function showPopularVehiculeComparaisons($params){
        $this->controller = new compareController();
        $this->controller->showVehiculComparaisons($params);
    }

    public function showVehiculeDetailsView($vehicule,$note,$caracs){?>

      <div class="details-container">
        <?php $this->showInfosVehicule($vehicule,$note,$caracs);?>
        <h1>Les caracteristiques du vehicule</h1>
        <?php $this->showCaracteristiquesVehicule($caracs);?>
        <h1>Les avis des clients</h1>
        <?php $this->showAvisVehicule($note);?>
        <h1>Les comparaisons populaires</h1>
        <?php $this->showPopularVehiculeComparaisons(array( 1=> $vehicule['vehicule_id'] ,2=> $vehicule['vehicule_id']));?>
      </div>

      <?php 

    }

    //admin views

    public function addVehiculeView(){
        if (isset($_POST['create-vehic'])) {

          // inserer l'imeg du vehicule
          $this->controller = new imageController();
          $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
          $dir = 'Images/vehicules/';
          
          $imgId = $this->controller->createImageController($_FILES,$dir,$params);

           
          
            // inserer le vehicule
            $this->controller = new vehiculeController();
              $params = array(
                1   => $_POST['nom'],
                2   => $_POST['type'],
                3   => $_POST['version'],
                4   => $_POST['annee'],
                5   => (isset($_POST['principal']) && $_POST['principal'] == 'on') ? 1 : 0 ,
                6   => $imgId
              );
              $vehicId = $this->controller->createVehiculeController($params);

              //inserer les caracteristiques du vehicule
               
              $caracIds = $_POST['carac_id'];
              $values = $_POST['value'];

              foreach ($caracIds as $index => $caracId) {
                $params = array(
                    1 => $caracId,
                    2 => $vehicId,
                    3 => $values[$index],
                );

                $this->controller->createVehiculeCaracsController($params);
            }
  
          
        } ?>
        <h1>Ajouter un nouvel vehicule</h1>
        <form method="POST" enctype="multipart/form-data" >
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
          <div class="input">
            <label>Image du vehicule</label>
            <input type="file" name="image" id="image" >
          </div> 
          <?php
            $this->controller = new vehiculeController();

            $caracs = $this->controller->getCaracsController();
            foreach ($caracs as $carac) { ?>
              <div class="input">
                <label><?php echo $carac['carac_nom'];?></label>
                <input type="hidden" name="carac_id[]" value="<?php echo $carac['carac_id']; ?>">
                <input type="text" name="value[]">
              </div> 
           <?php }
          ?>
          <div class="input">
            <label>Vehicule Principale ? </label>
            <input type="checkbox" name="principal">
          </div>

          <input type="submit" name="create-vehic" value="Enregistrer">
        </form>
      <?php 
      
    }

    public function showVehiculeTableView($vehicules) {
      if (isset($_POST['supp_vehic'])) {
        $this->controller= new vehiculeController();
        $this->controller->deleteVehiculeController(array(1=> $_POST['vehic_id']));
      }
      ?>
      
      <div class="">
        <h1>Gestion des Vehicules</h1>
        <a class="button" href="/Comparateur-Vehicule/admin/vehicules/new" ><i class="fa fa-plus-circle"></i> Ajouter un vehicule</a>
      </div>

      <div class="vehic-table">


      <?php
                 $columns = array( 1 => 'Nom',
                                   2 => 'Marque',
                                   3 => 'Modele',
                                   4 => 'Version',
                                   5 => 'Annee' );
                 $items = array();

                 foreach($vehicules as $vehicule) {
                  $item = [
                    'param1' => $vehicule['vehicule_nom'], 
                    'param2' => $vehicule['marque_nom'], 
                    'param3' => $vehicule['modele_nom'],
                    'param4' => $vehicule['version_nom'],
                    'param5' => $vehicule['annee'],
                    'actions' => [
                      ['type' => 'link', 'href' => '/Comparateur-Vehicule/admin/vehicules/details?vehicule='.$vehicule['vehicule_id'] , 'class' => 'btn btn-warning rounded-pill' , 'text' => 'Voir details'],
                      ['type' => 'link', 'href' => '/Comparateur-Vehicule/admin/vehicules/modifier?vehicule='.$vehicule['vehicule_id'] ,  'class' => 'btn btn-warning rounded-pill', 'text' => 'Modifier'],
                      ['type' => 'form', 'hidden_name' => 'vehic_id', 'hidden_value' => $vehicule['vehicule_id'], 'button_name' => 'supp_vehic', 'button_text' => 'Supprimer'],
                  ]];
                  $items[] = $item;
                 }
                
                 $table = new dataTable($columns,$items,3);
                 $table->render();
                ?>
        
       <table id="myTable" class="table table-striped" style="width:100%">
              
              <tbody>
                  <?php  foreach($vehicules as $vehicule) { ?>
                         
                        
                             
                              <td><a href="" class="btn btn-warning rounded-pill">Modifier</a></td>
                              <td>
                                  <form method="POST">
                                      <input type="hidden" name="vehic_id" value="<?php echo $vehicule['vehicule_id'];?>">
                                      <button type="submit" name="supp_vehic" >Supprimer</button>
                                  </form>
                              </td>
                          </tr>
                  <?php
                          }
                  ?>
              </tbody>
       </table>
        
      </div>

  
    <?php }
}

?>