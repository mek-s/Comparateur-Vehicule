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
				<a href="/Comparateur-Vehicule/admin/parametres">
					<img src="<?php echo $GLOBALS['base-url'];?>Images/admin/settings.png" alt="vehicules" width="273" height="168">
					<p>Gestion des parametres</p>
				</a>
			</div>
         
   <?php }

   
   public function showHome(){
      require_once("header.php");
      $this->showMain();
      require_once("footer.php");
   }
}


?>