 <?php 

 class Controller{

    function __construct(){
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'models/' . $model . 'model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function existPOST($params){
        foreach($params as $param){
            if(!isset($_POST[$param])){
                error_log('CONTROLLER::existPost => No existe el parametro ' . $param);
                return false;
            }            
        }

        return true;

    }

    function existGET($params){
        foreach($params as $param){
            if(!isset($_GET[$param])){
                error_log('CONTROLLER::existGet => No existe el parametro ' . $param);
                return false;
            }            
        }

        return true;
    }

    function getGet($name){
        return $_GET[$neme];
    }

    function getPost($name){
        return $_POST[$neme];
    }

    function redirect($route, $mensajes){
        $data = [];
        $params = '';

        foreach($mensajes as $key => $mensaje){
            array_push($data, $key . '=' . $mensaje);
        }

        $params = join('&', $data);

        if($params != ''){
            $params = '?' . $params;
        }

        header('Location: ' . constant('URL') . $route . $params);
    }

 }

 ?>