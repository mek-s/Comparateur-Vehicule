<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\imageController.php";


class imageView{

    private $controller;

    public function createImageView(){
      $this->controller = new imageController();
      
        if (isset($_POST['create-image'])) {
            $params=array(
              1 => $_FILES["image"]["name"]
            );
            $result = $this->controller->createImageController($_FILES,$params);
            if ($result != 'done') {
              echo "<p>$result</p>";
            }
            $chemin = $this->controller->getImageController(2);

            echo '<img src="./Images/'.$chemin.'">';
         } 

      ?>
        <form method="POST" enctype="multipart/form-data">
          <input type="file" name="image" id="image" >
          <input type="submit" name="create-image"value="Enregistrer">
        </form>
      <?php  
    } 

}


?>