<?php

class News
{
    public static function getNewsItemById($id)
    {
        $id= intval($id);
        if($id)
        {

        //$db=new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db= DB::getConnection();

        $result = $db->query('SELECT ID, TITLE, DATE, SHORT_CONTENT,IMAGEURI'
            .' FROM NEWS'
            .' WHERE ID='.$id
        );
        $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        
    }

    public static function getNewsList()
    {
        $db= DB::getConnection();

        $newsList=array();
        $db->exec('SET CHARACTER SET utf8');
        $result = $db->query('SELECT ID, TITLE, DATE, SHORT_CONTENT, IMAGEURI'
            .' FROM NEWS'
            .' ORDER BY DATE DESC'
            .' LIMIT 10'
        );
        $i=0;
        while($row = $result->fetch())
        {
            $newsList[$i]['ID']= $row['ID'];
            $newsList[$i]['TITLE']= $row['TITLE'];
            $newsList[$i]['DATE']= $row['DATE'];
            $newsList[$i]['SHORT_CONTENT']= $row['SHORT_CONTENT'];
            $newsList[$i]['IMAGEURI']= $row['IMAGEURI'];
            $i++;
        }
        return $newsList;
    }



}