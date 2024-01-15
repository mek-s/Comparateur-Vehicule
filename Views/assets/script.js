
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

            
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

        

            function validateForm() {
                var filledForms = 0;
                var selectedData = [];
        
                for (var i = 1; i <= 4; i++) {
                    var version = document.getElementsByName('vehicles[' + i + '][version]')[0].value;
                    var annee = document.getElementsByName('vehicles[' + i + '][annee]')[0].value;
        
                    // Check if both version and annee are not the default values
                    if (version !== 'default' && annee !== 'default') {
                        var formData = version + '-' + annee;
        
                        // Check if the selected data is distinct
                        if (!selectedData.includes(formData)) {
                            selectedData.push(formData);
                            filledForms++;
                        }
                    }
                }
        
                
                if (filledForms >= 2) {
                    return true; 
                } else {
                    alert('Il faut remplier au moins deux formulaire distincts .');
                    return false; 
                }
            }

