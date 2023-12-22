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
}



?>