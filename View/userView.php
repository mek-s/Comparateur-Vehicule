<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controller\userController.php";

class userView{
     
    private $controller;

    public function createUserView(){
      $this->controller = new userController();
      if (isset($_POST['create-user'])) {
        $params=array(
          1 => $_POST['nom'],
          2 => $_POST['prenom'],
          3 => $_POST['date'],
          4 => 'attente',
          5 => $_POST['mdp'],
          6 => $_POST['sexe']
        );
        $this->controller->createUserController($params);
      } ?>
      <form method="POST">
        <input type="text" name="nom">
        <input type="text" name="prenom">
        <select name="sexe" id="">
            <option value="feminin">Feminin</option>
            <option value="masculin">Masculain</option>
        </select>
        <input type="date" name="date" id="">
        <input type="password" name="mdp" id="">
        <input type="submit" name="create-user"value="Enregistrer">
      </form>
    <?php  
    } 

    public function blockUserView(){
      $this->controller = new userController();
      if (isset($_POST['block-user'])) {
        $id=$_POST['id'];
        $this->controller->blockUserController($id);
      } ?>
      <form method="POST">
        <input type="text" name="id" id="">
        <input type="submit" value="Block" name="block-user">
      </form>
      <?php

    }
    
    public function confirmUserView(){
      $this->controller = new userController();
      if (isset($_POST['confirm-user'])) {
        $id=$_POST['id'];
        $this->controller->confirmUserController($id);
      } ?>
      <form method="POST">
        <input type="text" name="id" id="">
        <input type="submit" value="Confirmer" name="confirm-user">
      </form>
      <?php

    }

    public function authenticateUserView(){
      $this->controller = new userController();
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

    public function showAllUsers(){
      $this->controller = new userController();
      $users =$this->controller->getAllUsersController();
      ?>

       <table>
        <thead>
          <th>Id</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Sexe</th>
          <th>Date</th>
          <th>Status</th>
        </thead>
        <tbody>
          <?php
          foreach ($users as $user) {
            $id = $user['user_id'];
            $nom = $user['user_nom'];
            $prenom =$user['user_prenom'];
            $sexe= $user['sexe'];
            $date = $user['date_naissance'];
            $status= $user['status'];
             echo '<tr>';
             echo '<td>'.$id.'</td>';
             echo '<td>'.$nom.'</td>';
             echo '<td>'.$prenom.'</td>';
             echo '<td>'.$sexe.'</td>';
             echo '<td>'.$date.'</td>';
             echo '<td>'.$status.'</td>';
             echo '</tr>';
          }
          ?>
        </tbody>
       </table>
      <?php
    }

    
}

?>