<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\compareController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";


class compareView{

    private $controller;


    public function showMarques($marques){
        echo'<option value="default">Marque</option>';
        foreach ($marques as $marque) {
            echo '<option value="'.$marque['marque_id'].'">'.$marque['marque_nom'].'</option>';
        }
    }         
    
    public function showComparFormsView(){
       $this->controller = new marqueController();
       $marques = $this->controller->getMarquesController();?>
       <div class="compare-container">
            <h1>Comparateur les vehicules</h1>
            <div class="compar-forms">
                    <script type="text/javascript" src="<?php echo $GLOBALS['base-url'];?>Views/assets/jquery-3.6.0.js"></script>
                    <script type="text/javascript" src="<?php echo$GLOBALS['base-url'];?>Views/assets/script.js"></script>
                    <?php for ($i=1; $i <= 4  ; $i++) { ?>
                    <div id="form-container-<?php echo $i;?>">
                        <form id="form<?php echo $i;?>">
                            <h3>Selectionner un vehicule</h3>

                                <label>Marque</label>
                                <select name="marque" id="marque<?php echo $i; ?>" onchange="getModeles(<?php echo $i; ?>)">
                                    <?php $this->showMarques($marques); ?>   
                                </select>

                                <label >Modele</label>
                                <select name="modele" id="modele<?php echo $i; ?>" onchange="getVersions(<?php echo $i; ?>)">
                                <option value="default">Modele</option>    
                                </select>

                                <label>Version</label>
                                <select name="version" id="version<?php echo $i; ?>" onchange="getAnnees(<?php echo $i; ?>)">
                                    <option value="default">Version</option>
                                </select>

                                <label>Annee</label>
                                <select name="annee" id="annee<?php echo $i; ?>">
                                    <option value="default">Annee</option>
                                </select>
                                <button onclick="getVehicule(<?php echo $i; ?>,event)">Ajouter</button>
                            </form>
                    </div>
                    
                    <?php } ?>
            </div>
            <button onclick="submitAllForms()">Comparer</button>
            
        </div>
       
      <?php 
    }

    public function showComparResult(){?>
     

        <div class="tab">
             foreach category create a button 
            <button class="tablinks" onclick="openCity(event, 'Dimensions')">Dimensions</button>
            <button class="tablinks" onclick="openCity(event, 'Motor')">Motor</button>
            <button class="tablinks" onclick="openCity(event, 'Autre')">Autre</button>
        </div>
       forech category create a div and table
      <div id="Dimensions" class="tabcontent">
        <h3>Dimensions</h3>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Points</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
            </tr>
        </table>
      </div>
      
      <div id="Motor" class="tabcontent">
        <h3>Motor</h3>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Points</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
            </tr>
        </table>
      </div>
      
      <div id="Autre" class="tabcontent">
        <h3>Autre Specifications</h3>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Points</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>Johnson</td>
                <td>67</td>
            </tr>
        </table>
      </div>

    <?php }

    public function showTopComparaisonsView(){
        
    }

    public function showVehiculeTopComparView(){

    }

    public function showComparateurView(){
        $this->showComparFormsView();
        $this->showComparResult();
    }

}

?>