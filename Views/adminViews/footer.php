
<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
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

</script>

<!-- dataTable de ajax -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable(); // Initialize DataTables
    });
</script>
</div>
</body>
</html>