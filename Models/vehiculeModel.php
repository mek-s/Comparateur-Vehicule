<?php
require_once('bdd.php');

class vehiculeModel{

    private $db;

    public function __construct(){
        $this->db = new bdd();
    }

    /*********************gestion des vehicules *******************/
    // ajouter un nouvel vehicule
    public function createVehiculeModel($params){
        
        $cnx=$this->db->connect();

        $query = 'INSERT INTO `vehicules` (`vehicule_nom`, `type`, `version_id`, `annee`,`principal`, `image_id`, `guide_id`) VALUES (?, ?, ? , ?, ?, ?, NULL)';
        $id = $this->db->request($cnx,$query,$params,true);
    
        $this->db->disconnect($cnx);
        return $id;
    }

    // modifier un  vehicule
    public function modifVehiculeModel($params){
        
        $cnx=$this->db->connect();

        $query = 'UPDATE `vehicules` SET `vehicule_nom` = ?, `type` = ?, `version_id` = ?, `annee` = ?, `principal` =  ? , `image_id` = ? WHERE `vehicules`.`vehicule_id` = ?';
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
       
    }

    // supp un vehicule
    public function deleteVehiculeModel($params){
        $cnx=$this->db->connect();

        $query = "UPDATE `vehicules` SET `supp` = '1' WHERE `vehicule_id` = ?";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

     //Recuperer un vehicule  par vehicule_id
     public function getVehiculeModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.* FROM `images` i JOIN( SELECT vh.* , v.version_nom , v.modele_nom , v.marque_nom FROM `vehicules` vh JOIN( SELECT v.* , m.modele_nom , m.marque_nom FROM `versions` v JOIN ( SELECT md.* ,mr.marque_nom FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.vehicule_id = ? AND vh.supp=0 ) veh ON veh.image_id=i.image_id; ";
        $vehic=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehic[0];
    }

     // recuperer tous les vehicules 
     public function getVehiculesModel($params)  {
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `vehicules`";
        $vehicules =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }

    //Recuperer un vehicule  par version_id  et annee
    public function getVehiculeByVersionModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.* FROM `images` i JOIN( SELECT vh.* FROM `vehicules` vh WHERE vh.supp=0 AND vh.version_id = ? AND vh.annee = ? ) veh ON veh.image_id=i.image_id";
        $vehic=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehic[0];
    }

    // recuperer les inforamation concernant un vehicule 
    // pour remplir le formulaire de comparaison 
    public function getVehicCmpInfosModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT v.vehicule_id , v.vehicule_nom , v.annee, vr.version_nom , vr.version_id , md.modele_id , md.modele_nom , mr.marque_id , mr.marque_nom FROM `vehicules` v JOIN `versions` vr ON v.version_id = vr.version_id JOIN `modeles` md ON vr.modele_id = md.modele_id JOIN `marques` mr ON mr.marque_id = md.marque_id WHERE vehicule_id = ?";
        $infos = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $infos[0];
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

    // recuperer l'image d'un vehicule
    public function getVehiculeImageModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , v.vehicule_id , v.vehicule_nom FROM `images` i  NATURAL JOIN `vehicules` v WHERE v.vehicule_id = ?";
        $img = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $img[0];
    }

    // ajouter un vehicule favoris 
    public function ajouterFavorisModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `favoris_vehicules` (`user_id`, `vehicule_id`) VALUES (?, ?)";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        
    }


    /*********************gestion des caracteristiques *******************/
    // ajouter les caracteristiques du vehicule
    public function createVehiculeCaracsModel($params){
        $cnx=$this->db->connect();

        $query = 'INSERT INTO `carac_vehicule` (`carac_id`, `vehicule_id`, `value`) VALUES (?,?,?)';
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
    }

      // modifier les caracteristiques du vehicule
      public function modifVehiculeCaracsModel($params){
        $cnx=$this->db->connect();

        $query = 'UPDATE `carac_vehicule` SET `value` = ? WHERE `carac_id` = ? AND `vehicule_id` = ? ';
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
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

        $query = "SELECT value, carac_nom, carac_id, unite_mesure, i.chemin FROM `carac_vehicule` cv NATURAL JOIN `caracteristiques` c NATURAL JOIN( SELECT vehicule_id FROM `vehicules` WHERE vehicule_id = ?) v NATURAL JOIN `images` i";
        $caracs=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $caracs;
    }

    // recuperer les caracteristiques par categorie
    public function getCaracsByCategModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `images` i JOIN ( SELECT v.image_id , j.* FROM `vehicules` v JOIN( SELECT cv.*, c.* FROM `carac_vehicule` cv JOIN ( SELECT car.carac_id as caracId ,car.categ_id , car.carac_nom , car.unite_mesure FROM `caracteristiques` car JOIN `categories` cat ON cat.categ_id = car.categ_id WHERE cat.categ_id = ? ) c ON cv.carac_id = c.caracId) j ON v.vehicule_id = j.vehicule_id ) K ON k.image_id = i.image_id;";
        $caracs=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $caracs;
    }

    // recuperer les categories 
    public function getCategoriesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `categories`";
        $categories=$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $categories;
    }
    

    /*********************gestion des marques *******************/    
    // recuperer les vehicules principals d'une marque
    public function getPrincipalesVehiculesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.vehicule_id FROM `images` i JOIN( SELECT vh.image_id , vh.vehicule_id FROM `vehicules` vh JOIN( SELECT v.version_id FROM `versions` v JOIN ( SELECT md.modele_id FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (mr.marque_id= ? AND md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.supp=0 AND vh.principal=1 ) veh ON veh.image_id=i.image_id ";
        $vehicules =$this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }

    //Recuperer tous les vehicules d'une marque
    public function getMarquesVehiculesModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT i.chemin , veh.* FROM `images` i JOIN( SELECT vh.* , v.version_nom , v.modele_nom , v.marque_nom FROM `vehicules` vh JOIN( SELECT v.* , m.modele_nom , m.marque_nom FROM `versions` v JOIN ( SELECT md.* ,mr.marque_nom FROM `modeles` md JOIN `marques` mr ON md.marque_id = mr.marque_id WHERE (mr.marque_id= ? AND md.supp= 0 AND mr.supp= 0) ) m ON v.modele_id = m.modele_id WHERE v.supp = 0 ) v ON v.version_id=vh.version_id WHERE vh.supp=0 ) veh ON veh.image_id=i.image_id";
        $vehicules = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $vehicules;
    }
    
    /*********************gestion des comparaisons *******************/
    // creer une comparaisons 
    public function createComparaisonModel($params){
        $cnx=$this->db->connect();

        $query = "INSERT INTO `comparaisons` (`vehicule_1`, `vehicule_2`, `vehicule_3`, `vehicule_4`, `rech`, `supp`) VALUES (?,?, ?,?,1, 0) ";
        $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        
    }

    // recuperer les comparaisons populaires d'un vehicule
    public function getPopularVahicComparModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `comparaisons` WHERE supp = 0 AND (vehicule_1 = ? OR vehicule_2 = ?) ORDER BY rech DESC LIMIT 10";
        $cmp = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $cmp;
    }
    
    //recuperer toutes les comparaisons popolaires
    public function getPopularComparModel($params){
        $cnx=$this->db->connect();

        $query = "SELECT * FROM `comparaisons` WHERE supp = 0 ORDER BY rech DESC ";
        $cmp = $this->db->request($cnx,$query,$params,false);
    
        $this->db->disconnect($cnx);
        return $cmp;
    }

   

}



?>