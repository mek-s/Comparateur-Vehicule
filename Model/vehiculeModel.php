<?php
require_once('bdd.php');

class vehiculeModel{

    private $db;

    public function addVehiculeModel($nom ,$type, $marque, $modele, $version, $annee, $long, $larg, $haut, $moteur,$perf,$consm, $image, $guide){
        $this->db = new bdd();
        $cnx=$this->db->connect();

        $query = 'INSERT INTO `vehicules` (`vehicule_nom`, `type`, `marque_id`, `modele`, `version`, `annee`, `longueur`, `largeur`, `hauteur`, `moteur`, `consomation`, `performance`, `image_id`, `guide_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $params = array($nom,$type,$marque,$modele,$version,$annee,$long,$larg,$haut,$moteur,$perf,$consm,$image,$guide);
        $this->db->request($cnx,$query,$params);
    
        $this->db->disconnect($cnx);
    }
}



?>