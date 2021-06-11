<?php
    class Category
    {
        public static function getCategoryList()
        {
        $db= DB::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT ID, NAME FROM CATEGORY '.
            ' ORDER BY SORT_ORDER ASC');
        
            $i=0;
        while($row = $result->fetch())
        {
            $categoryList[$i]['id'] = $row['ID'];
            $categoryList[$i]['name'] = $row['NAME'];
            $i++;
        }            
            return $categoryList;
        }

    }
?>
