<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Controller\userController.php";

class userView{
     
    private $controller;

    public function createUserView(){
      $controller = new userController();
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
}

?>