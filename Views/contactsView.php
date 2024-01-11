<?php 
require_once("C:\wamp64\www\Comparateur-Vehicule\Views\userViews\homeView.php");
require_once("C:\wamp64\www\Comparateur-Vehicule\Controllers\adminHomeController.php");

class contactsView{


    private $controller;

    public function showContactPage(){
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
       
    }

    public function showContactsView($contacts){
            if (isset($_POST['mdf_contact'])) {
                $this->controller= new newsController();
                $this->controller->updateContactController(array(1=> $_POST['contact_id']));
              } 
              if (isset($_POST['supp_contact'])) {
                $this->controller= new newsController();
                $this->controller->deleteContactController(array(1=> $_POST['contact_id']));
              } 
              
              ?>
            
    
          <div class="">
            <h1>Gestion des Contacts</h1>
            <a class="button" href="/Comparateur-Vehicule/admin/parametres/contacts/new" ><i class="fa fa-plus-circle"></i> Ajouter un contact</a>
          </div>
        
            <div class="news-table">
                    
                    <table id="myTable" class="table table-striped" style="width:100%">
                           <thead>
                               <tr>
                                   <th scope="col">Nom</th>
                                   <th scope="col">Valeur</th>
                                   <th scope="col"></th>
                                   <th scope="col"></th>
             
                                   
                               </tr>
                           </thead>
                             
                           <tbody>
                               <?php  foreach($contacts as $contact) { ?>
                                      
                                       <tr>
                                           <td><?php echo $contact['contact_nom']; ?></td>
                                           <td><?php echo $contact['value']; ?></td>
                                           <td>
                                               <form method="POST">
                                                   <input type="hidden" name="contact_id" value="<?php echo $contact['contact_id'];?>">
                                                   <button type="submit" name="mdf_contact" >Modifier</button>
                                               </form>
                                           </td>
                                           <td>
                                               <form method="POST">
                                                   <input type="hidden" name="contact_id" value="<?php echo $contact['contact_id'];?>">
                                                   <button type="submit" name="supp_contact" >Supprimer</button>
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

    public function showContactsFormView(){
            if (isset($_POST['create_contact'])) {
    
                // inserer l'imeg du vehicule
                $this->controller = new imageController();
                $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
                $dir = 'Images/contacts/';
                
                $imgId = $this->controller->createImageController($_FILES,$dir,$params);
                
                  // inserer le vehicule
                  $this->controller = new adminHomeController();
                    $params = array(
                      1   => $_POST['nom'],
                      2   => $_POST['value'],
                      3   => $imgId
                    );
                  $this->controller->createContactController($params);  
              } ?>

              <h1>Ajouter un contact</h1>
              <form method="POST" enctype="multipart/form-data" >
                <div class="input">
                  <label>Nom</label>
                  <input type="text" name="nom" required>
                </div>
          
                <div class="input">
                  <label>La valeur</label>
                  <input type="text" name="value" required>
                </div>
                <div class="input">
                  <label>Image du contact</label>
                  <input type="file" name="image" id="image" >
                </div> 
                
          
                <input type="submit" name="create_contact" value="Enregistrer">
              </form>
            <?php 
            
        
    }
}

?>