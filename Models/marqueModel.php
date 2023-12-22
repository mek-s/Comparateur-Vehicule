<?php
require_once('bdd.php');

class marqueModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }


    public function createMarqueModel($params){
        $cnx=$this->db->connect();

        //$query = "INSERT INTO `marques`(`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `image_id`, `guide_id`) VALUES (?,?,?,?,?,?)";
        $query = "INSERT INTO `marques`(`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`) VALUES (?,?,?,?)";
        $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

    }

    public function getMarquesPrincipalesModel(){
       
        $cnx=$this->db->connect();
        $params=array();

        $query = "SELECT * FROM marques NATURAL JOIN images WHERE principale = 1 AND supp = 0";
        $principales = $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

        return $principales;
    }

    public function getMarquesModel(){
      
        $cnx=$this->db->connect();
        $params=array();

        $query = "SELECT * FROM marques NATURAL JOIN images WHERE supp = 0";
        $marques = $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

        return $marques;
    }

    public function getMarqueModel($params){
       
        $cnx=$this->db->connect();

        $query = "SELECT * FROM marques NATURAL JOIN images WHERE supp = 0 AND marque_id=?";
        $marque = $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

        return $marque;
    }
}


?>