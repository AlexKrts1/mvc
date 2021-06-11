<?php
    include_once ROOT.'/models/Category.php';
    include_once ROOT.'/models/Product.php';
    
    class SiteController
    {
        public static $arr_param;

        public static function actionIndex()
        {
            $categoryList= Category::getCategoryList();
            $latestProducts=Product::getLatestProducts(5);
            require_once(ROOT.'/views/site/index.php');
            return true;
        }
    }
?>