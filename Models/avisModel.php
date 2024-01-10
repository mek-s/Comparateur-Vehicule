<?php
require_once('bdd.php');

class avisModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    public function createAvisModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `avis` (`user_id`, `vehicule_id`, `marque_id`, `status`, `commentaire`, `supp`) VALUES (??, ?, ?, ?, ?) ";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

    }

    public function getAllAvisModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT av.* ,u.user_id, u.user_nom , u.user_prenom FROM ( SELECT a.*, v.vehicule_id AS v_vehicule_id, v.vehicule_nom FROM `avis` a JOIN ( SELECT vehicule_id, vehicule_nom FROM `vehicules` WHERE supp = 0 ) v ON v.vehicule_id = a.vehicule_id) av JOIN `users` u ON u.user_id = av.user_id";
        $avis = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $avis;
    }


    public function validateAvisModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `avis` SET `status` = 'valide' WHERE `avis_id` = ? ";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

    }

    public function refuseAvisModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `avis` SET `status` = 'refuse' WHERE `avis_id` = ? ";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }


}