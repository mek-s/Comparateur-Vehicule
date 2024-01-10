<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\marqueView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\compareView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Controllers\userHomeController.php");

class homeView{

   public function showContactPage(){
    require_once("header.php");
      $this->showMenu();
      $controller = new userHomeController();
      $contacts = $controller->getContactsController();
    ?>
      <div class="container">
      <div class="content">
        <div class="left-side">
          <?php foreach ($contacts as $contact) {?>
            <div class="<?php echo $contact['contact_nom']?> details">
              <img src="<?php echo $GLOBALS['base-url'].'Images/contacts/'.$contact['chemin'];?>">
              <div class="topic"><?php echo $contact['contact_nom']?></div>
              <div class="text-one"><?php echo $contact['value']?></div>
            </div>
         <?php } ?>
          </div>
        <div class="right-side">
          <div class="topic-text">Envoyer nous un message</div>
          <p>Si vous avez  tout type de requêtes liées à notre site, vous pouvez nous envoyer un message à partir d'ici. C'est avec plaisir que nous vous aide.</p>
          <form action="#">
            <div class="input-box">
              <input type="text" placeholder="Entrer votre nom" />
            </div>
            <div class="input-box">
              <input type="text" placeholder="Entrer votre email" />
            </div>
            <div class="input-box message-box">
              <textarea placeholder="Entrer votre message"></textarea>
            </div>
            <div class="button">
              <input type="button" value="Envoyer le message" />
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php 
  require_once("footer.php");
  
}

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