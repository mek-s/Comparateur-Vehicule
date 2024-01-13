<?php
require_once('bdd.php');

class usersModel{

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

    public function validateUsersModel($params){
       
        $cnx=$this->db->connect();

        $query = "UPDATE `users` SET `status` = 'confirme' WHERE `user_id` = ?";
        $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);
    }

    public function authenticateUserModel($params){
       
        $cnx=$this->db->connect();
        
        $query= "SELECT user_id FROM users WHERE email = ? AND mdp= ?";
        $result=$this->db->request($cnx,$query,$params,false);
           
        $this->db->disconnect($cnx);
        return $result;
    }

    public function authenticateAdminModel($params){
       
        $cnx=$this->db->connect();
        
        $query= "SELECT username FROM admins WHERE username = ? AND pwd= ?";
        $result=$this->db->request($cnx,$query,$params,false);

        $this->db->disconnect($cnx);
        return $result;
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