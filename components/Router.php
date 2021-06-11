<?php
class Router
{
    private $routes;
    public static $idNews;
    private $class;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes= include($routesPath);
    }

    public function run()
    {
        echo 'слава Богу!!!';
        print_r($this->routes);
        //получить строку запроса
        if(!empty($_SERVER['REQUEST_URI']));
            $uri = trim(trim($_SERVER['REQUEST_URI'], '/'),'');
            echo '<br>uri<br>';
            var_dump($uri);
            echo '<br>';
        //проверить роут
        foreach($this->routes as $key=>$val )
        {   
            $v = preg_match("~$key~", $uri, $matches);
            
            if($v )
            {
                var_dump(preg_match("~$key~", $uri, $matches));
                $segm= preg_replace("~$key~", $val, $uri);
                echo '<br>matches<br>';
                print_r($matches);
                echo '<br>'; 
                $arr_segm= explode('/', $segm);
                echo '<br>' ;
                print_r($arr_segm);
                //$action= 'action'.ucfirst(substr($val,strpos($val, '/')+1)) ; 
                //$action= 'action'.ucfirst($arr_segm[1]) ; 
                
                
                //$class= ucfirst(substr($val,0,strpos($val, '/'))).'Controller.php';
                $class = ucfirst(array_shift($arr_segm) ).'Controller.php';
                $action = 'action'.ucfirst(array_shift($arr_segm) );
                
                echo '<br>'.$action.' <br>';
                if(file_exists(ROOT."\\controllers\\".$class))
                {
                    include_once(ROOT."\\controllers\\".$class);
                   // $class::$arr_param = $arr_segm;
                }
                trim($class,'.php')::$arr_param = $arr_segm;   
                
                $class = substr($class,0, strpos($class,'.php') );
                echo ROOT."\\controllers\\".$class;
                $this->class= new $class;
                //$class::$arr_param = $arr_segm;
                echo '<br>$arr_segm<br>';
                print_r($arr_segm);
                echo '<br>'; 
                $this->class->$action($arr_segm);
                  
                 
            break;
            }
        }
        // подключить  файл контроллер
        //создать объект этого контроллера и вызвать действие 
        
    }
}

?>