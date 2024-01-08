<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\marqueView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\compareView.php");

class homeView{

   public function showMenu(){

         $links = [
            ["name" => "Home", 'link' => ''],
            ["name" => "News", 'link' => 'news'],
            ["name" => "Comparateur", 'link' => 'compare'],
            ["name" => "Marques", 'link' => 'marques'],
            ["name" => "Avis", 'link' => 'avis'],
            ["name" => "Guides", 'link' => 'guides'],
            ["name" => "Contacts", 'link' => 'contact-us']
         ]?>
         <nav>
            <ul>
               <?php foreach ($links as $link) { ?>
                  <li>
                     <a href="/Comparateur-Vehicule/<?php echo $link['link'] ?>"><?php echo $link['name'] ?></a>
                  </li>
               <?php
            }
           echo '</ul></nav>';

   }

   public function showDiaporama(){
    ?>
      <div class="diaporama">
         <img src="<?php echo $GLOBALS['base-url'];?>Images/images.png" alt="">
      </div>
    <?php
   }

   public function showZoneMarques(){?>
      <div class="marques-zone">
         <?php
         $v = new marqueView();
         $v->showMarquesPrincipalesView();
         ?>
      </div><?php
   }

   public function showZoneComparateur(){
      $view = new compareView();
      $view->showComparFormsView();
   }

   public function showZoneComparaisons(){?>
      <div class="comparaisons-zone">
  
      
      </div><?php

   }
   
   public function showHome(){
      require_once("header.php");
      $this->showDiaporama();
      $this->showMenu();
      $this->showZoneMarques();
      $this->showZoneComparateur();
      $this->showZoneComparaisons();
      require_once("footer.php");
   }
}


?>