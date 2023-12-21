<?php
require_once('bdd.php');


class homeModel{
    private $db;

    public function getContacts(){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        $params=array();

        $query = "SELECT * FROM `contacts` NATURAL JOIN `images`";
        $contacts = $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);

        return $contacts;
    }

}
?>