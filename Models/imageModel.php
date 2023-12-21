<?php
require_once('bdd.php');


class imageModel{
    private $db;

    public function createImageModel($params){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        $query = "INSERT INTO `images`(`chemin`) VALUES (?)";
        $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

    }

    public function getImageModel($params){
        $this->db = new bdd();
        $cnx=$this->db->connect();
        
        $query = "SELECT chemin FROM images WHERE image_id = ?";
        $chemin = $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

        return $chemin[0];
    }
}

?>