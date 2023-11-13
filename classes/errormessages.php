<?php

class ErrorMessages{
    // ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "04c4e1d1b8d5b9b9810e46875abb77dd";

    private $errorList = [];

    public function __construct(){

        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'el nombre de la categoria ya existe'
        ];

    }

    public function get($hash){
        return $this->errorList[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->errorList)){
            return true;
        }else{
            return false;
        }

    }

}

?>