<?php
require_once ROOT.'/models/News.php';

class NewsController 
{       
    public static $arr_param;
    public function actionView($id)
    {
        $newsList=array();
        $newsList= News::getNewsItemById($id[0]);
        echo '<pre>';
        print_r($newsList) ;
        echo '</pre>';
    }
    
    public function actionIndex()
    {
        $newsList=array();
        $newsList= News::getNewsList();
        //echo '<pre>';
        //print_r($newsList) ;
        //echo '</pre>';
        require_once(ROOT.'/views/news/index.php');

        //echo "<br> просмотр одной новости actionView Router::idNews".Router::$idNews;
        //print_r($arr);
        //list($str,$num)= $arr;
        //echo "<br> list of vars: $str $num";
       // print_r(self::$arr_param);
    }
}
?>
