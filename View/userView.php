<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controller\userController.php";

class userView{
     
    private $controller;

    public function createUserView(){
      $this->controller = new userController();
      if (isset($_POST['create-user'])) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $date=$_POST['date'];
        $status='attente';
        $mdp=$_POST['mdp'];
        if ($_POST['sexe']=='F') $sexe='femme';
        else $sexe='homme';
        $controller->createUserController($nom,$prenom,$sexe,$date,$status,$mdp);
      } ?>
      <form method="POST">
        <input type="text" name="nom">
        <input type="text" name="prenom">
        <select name="sexe" id="">
            <option value="F">Feminin</option>
            <option value="M">Masculain</option>
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
}

?>