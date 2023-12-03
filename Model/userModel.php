<?php
require_once('bdd.php');

class userModel{

    private $db;

    public function createUserModel($nom,$prenom,$sexe,$date,$status,$mdp){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        $query = "INSERT INTO `users` (`user_nom`, `user_prenom`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES (?,?,?,?,?,?)";
        $params = array($nom,$prenom,$sexe,$date,$status,$mdp);
        $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);
        
    }

    public function blockUserModel($id){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        $query = "UPDATE `users` SET `status` = 'bloque' WHERE `user_id` = ?";
        $params = array($id);
        $this->db->request($cnx,$query);  

        $this->db->disconnect($cnx);
    }

    public function confirmUserModel($id){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        $query = "UPDATE `users` SET `status` = 'confirme' WHERE `user_id` = ?";
        $params = array($id);
        $this->db->request($cnx,$query,$params);  

        $this->db->disconnect($cnx);
    }

    public function authenticateUserModel($nom , $mdp){
        $this->db = new bdd();
        $cnx=$this->db->connect();
        
        $query= "SELECT user_id FROM users WHERE user_nom = ? AND mdp= ?";
        $params = array($nom,$mdp);
        $result=$this->db->request($cnx,$query,$params);
  
        if ($count($result) > 0){
            return true;
        } else return false; 
           
        $this->db->disconnect($cnx);
    }

    public function getAllUsersModel(){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `users`";
        $params=array();
        return $this->db->request($cnx,$query,$params);  

        $this->db->disconnect($cnx);

    }

  
}

?>