<?php

class SuccessMessages{

     // ERROR_CONTROLLER_METHOD_ACTION
     const SUCCESS_ADMIN_NEWCATEGORY_EXISTS = "04c4e1d1b8d5b9b9810e46875abb77dd";

     private $successList = [];

    public function __construct(){

        $this->successList = [
            SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY_EXISTS => 'el nombre de la categoria ya existe'
        ];

    }

    public function get($hash){
        return $this->successList[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }

    }

}

?>