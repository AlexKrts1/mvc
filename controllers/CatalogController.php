<?php
//include_once ROOT.'/models/Category.php';
//include_once ROOT.'/models/Product.php';
//include_once ROOT.'/components/Pagination.php';

class CatalogController
{
    public static $arr_param ;
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();
        $latestProducts = Product::getLatestProducts(12);

        require_once(ROOT.'/views/catalog/index.php');
        return true;

    }

    public static function actionCategory($idCategory)
    {
        $page=1;
        if(isset($idCategory[1]))
            $page=($idCategory[1]);
       
   
        $categories = array();
        $categories = Category::getCategoryList();
        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($idCategory);
        $total= Product::getTotalProductsInCategory($idCategory);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        echo '<br>pagination';
        var_dump($total);
        echo '<br>';
        print_r($page);
        echo '<br>';
        require_once(ROOT.'/views/catalog/category.php');
        return true;

    }
}