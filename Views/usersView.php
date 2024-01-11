<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controllers\usersController.php";

class usersView{
     
    private $controller;


    public function authenticateUserView(){
      $this->controller = new usersController();

      if (isset($_POST['auth-user'])) {
        $nom=$_POST['nom'];
        $mdp=$_POST['mdp'];
        if ($this->controller->authenticateUserController($nom,$mdp)) {
          echo '<h1>Authenticated</h1>';
        }
      } ?>
      <form method="POST">
        <input type="text" name="nom">
        <input type="password" name="mdp" >
        <input type="submit" name="auth-user"value="Login">
      </form>
     <?php

    } 

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
            
            <table id="myTable" class="table table-striped" style="width:100%">
                   <thead>
                       <tr>
                           <th scope="col">Nom utilisateur</th>
                           <th scope="col">Email</th>
                           <th scope="col">Status</th>
                           <th scope="col"></th>
                           <th scope="col"></th>
     
                           
                       </tr>
                   </thead>
                     
                   <tbody>
                       <?php  foreach($users as $user) { ?>
                              
                               <tr>
                                   <td><?php echo $user['user_nom'].' '.$user['user_prenom']; ?></td>
                                   <td><?php echo $user['email']; ?></td>
                                   <td><?php echo $user['status']; ?></td>
                                   <td>
                                       <form method="POST">
                                           <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>">
                                           <button type="submit" name="user_profil" >Voir profil</button>
                                       </form>
                                   </td>
                                   <td>
                                       <form method="POST">
                                           <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>">
                                           <button type="submit" name="valid_user" >Valider inscription</button>
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