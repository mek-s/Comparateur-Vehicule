<?php
require_once('bdd.php');


class imageModel{
    private $db;

    public function __construct(){
        $this->db = new bdd();
    }


    // creer une image
    public function createImageModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `images`(`chemin`) VALUES (?)";
        $id =$this->db->request($cnx,$query,$params,true);
    
        $this->db->disconnect($cnx);
        return $id;
    }

}

?>