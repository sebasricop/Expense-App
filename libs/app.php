<?php

class App{


    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');  //RTRIM BORRA CUALQUIER DIAGONAL QUE SE ENCUENTRE AL FINAL DE LA URL
        $url = explode('/', $url);  //EXPLODE DIVIDE LA URL QUE TENGO EN UN ARREGLO QUE SEPARA LOS ELEMENTOS POR CADA DIAGONAL QUE ENCUENTRE 

        if(empty($url[0])){
            error_log('APP::construct-> no hay controlador especificado');
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }
        $archivoController = 'controllers/' . url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            $controller = new $url[0];
            $controller-> loadModel($url[0]); 

            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        //Nro de parametros
                        $nparam = count($url)-2;
                        //arreglo de parametros
                        $params = [];

                        for($i = 0; $i < $nparam; $i++){
                            array_push($nparam, $url[$i] +2);
                        }

                        $controller->{$url[1]}($params);
                    }else{
                        //no tiene parametros, se manda a llamar
                        //el metodo tal cual
                        $controller->{$url[1]}();
                    }
                }else{
                    //error no existe metodo
                }
            }else{
                //No hay metodo a cargar, se carga el metodo por default
                $controller->render();
            }
        }else{
            //no existe el archivo, manda error
        }
    }

}

?>