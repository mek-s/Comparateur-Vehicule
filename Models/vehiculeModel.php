<?php
require_once('bdd.php');

class vehiculeModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    // ajouter un nouvel vehicule
    public function createVehiculeModel($params){
        
        $cnx=$this->db->connect();

        $query = 'INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`,`principal`, `image_id`, `guide_id`) VALUES (?, ?, ? , ?, ?, ?, NULL)';
        $id = $this->db->request($cnx,$query,$params,true);
    
        $this->db->disconnect($cnx);
        return $id;
    }

    // supp un vehicule
    public function deleteVehiculeModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `vehicules` SET `supp` = '1' WHERE `vehicule_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    // ajouter les caracteristiques du vehicule
    public function createVehiculeCaracsModel($params){
        $cnx=$this->db->connect();

        $query = 'INSERT INTO `carac_vehicule` (`carac_id`, `vehicule_id`, `value`) VALUES (?,?,?)';
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

    // recuperer tous les vehicules 
    public function getVehiculesModel($params)  {
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `vehicules`";
        $vehicules =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }
     
    // recuperer les vehicules principals d'une marque
    public function getPrincipalesVehiculesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.vehicule_id FROM `images` i JOIN( SELECT vh.image_id , vh.vehicule_id FROM `vehicules` vh JOIN( SELECT v.version_id FROM `versions` v JOIN ( SELECT md.modele_id FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (mr.marque_id= ? AND md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.supp=0 AND vh.principal=1 ) veh ON veh.image_id=i.image_id ";
        $vehicules =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }

    //Recuperer tous les vehicules d'une marques 
    public function getMarquesVehiculesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.* FROM `images` i JOIN( SELECT vh.* , v.version_nom , v.modele_nom , v.marque_nom FROM `vehicules` vh JOIN( SELECT v.* , m.modele_nom , m.marque_nom FROM `versions` v JOIN ( SELECT md.* ,mr.marque_nom FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (mr.marque_id= ? AND md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.supp=0 ) veh ON veh.image_id=i.image_id";
        $vehicules = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }
    
    //Recuperer un vehicule  par vehicule_id
    public function getVehiculeModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.* FROM `images` i JOIN( SELECT vh.* , v.version_nom , v.modele_nom , v.marque_nom FROM `vehicules` vh JOIN( SELECT v.* , m.modele_nom , m.marque_nom FROM `versions` v JOIN ( SELECT md.* ,mr.marque_nom FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.vehicule_id = ? AND vh.supp=0 ) veh ON veh.image_id=i.image_id; ";
        $vehic=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehic[0];
    }
    //Recuperer un vehicule  par version_id  et annee
    public function getVehiculeByVersionModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.* FROM `images` i JOIN( SELECT vh.* FROM `vehicules` vh WHERE vh.supp=0 AND vh.version_id = ? AND vh.annee = ? ) veh ON veh.image_id=i.image_id";
        $vehic=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehic[0];
    }

    //Recuperer toutes les caracteristiques 
    public function getCaracteristiquesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `caracteristiques`";
        $caracs=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $caracs;
    }
    
    //Recuperer toutes les caracteristiques d'un vehicule
    public function getVehiculeCaracteristiquesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT value, carac_nom, unite_mesure, i.chemin FROM `carac_vehicule` cv NATURAL JOIN `caracteristiques` c NATURAL JOIN( SELECT vehicule_id FROM `vehicules` WHERE vehicule_id = ?) v NATURAL JOIN `images` i";
        $caracs=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $caracs;
    }

    public function getCaracsByCategModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `images` i JOIN ( SELECT v.image_id , j.* FROM `vehicules` v JOIN( SELECT cv.*, c.* FROM `carac_vehicule` cv JOIN ( SELECT car.carac_id as caracId ,car.categ_id , car.carac_nom , car.unite_mesure FROM `caracteristiques` car JOIN `categories` cat ON cat.categ_id = car.categ_id WHERE cat.categ_id = ? ) c ON cv.carac_id = c.caracId) j ON v.vehicule_id = j.vehicule_id ) K ON k.image_id = i.image_id;";
        $caracs=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $caracs;
    }

    // recuperer la note d'un vehicule
    public function getVehiculeNoteModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT ROUND(AVG(n.note),1) AS NoteMoy FROM ( SELECT n.note FROM `note_vehicules` n WHERE n.vehicule_id = ? ) n";
        $note=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $note[0];
    }

    //Recuperer les avis les plus aprecies d'un vehicule
    public function getVehiculeTopAvisModel($params){

        $cnx=$this->db->connect();

        $query = "";
        $avis=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $avis;
    }

    public function getCategoriesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `categories`";
        $categories=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $categories;
    }

    public function createComparaisonModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `comparaisons` (`vehicule_1`, `vehicule_2`, `vehicule_3`, `vehicule_4`, `rech`, `supp`) VALUES (?,?, ?,?,1, 0) ";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        
    }
}



?>