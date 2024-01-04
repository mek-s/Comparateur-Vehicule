<?php
require_once('bdd.php');

class marqueModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }


    public function createMarqueModel($params){
        $cnx=$this->db->connect();

        //$query = "INSERT INTO `marques`(`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `image_id`, `guide_id`) VALUES (?,?,?,?,?,?)";
        $query = "INSERT INTO `marques`(`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`) VALUES (?,?,?,?)";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

    }

    // Recuperer les marques principales
    public function getMarquesPrincipalesModel(){
       
        $cnx=$this->db->connect();
        $params=array();

        $query = "SELECT * FROM marques NATURAL JOIN images WHERE principale = 1 AND supp = 0";
        $principales = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $principales;
    }

    // Recuperer toutes les marques
    public function getMarquesModel($params){
      
        $cnx=$this->db->connect();
        
        $query = "SELECT * FROM marques NATURAL JOIN images WHERE supp = 0";
        $marques = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $marques;
    }

    // Recuperer une marque
    public function getMarqueModel($params){
       
        $cnx=$this->db->connect();

        $query = "SELECT * FROM marques NATURAL JOIN images WHERE supp = 0 AND marque_id=?";
        $marque = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $marque[0];
    }

    // recuperer la note d'une marque
    public function getMarqueNoteModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT ROUND(AVG(n.note),1) AS NoteMoy FROM ( SELECT n.note FROM `note_marques` n WHERE n.marque_id = ? ) n";
        $note=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $note[0];
    }

    // recuperer les modeles d'un marques
    public function getModelesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `modeles` WHERE supp = 0 AND marque_id =?";
        $modeles=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $modeles;
    }
}


?>