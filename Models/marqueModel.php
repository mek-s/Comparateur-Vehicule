<?php
require_once('bdd.php');

class marqueModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }


    // creer une marque id 
    public function createMarqueModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `marques`(`marque_nom`, `pays_origine`, `siege_social`, `annee_creation`,`supp`, `principale`, `guide_id`, `image_id`) VALUES (?,?,?,?,0,?,NULL,?)";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

    }

    // modifier une marque id
    public function modifMarqueModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `marques` SET `marque_nom` =  ? , `pays_origine` = ? , `siege_social` = ? , `annee_creation` = ?, `principale` = ? , `image_id` = ? WHERE `marques`.`marque_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    // supprimer une marque id 
    public function deleteMarqueModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `marques` SET `supp` = '1' WHERE `marque_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    // Recuperer les marques principales
    public function getMarquesPrincipalesModel($params){
       
        $cnx=$this->db->connect();
        
        $query = "SELECT * FROM marques NATURAL JOIN images WHERE principale = 1 AND supp = 0";
        $principales = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $principales;
    }

    // Recuperer toutes les marques
    public function getMarquesModel($params){
      
        $cnx=$this->db->connect();
        
        $query = "SELECT * FROM marques NATURAL JOIN images WHERE  supp = 0";
        $marques = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);

        return $marques;
    }

    // Recuperer une marque par id 
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

    // recuperer les modeles d'une marques
    public function getModelesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `modeles` WHERE supp = 0 AND marque_id =?";
        $modeles=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $modeles;
    }

    // recuperer les versions d'un modele
    public function getVersionsModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `versions` WHERE supp = 0 AND modele_id =?";
        $versions=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $versions;
    }

    // recuperer une version par id 
    public function getVersionModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `versions` WHERE supp = 0 AND version_id =?";
        $version=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $version[0];
    }
}


?>