<?php
require_once('bdd.php');


class imageModel{
    private $db;

    public function __construct(){
        $this->db = new bdd();
    }


    public function createImageModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `images`(`chemin`) VALUES (?)";
        $id =$this->db->request($cnx,$query,$params,true);
    
        $this->db->disconnect($cnx);
        return $id;
    }

    public function getImageModel($params){
        $cnx=$this->db->connect();
        
        $query = "SELECT chemin FROM images WHERE image_id = ?";
        $chemin = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $chemin[0];
    }
}

?>