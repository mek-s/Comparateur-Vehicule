<?php
class bdd {
    
    private $dbName="comparateur";
    private $host ="127.0.0.1";
    private $user ="root";
    private $password="";

    // connexion a la base de donnees
    public function connect(){
        $dsn="mysql:dbname=".$this->dbName."; host=".$this->host.";";
        try{
            $conn=new PDO($dsn,$this->user,$this->password);
        }
        catch(PDOException $ex){
            printf("erreur de connexion à la base de donnée", $ex->getMessage());
            exit();
        }
        return $conn;
    }

    // deconnexion de la base de donnees
    public function disconnect(&$conn){
        $conn=null;
    }

    // executer une requette et retourne le resultat
    public function request($conn , $req , $params,$returnLastInsertId){
        $r = $conn->prepare($req);
        for ($i = 1; $i <= count($params); $i++) { 
            $r->bindParam($i, $params[$i]);
        }
        $r->execute();
        if ($returnLastInsertId) { return $conn->lastInsertId(); 
        }else {
            return $r->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }
}

?>