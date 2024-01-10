<?php
require_once "C:\wamp64\www\Comparateur-Vehicule\Models\userModel.php";

class userController{

    private $model;


    public function createUserController($params){ 
        $this->model = new userModel();
        $result=$model->createUserModel($params);   
    }
    
    public function blockUserController($params){
        $this->model = new userModel();
        $this->model->blockUserModel($params);
    }

    public function confirmUserController($params){
        $this->model = new userModel();
        $this->model->confirmUserModel($params);
    }

    public function authenticateUserController($nom,$mdp){
        $this->model = new userModel();
        if ($this->model->authenticateUserModel($nom,$mdp)) {
           return true;
        } else return false;
    }

    public function getAllUsersController(){
        $this->model = new userModel();
        return $this->model->getAllUsersModel();    
    }

}
?>