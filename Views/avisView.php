<?php

require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\usersController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\utilities\dataTable.php";

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
    
          <div class="avis-table">

          <?php
                 $columns = array( 1 => 'Nom utilisateur',
                                   2 => 'Nom Vehicule',
                                   3 => 'Commentaire',
                                   4 => 'Status');
                 $items = array();

                 foreach($avis as $av) {
                  $item = [
                    'param1' => $av['user_nom'].' '.$av['user_prenom'], 
                    'param2' => $av['vehicule_nom'], 
                    'param3' => $av['commentaire'],
                    'param4' => $av['status'],
                    'actions' => [
                      ['type' => 'form', 'hidden_name' => 'avis_id', 'hidden_value' => $av['avis_id'], 'button_name' => 'valid_avis', 'button_text' => 'Valider'],
                      ['type' => 'form', 'hidden_name' => 'avis_id', 'hidden_value' => $av['avis_id'], 'button_name' => 'refus_avis', 'button_text' => 'Refuser'],
                      ['type' => 'form', 'hidden_name' => 'user_id', 'hidden_value' => $av['user_id'], 'button_name' => 'block_user', 'button_text' => 'Bloquer utilisateur'],
                  ]];
                  $items[] = $item;
                 }
                
                 $table = new dataTable($columns,$items,3);
                 $table->render();
                ?>
         
            
          </div>
    
      
        <?php 
    }
}




?>