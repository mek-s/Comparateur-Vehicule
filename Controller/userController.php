<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Model\userModel.php";
require_once "C:\wamp64\www\Comparateur-Vehicule\View\userView.php";

class userController{

    public function createUserController($nom,$prenom,$sexe,$date,$status,$mdp){
     
        $user = new userModel();

        $result=$user->createUserModel($nom,$prenom,$sexe,$date,$status,$mdp);
        
    }

}
?>