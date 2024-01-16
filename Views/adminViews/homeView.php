<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\marqueView.php");

class adminHomeView{


   // afficher les 5 images de categories
    public function showMain(){ ?>
      <div class="categories">
         <div class="col">
				<a href="/Comparateur-Vehicule/admin/marques">
					<img src="<?php echo $GLOBALS['base-url'];?>Images/admin/cars.png" alt="marques" width="273" height="168">
					<p>Gestion des marques</p>
				</a>
			</div>
         <div class="col">
				<a href="/Comparateur-Vehicule/admin/avis">
					<img src="<?php echo $GLOBALS['base-url'];?>Images/admin/avis.png" alt="vehicules" width="273" height="168">
					<p>Gestion des avis</p>
				</a>
			</div>
         <div class="col">
				<a href="/Comparateur-Vehicule/admin/news">
					<img src="<?php echo $GLOBALS['base-url'];?>Images/admin/news.png" alt="vehicules" width="273" height="168">
					<p>Gestion des news</p>
				</a>
			</div>
         <div class="col">
				<a href="/Comparateur-Vehicule/admin/users">
					<img src="<?php echo $GLOBALS['base-url'];?>Images/admin/users.png" alt="vehicules" width="273" height="168">
					<p>Gestion des utilisateurs</p>
				</a>
			</div>
         <div class="col">
				<a href="/Comparateur-Vehicule/admin/parametres/contacts">
					<img src="<?php echo $GLOBALS['base-url'];?>Images/admin/settings.png" alt="vehicules" width="273" height="168">
					<p>Gestion des parametres</p>
				</a>
			</div><?php 
			
	}
	
	//afficher la page principale de l'admin
   public function showHome(){
      require_once("header.php");
      $this->showMain();
      require_once("footer.php");
   }
}


?>