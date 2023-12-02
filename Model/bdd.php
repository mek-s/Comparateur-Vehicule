<?php
class bdd {
    
    private $dbName="comparateur";
    private $host ="127.0.0.1";
    private $user ="root";
    private $password="";

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

    public function disconnect(&$conn){
        $conn=null;
    }

    public function request($conn , $req){
        $r = $conn->prepare($req);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>