<?php
require_once 'C:\wamp64\www\Comparateur-Vehicule\Controllers\newsController.php';
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\imageController.php";

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
                
                <table id="myTable" class="table table-striped" style="width:100%">
                       <thead>
                           <tr>
                               <th scope="col">Titre</th>
                               <th scope="col">Sous titre</th>
                               <th scope="col">Description</th>
                               <th scope="col"></th>
                               <th scope="col"></th>
         
                               
                           </tr>
                       </thead>
                         
                       <tbody>
                           <?php  foreach($news as $nw) { ?>
                                  
                                   <tr>
                                       <td><?php echo $nw['title']; ?></td>
                                       <td><?php echo $nw['subtitle']; ?></td>
                                       <td><?php echo $nw['descprition']; ?></td>
                                       <td>
                                           <form method="POST">
                                               <input type="hidden" name="nw_id" value="<?php echo $nw['news_id'];?>">
                                               <button type="submit" name="mdf_nws" >Modifier</button>
                                           </form>
                                       </td>
                                       <td>
                                           <form method="POST">
                                               <input type="hidden" name="nw_id" value="<?php echo $nw['news_id'];?>">
                                               <button type="submit" name="supp_nws" >Supprimer</button>
                                           </form>
                                       </td>
            
                                   </tr>
                           <?php
                                   }
                           ?>
                       </tbody>
                </table>
                 
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