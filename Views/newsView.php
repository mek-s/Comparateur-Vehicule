<?php
require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\newsController.php';
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\imageController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\utilities\dataTable.php";

class newsView{
     
    private $controller;

    // afficher la page news
    public function showNewsView($news){?>
      <div class="news-container">
       <h1>News</h1>
         <div class="cards-container"><?php
          foreach ($news as $nw) {?>
             <a href="/Comparateur-Vehicule/news/details?news=<?php echo $nw['news_id'];?>" class="news-card">
              <img src="<?php echo $GLOBALS['base-url'].'Images/news/'.$nw['chemin'];?>" alt="">
              <h2><?php echo $nw['title'];?></h3>
              <h3><?php echo $nw['subtitle'];?></h3>
              <span>Published on : <?php echo $nw['date_publication'];?></span>
             </a>
          <?php }?>
        </div>
      </div><?php
    }

    // afficher la page details news
    public function showNewsDeatilsView($news){?>
      <div class="article">
        <h1><?php echo $news['title'] ?></h1>
        <p><strong>Publie en :</strong> <?php echo (new DateTime($news['date_publication']))->format('Y-m-d'); ?></p>
        <img src="<?php echo $GLOBALS['base-url'].'Images/news/'.$news['chemin1'];?>" alt="Land Rover Defender Left Side View">

        <div class="content">
            <h2><?php echo $news['subtitle'];?></h2>
            <p><?php echo $news['description']?></p>
           
            <img src="<?php echo $GLOBALS['base-url'].'Images/news/'.$news['chemin2'];?>" alt="">
          
  
        </div>
     </div> <?php 
    }

   /*********************les vues de l'admin *******************/
    // afficher le tableu de news 
    public function showNewsTableView($news){
        if (isset($_POST['mdf_nws'])) {
            $this->controller= new newsController();
            $this->controller->modifNewsController(array(1=> $_POST['nw_id']));
          } 
          if (isset($_POST['supp_nws'])) {
            $this->controller= new newsController();
            $this->controller->deleteNewsController(array(1=> $_POST['nw_id']));
          } ?>
        

      <div class="">
        <h1>Gestion des News</h1>
        <a class="button" href="/Comparateur-Vehicule/admin/news/new" ><i class="fa fa-plus-circle"></i> Ajouter un news</a>
      </div>
    
        <div class="news-table"><?php
          // initialiser les colonnes du tableau
          $columns = array( 1 => 'Titre',
                            2 => 'Sous titre',
                            3 => 'Description' );
          // initialiser les donnees a afficher dans le tableau
          $items = array();

          foreach($news as $nw) {
          $item = [
            'param1' => $nw['title'], 
            'param2' => $nw['subtitle'] , 
            'param3' =>$nw['description'],
            'actions' => [
              ['type' => 'link', 'href' => '/Comparateur-Vehicule/admin/news/modifier?news='.$nw['news_id'], 'class' => 'btn btn-warning rounded-pill', 'text' => 'Modifier'],
              ['type' => 'form', 'hidden_name' => 'nw_id', 'hidden_value' => $nw['news_id'], 'button_name' => 'supp_nws', 'button_text' => 'Supprimer'],
          ]];
          $items[] = $item;
          }
          // instantier le tableau de donnees pour afficher les vehicules
          $table = new dataTable($columns,$items,2);
          $table->render();?>
                     
      </div> <?php
    }

    // afficher le formulaire de creation de news
    public function showNewsFormView(){
        if (isset($_POST['create_nws'])) {

            // inserer l'imeg du vehicule
            $this->controller = new imageController();
            $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
            $dir = 'Images/news/';
            
            $imgId = $this->controller->createImageController($_FILES,$dir,$params);
            
              // inserer le vehicule
              $this->controller = new newsController();
                $params = array(
                  1   => $_POST['title'],
                  2   => $_POST['subtitle'],
                  3   => $_POST['description']
                );
              $this->controller->createNewsController($params);  
          } ?>
          <h1>Ajouter un news</h1>
          <form method="POST" enctype="multipart/form-data" >
            <div class="input">
              <label>Titre</label>
              <input type="text" name="title" required>
            </div>
      
            <div class="input">
              <label>Le sous titre</label>
              <input type="text" name="subtitle" required>
            </div>
            <div class="input">
              <label>La despcription</label>
              <input type="textarea" name="description" required>
        </div>
            <div class="input">
              <label>Image de la marque</label>
              <input type="file" name="image" id="image" >
            </div> 
            
      
            <input type="submit" name="create_nws" value="Enregistrer">
          </form>
        <?php 
        
    }

    // afficher le formulaire de modification de news
    public function showModifNewsView($news){
      $img1 = $news['image1'];
      $img2 = $news['image2'];
      if (isset($_POST['mdf_nws'])) {

        // // inserer l'imeg du vehicule
        // $this->controller = new imageController();
        // $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
        // $dir = 'Images/news/';
        
        // $imgId = $this->controller->createImageController($_FILES,$dir,$params);
        
          // inserer le vehicule
          $this->controller = new newsController();
            $params = array(
              1   => $_POST['title'],
              2   => $_POST['description'],
              3   => $_POST['subtitle'],
              4   => $img1,
              5   => $img2,
              6   => $news['news_id']
            );
          $this->controller->modifNewsController($params);  

          header('Location: /Comparateur-Vehicule/admin/news');
      } ?>
      <h1>Ajouter un news</h1>
      <form method="POST" enctype="multipart/form-data" >
        <div class="input">
          <label>Titre</label>
          <input type="text" name="title" value="<?php echo $news['title'];?>" required>
        </div>
  
        <div class="input">
          <label>Le sous titre</label>
          <input type="text" name="subtitle"  value="<?php echo $news['subtitle'];?>" required>
        </div>
        <div class="input">
          <label>La description</label>
          <input type="textarea" name="description"value="<?php echo $news['description'];?>" required>
        </div>
        <!-- <div class="input">
          <label>Image de la marque</label>
          <input type="file" name="image" id="image" >
        </div>  -->
        
  
        <input type="submit" name="mdf_nws" value="Enregistrer">
      </form> <?php 
    }

}
?>