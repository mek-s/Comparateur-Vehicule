<?php

require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\usersController.php";

class avisView{

    private $controller;

    public function showAvisTableView($avis){
        if (isset($_POST['valid_avis'])) {
            $this->controller= new avisController();
            $this->controller->validateAvisController(array(1=> $_POST['avis_id']));
        }
        if (isset($_POST['refus_avis'])) {
            $this->controller= new avisController();
            $this->controller->refuseAvisController(array(1=> $_POST['avis_id']));
        }
        if (isset($_POST[''])) {
            $this->controller= new usersController();
            $this->controller->blockUserController(array(1=> $_POST['user_id']));
        }
          ?>
          
          <div class="">
            <h1>Gestion des Avis</h1>
          </div>
    
          <div class="vehic-table">
            
           <table id="myTable" class="table table-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th scope="col">Nom utilisateur</th>
                          <th scope="col">Nom Vehicule</th>
                          <th scope="col">Commentaire</th>
                          <th scope="col">Status</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
    
                          
                      </tr>
                  </thead>
                    
                  <tbody>
                      <?php  foreach($avis as $av) { ?>
                             
                              <tr>
                                  <td><?php echo $av['user_nom'].' '.$av['user_prenom']; ?></td>
                                  <td><?php echo $av['vehicule_nom']; ?></td>
                                  <td><?php echo $av['commentaire']; ?></td>
                                  <td><?php echo $av['status']; ?></td>
                                  <td>
                                      <form method="POST">
                                          <input type="hidden" name="avis_id" value="<?php echo $av['avis_id'];?>">
                                          <button type="submit" name="valid_avis" >Valider</button>
                                      </form>
                                  </td>
                                  <td>
                                      <form method="POST">
                                          <input type="hidden" name="avis_id" value="<?php echo $av['avis_id'];?>">
                                          <button type="submit" name="refus_avis" >Refuser</button>
                                      </form>
                                  </td>
                                  
                                  
                                  <td>
                                      <form method="POST">
                                          <input type="hidden" name="user_id" value="<?php echo $av['user_id'];?>">
                                          <button type="submit" name="block_user" >Bloquer utilisateur</button>
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
}




?>