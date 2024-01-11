<?php
require_once('bdd.php');

class newsModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    public function createNewsModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `news` (`title`, `descprition`, `subtitle`, `supp`) VALUES (?,?,?, 0) ";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    public function deleteNewsModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `news` SET `supp` = 1 WHERE `news_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    public function getAllNewsModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `news` WHERE supp=0 ";
        $news= $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $news;
    }
}

?>