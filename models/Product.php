<?php
class Product
{
    const SHOW_BY_DEFAULT= 2;
    public static function getLatestProducts($count= SELF::SHOW_BY_DEFAULT)
    {
        $count= intval($count);
        $db= DB::getConnection();
        $productsList=array();
        $result= $db->query('SELECT ID, NAME, PRICE, IS_NEW'.
            ' FROM PRODUCT WHERE STATUS=1 '.
            ' ORDER BY ID DESC '.
            ' LIMIT '.$count);
        $i=0;
        var_dump($result);
        while($row = $result->fetch())
        {
            $productsList[$i]['id'] = $row['ID'];
            $productsList[$i]['name'] = $row['NAME'];
            $productsList[$i]['price'] = $row['PRICE'];
            //$productsList[$i]['image'] = $row['IMAGE'];
            $productsList[$i]['is_new'] = $row['IS_NEW'];
            $i++;
        }
        return $productsList;

    }
    public static function getProductsListByCategory($categoryId)
    {
        $page=1;
        if($categoryId[0])
        {
            if(isset($categoryId[1]))
                $page= intval($categoryId[1]);

                $offset =($page - 1) * self::SHOW_BY_DEFAULT;

            $db= DB::getConnection();
            $products=array();
            $result= $db->query(" SELECT ID, NAME, PRICE,IS_NEW FROM PRODUCT ".
                " WHERE STATUS = '1' AND CATEGORY_ID = $categoryId[0]".
                " ORDER BY ID ASC ".
                " LIMIT ".self::SHOW_BY_DEFAULT.
                " OFFSET ".$offset);
        $i=0;
        while($row = $result->fetch())
        {
            $products[$i]['id'] = $row['ID'];
            $products[$i]['name'] = $row['NAME'];
            $products[$i]['price'] = $row['PRICE'];
            $products[$i]['is_new'] = $row['IS_NEW'];
            $i++;
        }
        return $products;
        }
    }

    public static function getProductById($id)
    {
        $id= intval($id);
        if($id)
        {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM PRODUCT WHERE ID='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            print_r($id);
            //print_r($result);
            return $result->fetch();
        }

    }

    public static function getTotalProductsInCategory($categoryId)
    {
        //echo '<br>category';
        //   var_dump($categoryId[0]);
        //echo '<br>';
        $db= DB::getConnection();
        $result = $db->query('SELECT COUNT(ID) AS COUNT FROM PRODUCT WHERE STATUS="1"  AND CATEGORY_ID='. $categoryId[0]);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row= $result->fetch();

        return $row['COUNT'];

    }
}
?>