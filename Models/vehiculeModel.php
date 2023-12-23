<?php
require_once('bdd.php');

class vehiculeModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }


    public function addVehiculeModel($params){
        
        $cnx=$this->db->connect();

        //$query = 'INSERT INTO `vehicules` (`vehicule_nom`, `type`, `marque_id`, `modele`, `version`, `annee`, `longueur`, `largeur`, `hauteur`, `moteur`, `consomation`, `performance`, `image_id`, `guide_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $query = 'INSERT INTO `vehicules` (`vehicule_nom`, `type`, `marque_id`) VALUES (?,?,?)';
        $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);
    }

    public function getPrincipalesVehiculesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.vehicule_id FROM `images` i JOIN( SELECT vh.image_id , vh.vehicule_id FROM `vehicules` vh JOIN( SELECT v.version_id FROM `versions` v JOIN ( SELECT md.modele_id FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (mr.marque_id= ? AND md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.supp=0 AND vh.principal=1 ) veh ON veh.image_id=i.image_id LIMIT 4";
        $vehicules =$this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }

    public function getVehiculeCracteristiques($params){
        $cnx=$this->db->connect();

        $query = "SELECT value,carac_nom FROM `carac_vehicule` NATURAL JOIN `vehicules` NATURAL JOIN `caracteristiques` WHERE vehicule_id= ?";
        $caracs=$this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);
        return $caracs;
    }

    public function getMarquesVehiculesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.* FROM `images` i JOIN( SELECT vh.* , v.version_nom , v.modele_nom FROM `vehicules` vh JOIN( SELECT v.* , m.modele_nom FROM `versions` v JOIN ( SELECT md.* ,mr.marque_nom FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (mr.marque_id= ? AND md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.supp=0 ) veh ON veh.image_id=i.image_id";
        $vehicules = $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }
}



?>