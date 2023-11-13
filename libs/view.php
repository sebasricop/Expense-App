<?php

class View{


    function __construct(){        
    }

    function render($nombre, $data = []){
        $this->d = $data;

        $this->handleMessages();

        require 'views/' . $nombre . '.php';
    }

    private function handleMessages(){
        if(isset($_GET['success']) && isset($_GET['error'])){
            //error
        }
    }

    

}