<?php

class contactsModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    public function getContactsModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `contacts` c JOIN `images` i ON i.image_id = c.image_id WHERE c.supp = 0";
        $contacts =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $contacts;
    }

    public function getContactModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `contacts` c JOIN `images` i ON i.image_id = c.image_id WHERE c.supp = 0 AND c.contact_id = ? ";
        $contact =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $contact[0];
    }

    public function createContactModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `contacts` (`contact_nom`,`value`,`image_id`) VALUES (?,?,?)";
        $contacts =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    public function modifContactModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `contacts` SET `contact_nom` = ? , `value` = ? , image_id = ? WHERE `contacts`.`contact_id` = ?";
        $contacts =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    public function deleteContactModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `contacts` SET `supp` = 1 WHERE `contact_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }
}

?>