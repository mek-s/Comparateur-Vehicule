<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\compareController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";
require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\vehiculeController.php';


class compareView{

    private $controller;


    public function showMarques($marques){
        echo'<option value="default">Marque</option>';
        foreach ($marques as $marque) {
            echo '<option value="'.$marque['marque_id'].'">'.$marque['marque_nom'].'</option>';
        }
    }       
    
    public function showCompar(){
        echo "this is me ";
    }
    
    public function showComparFormsView($v1,$v2,$v3,$v4){
        if (isset($_POST['cmp_submit'])) {
           $this->controller =new vehiculeController();

           $idS = array();

        //    for ($i=1; $i <= 4; $i++) { 
        //      if (!empty($_POST['vehicles'][$i]['version'])) {
        //         $params = array( 1 => $_POST['vehicles'][$i]['version'] , 2 => $_POST['vehicles'][$i]['annee']);
        //         $vehic = $this->controller->getVehicByVersionController($params);
        //         $idS[$i] = $vehic['vehicule_id']; 
        //     }
        $idS[1]=20;
        $idS[2]=25;
        $idS[3]=37;
        $idS[4]=43;
             
          // }
            // $this->controller->createComparaisonController($idS);

        }

       $this->controller = new marqueController();
       $marques = $this->controller->getMarquesController(); 
       
       ?>
       <div class="compare-container">
            <h1>Comparateur des vehicules</h1>
            <div class="compar-forms">
                    <form method="POST">
                      <?php for ($i=1; $i <= 4  ; $i++) { ?>
                    
                        <div class="vehicle-form" id="form<?php echo $i; ?>">
                            <h3>Selectionner un vehicule</h3>

                                <label>Marque</label>
                                <select name="vehicles[<?php echo $i; ?>][marque]"id="marque<?php echo $i; ?>" onchange="getModeles(<?php echo $i; ?>)">
                                    <?php $this->showMarques($marques); ?>   
                                </select>

                                <label >Modele</label>
                                <select name="vehicles[<?php echo $i; ?>][modele]" id="modele<?php echo $i; ?>" onchange="getVersions(<?php echo $i; ?>)">
                                <option value="default">Modele</option>    
                                </select>

                                <label>Version</label>
                                <select name="vehicles[<?php echo $i; ?>][version]" id="version<?php echo $i; ?>" onchange="getAnnees(<?php echo $i; ?>)">
                                    <option value="default">Version</option>
                                </select>

                                <label>Annee</label>
                                <select name="vehicles[<?php echo $i; ?>][annee]" id="annee<?php echo $i; ?>">
                                    <option value="default">Annee</option>
                                </select>
                                <!-- <button onclick="getVehicule(<?php echo $i; ?>,event)">Ajouter</button> -->
                      </div>
                            
                    
                    <?php } ?>
                    <input type="submit" name="cmp_submit" value="Comparer" />
                </form>
            </div>
            
            <div id="comparaison">
                <?php if (isset($_POST['cmp_submit'])) { 
                    $this->controller =new vehiculeController();
                    $categ = $this->controller->getCategoriesController();
                    $caracs = $this->controller->getCaracsController();
                    $this->showComparResult($categ,$caracs,$idS);
                } 
                ?>
            </div>
        </div>
        
      <?php 
    }

    public function showComparResult($categories,$caracs,$idS){
        
        echo '<div class="tab">';
        foreach ($categories as $categorie) {?>
            <button class="tablinks" onclick="openCity(event, '<?php echo $categorie['categ_nom'] ; ?>')"><?php echo $categorie['categ_nom'] ; ?></button>
       <?php }  ?>
        </div>
        <?php 
        foreach ($categories as $categorie) { 
            $this->controller = new vehiculeController();
            $vehicules = $this->controller->getCaracsByCategController(array(1 => $categorie['categ_id']));
            ?>
            <div id="<?php echo $categorie['categ_nom'] ; ?>" class="tabcontent">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <?php 

                        // the images are duplicated !!!
                        foreach ($vehicules as $vehic) {
                        if ($vehic['categ_id'] == $categorie['categ_id'] && in_array($vehic['vehicule_id'],$idS) ) {?>
                          <th><a href="/Comparateur-Vehicule/vehicules/details?vehicule=<?php echo $vehic['vehicule_id']?>"><img src="<?php echo $GLOBALS['base-url'].'Images/vehicules/'.$vehic['chemin'];?>" alt=""></a></th>
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

    public function showTopComparaisonsView(){
        
    }

    public function showVehiculeTopComparView(){

    }

    public function showComparateurView(){
        $this->showComparFormsView(NULL,NULL,NULL,NULL);
    }

}

?>