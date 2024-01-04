<?php
require_once('bdd.php');

class userModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }


    public function createUserModel($params){
       
        $cnx=$this->db->connect();

        $query = "INSERT INTO `users` (`user_nom`, `user_prenom`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES (?,?,?,?,?,?)";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        
    }

    public function blockUserModel($id){
       
        $cnx=$this->db->connect();

        $query = "UPDATE `users` SET `status` = 'bloque' WHERE `user_id` = ?";
        $params = array($id);
        $this->db->request($cnx,$query);  

        $this->db->disconnect($cnx);
    }

    public function confirmUserModel($id){
       
        $cnx=$this->db->connect();

        $query = "UPDATE `users` SET `status` = 'confirme' WHERE `user_id` = ?";
        $params = array($id);
        $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);
    }

    public function authenticateUserModel($nom , $mdp){
       
        $cnx=$this->db->connect();
        
        $query= "SELECT user_id FROM users WHERE user_nom = ? AND mdp= ?";
        $params = array($nom,$mdp);
        $result=$this->db->request($cnx,$query,$params,false);
  
        if ($count($result) > 0){
            return true;
        } else return false; 
           
        $this->db->disconnect($cnx);
    }

    public function getAllUsersModel(){
       
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `users`";
        $params=array();
        return $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);

    }

  
}

?>