<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\compareController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";
require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\vehiculeController.php';


class compareView{

    private $controller;


    public function showMarques($marques){
        foreach ($marques as $marque) {
            echo '<option value="'.$marque['marque_id'].'">'.$marque['marque_nom'].'</option>';
        }
    }       
    
    public function showComparFormsView($Ids,$show,$redirect){
        $this->controller =new vehiculeController();
        $infos = array();
        for ($i=1; $i <= 4; $i++) { $infos[$i] = NULL;}
        for ($i=1; $i < count($Ids); $i++) { 
           if ($Ids[$i] != NULL) {
             $infos[$i]= $this->controller->getVehicCmpInfosController(array(1=>$Ids[$i]));
            }
        }

        if (isset($_POST['cmp_submit'])) {
        
           $Vid = array();

           for ($i=1; $i <= 4; $i++) { 
             if (!empty($_POST['vehicles'][$i]['version']) && $_POST['vehicles'][$i]['version'] != 'default'){
                $params = array( 1 => $_POST['vehicles'][$i]['version'] , 2 => $_POST['vehicles'][$i]['annee']);
                $vehic = $this->controller->getVehicByVersionController($params);
                $Vid[$i] = $vehic['vehicule_id']; 
             } else $Vid[$i] = null; 
             
          }
            $this->controller->createComparaisonController($Vid);
            $show = true;
            if ($redirect == true) {
                $url = '/Comparateur-Vehicule/compareV?';
    
                for ($i = 1; $i <= 4; $i++) {
                    if ($Ids[$i] !== null) {
                        $url .= 'v' . $i . '=' . $Ids[$i] . '&';
                    }
                }
            
                $url .= 'result=true';
                
                header('Location: ' . $url);
                exit();
            }
        }

       $this->controller = new marqueController();
       $marques = $this->controller->getMarquesController(); 
       
       ?>
       <div class="compare-container">
          <h1>Comparateur des vehicules</h1>
            <div class="compar-forms">
             
                    <form method="POST" onsubmit="return validateForm()">
                     <div class="vehic-forms">
                      <?php for ($i=1; $i <= 4  ; $i++) { ?>
                       
                    
                        <div class="vehicle-form" id="form<?php echo $i; ?>">
                            <h3>Selectionner un vehicule</h3>

                                <label>Marque</label>
                                <select name="vehicles[<?php echo $i; ?>][marque]"id="marque<?php echo $i; ?>" onchange="getModeles(<?php echo $i; ?>)">
                                <option value="<?php if ($infos[$i] != NULL ) {echo $infos[$i]['marque_id'];} else echo ''; ?>" selected>
                                 <?php  if ($infos[$i] != NULL) {echo $infos[$i]['marque_nom'];} else echo 'Marque';  ?></option>
                                    <?php $this->showMarques($marques); ?>   
                                </select>

                                <label >Modele</label>
                                <select name="vehicles[<?php echo $i; ?>][modele]" id="modele<?php echo $i; ?>" onchange="getVersions(<?php echo $i; ?>)">
                                 <option value="<?php if ($infos[$i] != NULL ) {echo $infos[$i]['modele_id'];} else echo ''; ?>" selected>
                                 <?php  if ($infos[$i] != NULL) {echo $infos[$i]['modele_nom'];} else echo 'Modele';  ?></option>
              
                                </select>

                                <label>Version</label>
                                <select name="vehicles[<?php echo $i; ?>][version]" id="version<?php echo $i; ?>" onchange="getAnnees(<?php echo $i; ?>)">
                                <option value="<?php if ($infos[$i] != NULL ) {echo $infos[$i]['version_id'];} else echo ''; ?>" selected>
                                  <?php  if ($infos[$i] != NULL) {echo $infos[$i]['version_nom'];} else echo 'Vesrion';  ?></option>
                                   
                                </select>

                                <label>Annee</label>
                                <select name="vehicles[<?php echo $i; ?>][annee]" id="annee<?php echo $i; ?>">
                                <option value="<?php if ($infos[$i] != NULL ) {echo $infos[$i]['annee'];} else echo ''; ?>" selected>
                                 <?php  if ($infos[$i] != NULL) {echo $infos[$i]['annee'];} else echo 'Annee';  ?></option>
                                    
                                </select>
                               
                      </div>
                            
                      
                    <?php } ?>
                    </div>
                     <input id="submit-form" type="submit" name="cmp_submit" value="Comparer" />
                    
                    
                </form>
            </div>
            
            <div id="comparaison">
                <?php  
                    $this->controller =new vehiculeController();
                    $categ = $this->controller->getCategoriesController();
                    $caracs = $this->controller->getCaracsController();
                    print_r($categ);
                    print_r($caracs);
                    print_r($Vid);
                    $this->showComparResultView($categ,$caracs,$Vid);
                
                ?>
            </div>
        </div>
        
      <?php 
    }

    public function showComparResultView($categories,$caracs,$idS){
        
        echo '<div class="tab">';
        foreach ($categories as $categorie) {?>
            <button class="tablinks" onclick="openCity(event, '<?php echo $categorie['categ_nom'] ; ?>')"><?php echo $categorie['categ_nom'] ; ?></button>
       <?php }  ?>
        </div>
        <?php 
        foreach ($categories as $categorie) { 
            $this->controller = new vehiculeController();
            $vehicules = $this->controller->getCaracsByCategController(array(1 => $categorie['categ_id']));
            $displayedImages = array();
            ?>
            <div id="<?php echo $categorie['categ_nom'] ; ?>" class="tabcontent">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <?php 
                           
                        
                        foreach ($vehicules as $vehic) {
                        if ($vehic['categ_id'] == $categorie['categ_id'] && in_array($vehic['vehicule_id'],$idS) && !in_array($vehic['vehicule_id'], $displayedImages) ) {
                            $displayedImages[] = $vehic['vehicule_id'];
                            ?>
                          <th>
                          <div class="compr-img-container">
                            <a href="/Comparateur-Vehicule/vehicules/details?vehicule=<?php echo $vehic['vehicule_id']?>">
                             <img src="<?php echo $GLOBALS['base-url'].'Images/vehicules/'.$vehic['chemin'];?>" alt="">
                             </a>
                           </div>
                          </th>
                  <?php } 
                        }
                    ?>
                        
                    </tr>
                </thead>
                
                <tbody>
                 <?php 
                 foreach ($caracs as $carac) {
                    if ($carac['categ_id'] == $categorie['categ_id']) {
                        echo '<tr>';
                        echo '<td>'.$carac['carac_nom'].'</td>';
                        foreach ($vehicules as $vehic) {
                            if ($vehic['carac_id'] == $carac['carac_id'] && in_array($vehic['vehicule_id'],$idS)) {?>
                              <td><?php echo $vehic['value']; ?></td>
                            
                       <?php }
                        } 
                       echo '</tr>';
                    }
                }?>
                </tbody>
            </table>
          </div>
        <?php }
    }

    public function showComparaisonsCards($params){
      
        $this->controller = new vehiculeController();
        echo '<div class="cards-container">';
        foreach ($params as $comp) {
            $img1 = $this->controller->getVehiculeImageController(array( 1=> $comp['vehicule_1']));
            $img2 = $this->controller->getVehiculeImageController(array( 1=> $comp['vehicule_2']));
          
            ?>
            <a href="/Comparateur-Vehicule/compareV?v1=<?php echo $comp['vehicule_1'];?>&v2=<?php echo $comp['vehicule_2'];?>&v3=&v4&result=true" class="comps-card">
            <div class="image-container">
                <img src="<?php echo $GLOBALS['base-url'].'Images/vehicules/'.$img1['chemin'];?>" alt="">
                <img src="<?php echo $GLOBALS['base-url'].'Images/vehicules/'.$img2['chemin'];?>" alt="">
            </div>
            <div class="name-container">
                <span><?php echo $img1['vehicule_nom'];?></span>
                <span id="vs">VS</span>
                <span><?php echo $img2['vehicule_nom'];?></span>
            </div>
            </a>
            <?php
        }
        echo '</div>';
      
    }

    public function showComparateurView($params,$show){
        $this->showComparFormsView($params,$show,false);
    }

}

?>