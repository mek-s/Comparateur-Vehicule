<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\usersController.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\Views\utilities\dataTable.php";

class usersView{
     
    private $controller;


  

    public function showUsersTableView($users){
      if (isset($_POST['user_profil'])) {
        $this->controller= new usersController();
        $this->controller->showProfilController(array(1=> $_POST['user_id']));
      } 
      if (isset($_POST['valid_user'])) {
        $this->controller= new usersController();
        $this->controller->validateUserController(array(1=> $_POST['user_id']));
      } 
      
      ?>

       <div class="users-table">

       <?php
                 $columns = array( 1 => 'Nom utilisateur',
                                   2 => 'Email',
                                   3 => 'Status' );
                 $items = array();

                 foreach($users as $user) {
                  $item = [
                    'param1' => $user['user_nom'].' '.$user['user_prenom'], 
                    'param2' => $user['email'], 
                    'param3' => $user['status'],
                    'actions' => [
                      ['type' => 'link', 'href' => '/Comparateur-Vehicule/profil?user='.$user['user_id'], 'class' => 'btn btn-warning rounded-pill', 'text' => 'Voir profil'],
                      ['type' => 'form', 'hidden_name' => 'user_id', 'hidden_value' => $user['user_id'], 'button_name' => 'valid_user', 'button_text' => 'Valider inscription'],
                  ]];
                  $items[] = $item;
                 }
                
                 $table = new dataTable($columns,$items,2);
                 $table->render();
                ?>
            
           </div>
      <?php
    }

    public function showSigninFormView(){
      $this->controller = new usersController();

      if (isset($_POST['auth-user'])) {
        
        $params = array( 1 => $_POST['nom'], 2 => $_POST['mdp']);
        if ($this->controller->authenticateUserController($params)) {
          echo '<h1>Authenticated</h1>';
        } else echo '<h1>Username ou mot de passe incorecte</h1>';
      } ?>
      <form method="POST">
        <input type="text" name="nom" required>
        <input type="password" name="mdp" required>
        <input type="submit" name="auth-user"value="Login">
      </form>
     <?php
    }

    public function showSignupFormView(){

    }
    
}

?>