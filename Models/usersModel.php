<?php
require_once('bdd.php');

class usersModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    // creer un utilisateur
    public function createUserModel($params){
       
        $cnx=$this->db->connect();

        $query = "INSERT INTO `users` (`user_nom`, `user_prenom`,`email`, `sexe`, `date_naissance`,`mdp` , `image_id`) VALUES (?,?,?,?,?,?,?)";
        $id = $this->db->request($cnx,$query,$params,true);
    
        $this->db->disconnect($cnx);
        return $id;
        
    }

    // bloquer un utilisateur 
    public function blockUserModel($params){
       
        $cnx=$this->db->connect();

        $query = "UPDATE `users` SET `status` = 'bloque' WHERE `user_id` = ?";
        $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);
    }

    // valider l'inscription d'un utilisateur 
    public function validateUsersModel($params){
       
        $cnx=$this->db->connect();

        $query = "UPDATE `users` SET `status` = 'confirme' WHERE `user_id` = ?";
        $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);
    }

    // authentifie un utilisateur
    public function authenticateUserModel($params){
       
        $cnx=$this->db->connect();
        
        $query= "SELECT user_id FROM users WHERE email = ? AND mdp= ? AND status = 'confirme' ";
        $result=$this->db->request($cnx,$query,$params,false);
           
        $this->db->disconnect($cnx);
        if ($result) {
            return $result[0]['user_id'];
        } else return $result;
        
    }

    // authentifie un admin
    public function authenticateAdminModel($params){
       
        $cnx=$this->db->connect();
        
        $query= "SELECT username FROM admins WHERE username = ? AND pwd= ?";
        $result=$this->db->request($cnx,$query,$params,false);

        $this->db->disconnect($cnx);
        if ($result) {
            return $result[0]['username'];
        } else return $result;
    }

    // recuperer tous les utilisateurs 
    public function getAllUsersModel($params){
       
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `users`";
        $users= $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);
        return $users;

    }

    // recuperer un utilisateur par id 
    public function getUserModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `users` u JOIN `images` i ON i.image_id = u.image_id WHERE user_id = ?";
        $user= $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);
        return $user[0];
    }

    // recuperer les vehicules favoris d'un utilisateur
    public function getUserVehiculesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT vv.* , i.chemin FROM `images` i JOIN (SELECT v.* , f.user_id FROM `vehicules` v JOIN (SELECT f.user_id , f.vehicule_id FROM `favoris_vehicules` f JOIN (SELECT user_id FROM `users` WHERE user_id = ?) u ON u.user_id = f.user_id) f ON v.vehicule_id = f.vehicule_id ) vv ON vv.image_id = i.image_id;";
        $vehics= $this->db->request($cnx,$query,$params,false);  

        $this->db->disconnect($cnx);
        return $vehics;
    }

  
}

?>