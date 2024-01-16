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
                      ['type' => 'link', 'href' => '/Comparateur-Vehicule/admin/users/profil?user='.$user['user_id'], 'class' => 'btn btn-warning rounded-pill', 'text' => 'Voir profil'],
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
      <div class="form-container">

      
      <form method="POST">
        <label for="">Nom utilisateur / Email</label>
        <input type="text" name="nom" required>
        <label for="">Mot de passe</label>
        <input type="password" name="mdp" required>
        <input type="submit" name="auth-user"value="Login">
      </form>
      </div>
     <?php
    }

    public function showSignupFormView(){
      $this->controller = new usersController();

      if (isset($_POST['new_user'])) {

        // inserer l'imeg de l'utilisateur
        $this->controller = new imageController();
        $params = array(1 => isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null);
        $dir = 'Images/users/';
        
        $imgId = $this->controller->createImageController($_FILES,$dir,$params);

         
        $params = array( 
          1 => $_POST['nom'], 
          2 => $_POST['prenom'],
          3 => $_POST['email'],
          4 => $_POST['sexe'],
          5 => date('Y-m-d', strtotime($_POST['date'])),
          6 => $_POST['mdp'],
          7 => $imgIdma
        );
        $this->controller->createUserController($params);
      } ?>
      <form method="POST">
        <label for="">Nom</label>
        <input type="text" name="nom" required>

        <label for="">Prenom</label>
        <input type="text" name="prenom" required>

        <label for="">Email</label>
        <input type="text" name="email" required>

        <label for="">Sexe</label>
        <select name="sexe" id="">
          <option value="feminin">Feminin</option>
          <option value="masculin">Masculin</option>
        </select>

        <label for="">Date de naissance</label>
        <input type="date" name="date" required>

        <div class="input">
          <label>Image de la marque</label>
          <input type="file" name="image" id="image" >
        </div> 

        <label for="">Mot de passe</label>
        <input type="password" name="mdp" required>

        <input type="submit" name="new_user"value="Creer utilisateur">
      </form>
     <?php
    }

    public function showUserProfilView($user){?>
      <h1>Profile utilisateur</h1>
      <div class="profile-container">
        <img src="<?php echo $GLOBALS['base-url'].'Images/users/'.$user['chemin'];?>" alt="">
        <p>Nom : <span><?php echo $user['user_nom'];?></span></p>
        <p>Prenom : <span> <?php echo $user['user_prenom'];?></span></p>
        <p>Email : <span> <?php echo $user['email'];?></span></p>
        <p>Sexe : <span> <?php echo $user['sexe'];?></span></p>
        <p>Date de naissance : <span> <?php echo $user['date_naissance'];?></span></p>
        
      </div>

    <?php }
    
}

?>