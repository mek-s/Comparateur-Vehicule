<?php
require_once('bdd.php');

class marqueModel{

    private $db;

    public function createMarqueModel($params){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        //$query = "INSERT INTO `marques`(`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `image_id`, `guide_id`) VALUES (?,?,?,?,?,?)";
        $query = "INSERT INTO `marques`(`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`) VALUES (?,?,?,?)";
        $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

    }
}


?>