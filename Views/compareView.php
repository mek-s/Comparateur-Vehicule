<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\compareController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\marqueController.php";


class compareView{

    private $controller;


    public function showModeles($modeles){
            foreach ($modeles as $modele) {
             echo '<option value="'.$modele['modele_id'].'">'.$modele['modele_nom'].'</option>';
            }
    }

    public function showMarques($marques){
        foreach ($marques as $marque) {
            echo '<option value="'.$marque['marque_id'].'">'.$marque['marque_nom'].'</option>';
        }
    }
              
            
    
    public function showComparFormsView(){
       $this->controller = new marqueController();
       $marques = $this->controller->getMarquesController();?>
       
       <div class="compar-forms">
       <script type="text/javascript" src="<?php echo $GLOBALS['base-url'];?>Views/jquery-3.6.0.js"></script>
        <script>
            var selectedMarque;
            var selectedModele;
            var selectedVersion;

            function getModeles(formIndex) { 
                selectedMarque = document.getElementById("marque" + formIndex).value
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {marqueId : selectedMarque},
                    success: function(data){
                        
                        try {
                            var models = JSON.parse(data);
                            
                            var modeleSelect = $("#modele" + formIndex);
                            modeleSelect.empty();
                            modeleSelect.append('<option value="default">Modele</option>');
                            $.each(models, function(index, model) {
                                modeleSelect.append('<option value="' + model['modele_id'] + '">' + model['modele_nom'] + '</option>');
                            });
                           
                        } catch (error) {
                            console.log("Error parsing JSON:", error);
                        }
                        
                    }
                });
            } 

            function getVersions(formIndex) { 
                selectedModele = document.getElementById("modele" + formIndex).value;
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: {modeleId : selectedModele},
                    success: function(data){
                        try {
                            var versions = JSON.parse(data);
                            var versionSelect = $("#version" + formIndex);
                            versionSelect.empty();
                            versionSelect.append('<option value="default">Version</option>');
                            $.each(versions, function(index, version) {
                                versionSelect.append('<option value="' + version['version_id'] + '">' + version['version_nom'] + '</option>');
                            });
                           
                        } catch (error) {
                            console.log("Error parsing JSON:", error);
                        }
                        
                    }
                });
            } 

            function getAnnees(formIndex){ 
                selectedVersion = document.getElementById("version" + formIndex).value;
                $.ajax({
                    type: 'POST',
                    url : 'index.php',
                    data: {versionId : selectedVersion},
                    success: function(data){
                        try {
        
                            var version = JSON.parse(data);
                            var anneeSelect = $("#annee" + formIndex);
                            anneeSelect.empty();
                            anneeSelect.append('<option value="default">Annee</option>');
                            var startDate = version['date_debut'];
                            var endDate = version['date_fin'];
                        
                            while (startDate <= endDate) {
                                anneeSelect.append('<option value="' + startDate + '">' + startDate + '</option>');
                                startDate++;
                            }
                           
                        } catch (error) {
                            console.log("Error parsing JSON:", error);
                        }
                        
                    }
                });
            } 

            function submitAllForms() {
                for (var i = 1; i <= 4; i++) {
                    
                    var formData = {
                        marque: $("#marque" + i).val(),
                        modele: $("#modele" + i).val(),
                        version: $("#version" + i).val(),
                        annee: $("#annee" + i).val()
                    }

                    
                    console.log("Form " + i + " data:", formData);
                }

            }
                
        </script>
    
       <?php for ($i=1; $i <= 4  ; $i++) { ?>
        <form id="form<?php echo $i;?>" action="">
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
        </form>
       <?php } ?>
         <button onclick="submitAllForms()">Compare All</button>
       </div>
      <?php 
    }

    public function showComparResult(){

    }

    public function showTopComparaisonsView(){
    }

    public function showVehiculeTopComparView(){

    }

    public function showComparateurView(){
        $this->showComparFormsView();
    }

}

?>