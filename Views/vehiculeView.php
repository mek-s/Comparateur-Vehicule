<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\/vehiculeController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\imageController.php";
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

    public function showVehiculeDetailsView($vehicule,$note,$caracs){?>

      <div class="details-container">
        <?php $this->showInfosVehicule($vehicule,$note,$caracs);?>
        <h1>Les caracteristiques du vehicule</h1>
        <?php $this->showCaracteristiquesVehicule($caracs);?>
        <h1>Les avis des clients</h1>
        <?php $this->showAvisVehicule($note);?>
        <h1>Les comparaisons populaires</h1>
        <?php $this->showPopularVehiculeComparaisons();?>
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
      <style>
        .vehic-table {
            margin-top: 20px;
        }

        #myTable th,
        #myTable td {
            text-align: center;
        }

        #myTable th {
            background-color: #0076a8; 
            color: #fff;
        }

        #myTable tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn {
            padding: 8px 16px;
            margin: 2px;
        }
        
      </style>
      <div class="">
        <h1>Gestion des Vehicules</h1>
        <a class="button" href="/Comparateur-Vehicule/admin/vehicules/new" ><i class="fa fa-plus-circle"></i> Ajouter un vehicule</a>
      </div>

      <div class="vehic-table">
        
       <table id="myTable" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th scope="col">Nom</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Modele</th>
                      <th scope="col">Version</th>
                      <th scope="col">Annee</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>

                      
                  </tr>
              </thead>
                
              <tbody>
                  <?php  foreach($vehicules as $vehicule) { ?>
                         
                          <tr>
                              <td><?php echo $vehicule['vehicule_nom']; ?></td>
                              <td><?php echo $vehicule['marque_nom']; ?></td>
                              <td><?php echo $vehicule['modele_nom']; ?></td>
                              <td><?php echo $vehicule['version_nom']; ?></td>
                              <td><?php echo $vehicule['annee']; ?></td>
                              <td><a href="/Comparateur-Vehicule/admin/vehicules/details?vehicule=<?php echo $vehicule['vehicule_id']; ?>" class="btn btn-warning rounded-pill">Voir details</a></td>
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