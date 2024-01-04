<?php

require_once "C:\wamp64\www\Comparateur-Vehicule\Models\imageModel.php";

class imageController{


    private $model;
    
    
    private function checkImage($image,$target_dir){
        
        $target_file = $target_dir . (isset($image["image"]["name"]) ? basename($image["image"]["name"]) : '');
        $uploadOk = 1;

      
      // Check if file already exists
      if (file_exists($target_file)) {
        $error = "Sorry, file already exists.";
        $uploadOk = 0;
      }
          
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 1){
        if (move_uploaded_file($image["image"]["tmp_name"], $target_file)) {
          $error = "The file ". htmlspecialchars( basename( $image["image"]["name"])). " has been uploaded.";
        } else {
          $error = "Sorry, there was an error uploading your file.";
        }
      }

      return [$uploadOk , $error];
    }

    public function createImageController($image,$directory,$params){
  
      [$valid,$error]=$this->checkImage($image,$directory);

        if ($valid) {
          $this->model = new imageModel();
           return  $this->model-> createImageModel($params); 
        }else{
            return $error;
        }  
    }

    public function getImageController($id){
  
      $params=array(
        1 => $id
     );
     $this->model = new imageModel();
     $chemin = $this->model->getImageModel($params);
    
     return $chemin['chemin'];
    }

}


?>