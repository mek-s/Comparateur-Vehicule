<?php
require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\newsController.php';
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\imageController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\utilities\dataTable.php";

class newsView{
     
    private $controller;

    public function createNewsView(){
    
    }

    public function showNewsTableView($news){
        if (isset($_POST['mdf_nws'])) {
            $this->controller= new newsController();
            $this->controller->updateNewsController(array(1=> $_POST['nw_id']));
          } 
          if (isset($_POST['supp_nws'])) {
            $this->controller= new newsController();
            $this->controller->deleteNewsController(array(1=> $_POST['nw_id']));
          } 
          
          ?>
        

      <div class="">
        <h1>Gestion des News</h1>
        <a class="button" href="/Comparateur-Vehicule/admin/news/new" ><i class="fa fa-plus-circle"></i> Ajouter un news</a>
      </div>
    
        <div class="news-table">
                <?php
                 $columns = array( 1 => 'Titre',
                                   2 => 'Sous titre',
                                   3 => 'Description' );
                 $items = array();

                 foreach($news as $nw) {
                  $item = [
                    'param1' => $nw['title'], 
                    'param2' => $nw['subtitle'] , 
                    'param3' =>$nw['descprition'],
                    'actions' => [
                      ['type' => 'form', 'hidden_name' => 'nw_id', 'hidden_value' => $nw['news_id'], 'button_name' => 'mdf_nws', 'button_text' => 'Modifier'],
                      ['type' => 'form', 'hidden_name' => 'nw_id', 'hidden_value' => $nw['news_id'], 'button_name' => 'supp_nws', 'button_text' => 'Supprimer'],
                  ]];
                  $items[] = $item;
                 }
                
                 $table = new dataTable($columns,$items,2);
                 $table->render();
                ?>
                     
        </div>
     <?php
    }

    public function showNewsFormView(){
        if (isset($_POST['create_nws'])) {

            // inserer l'imeg du vehicule
            $this->controller = new imageController();
            $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
            $dir = 'Images/marques/';
            
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

}
?>