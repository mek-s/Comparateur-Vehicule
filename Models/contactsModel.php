<?php

class contactsModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    public function getContactsModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `contacts` c JOIN `images` i ON i.image_id = c.image_id";
        $contacts =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $contacts;
    }
}

?>