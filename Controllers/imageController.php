<?php

require_once "C:\wamp64\www\Comparateur-Vehicule\Model\imageModel.php";

class imageController{


    private $model;

    
    private function checkImage($image){
        $target_dir = "Images/";

        $target_file = $target_dir . basename($image["image"]["name"]);
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      // Check if file already exists
      if (file_exists($target_file)) {
        $error = "Sorry, file already exists.";
        $uploadOk = 0;
      }
            
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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

    public function createImageController($image,$params){
        [$valid,$error]=$this->checkImage($image);
        if ($valid) {
            $this->model = new imageModel();
            $this->model-> createImageModel($params);
            return 'done';
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