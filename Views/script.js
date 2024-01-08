
            var selectedMarque;
            var selectedModele;
            var selectedVersion;

            function getModeles(formIndex) { 
                selectedMarque = document.getElementById("marque" + formIndex).value
                $.ajax({
                    type: 'POST',
                    url: 'router.php',
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
                    url: 'router.php',
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
                    url : 'router.php',
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

            function getVehicule(formIndex , event){   
                event.preventDefault();
                selectedVersion = $("#version" + formIndex).val();
                selectedAnnee = $("#annee" + formIndex).val();
                

                    $.ajax({
                        type: 'POST',
                        url : 'router.php',
                        data: {
                            vehic : "vehic",
                            version : selectedVersion,
                            annee : selectedAnnee
                         },
                        success: function(data){
                            try {
                                var vehic = JSON.parse(data);
                                 $("#form" + formIndex).css("display", "none");
                                var container = $("#form-container-" + formIndex );
                              
    
                                var cardHtml = '<div class="card">';
                                cardHtml += '<p id="vehic_id'+formIndex+'" style="display:none">'+vehic.vehicule_id+'</p>'
                                cardHtml += '<img src="Images/vehicules/' + vehic.chemin + '">';
                                cardHtml += '<div class="card-body">';
                                cardHtml += '<h5 class="card-title">' + vehic.vehicule_nom + '</h5>';
                                cardHtml += '</div></div>';

                                container.append(cardHtml);
                               
                            } catch (error) {
                                console.log("Error parsing JSON:", error);
                            }
                            
                        }
                    });
                
            }

            function submitAllForms() {
                var allFormData = [];
                for (var i = 1; i <= 4; i++) {
                    var formData = {
                        vehic_id: $("#vehic_id"+i).text()
                    };
                    console.log(formData);
            
                    allFormData.push(formData);
                }
                
                    $.ajax({
                        type: 'POST',
                        url : 'router.php',
                        data: {formData : allFormData},
                        success: function(data){
                            try {
                                console.log(data);
                               
                            } catch (error) {
                                console.log("Error parsing JSON:", error);
                            }
                            
                        }
                    });

            }
