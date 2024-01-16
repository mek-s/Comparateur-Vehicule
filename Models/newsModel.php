<?php
require_once('bdd.php');

class newsModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    // creer un news
    public function createNewsModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `news` (`title`, `description`, `subtitle`, `supp`) VALUES (?,?,?, 0) ";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    // modifier un news
    public function modifNewsModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `news` SET `title` = ?, `description` = ?, `subtitle` = ? , `image1` = ?, `image2` = ? WHERE `news_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    // supprimer un news
    public function deleteNewsModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `news` SET `supp` = 1 WHERE `news_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    // recuperer tous les news
    public function getAllNewsModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `news` n JOIN `images` i ON i.image_id = n.image1 WHERE n.supp=0 ";
        $news= $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $news;
    }

    // recuperer un news par id 
    public function getNewsByIdModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT n.*, i1.chemin as chemin1 , i2.chemin as chemin2, i3.chemin as chemin3, i4.chemin as chemin4 FROM `news` n LEFT JOIN `images` i1 ON i1.image_id = n.image1 LEFT JOIN `images` i2 ON i2.image_id = n.image2 LEFT JOIN `images` i3 ON i3.image_id = n.image3 LEFT JOIN `images` i4 ON i4.image_id = n.image4 WHERE n.supp=0 AND n.news_id = ? ";
        $news= $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $news[0];
    }
}

?>