<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\marqueView.php");

class adminHomeView{

   public function showBreadcrumb(){?>
         
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pictures</a></li>
            <li><a href="#">Summer 15</a></li>
            <li>Italy</li>
        </ul>

   <?php }

   
   public function showHome(){
      require_once("header.php");
      $this->showBreadcrumb();
      require_once("footer.php");
   }
}


?>