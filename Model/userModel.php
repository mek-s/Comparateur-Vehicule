<?php
require_once('bdd.php');
require_once "C:\wamp64\www\Comparateur-Vehicule\Controller\userController.php";

class userModel{

    private $db;

    public function createUserModel($nom,$prenom,$sexe,$date,$status,$mdp){
        $this->db = new bdd();
        $cnx=$this->db->connect();
        $query = "INSERT INTO `users` (`user_id`, `user_nom`, `user_prenom`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES (NULL,'$nom','$prenom','$sexe','$date','$status','$mdp')";
        $this->db->request($cnx,$query);
        

        $this->db->disconnect($cnx);
        
    }

}

?>