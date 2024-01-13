<?php
require_once('bdd.php');


class homeModel{
    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    // public function getDiaporama(){
    //     $cnx=$this->db->connect();

    //     $query = "SELECT FROM `` "
    //     $images =$this->db->request($cnx,$query,$params,false);
    
    //     $this->db->disconnect($cnx);
    //     return $images;
    // }

}
?>