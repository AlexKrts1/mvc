<?php
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';

class ProductController 
{       
    public static $arr_param;

    public function actionView($id)
    {
        //echo '<br>actionView $id<br>';
       // print_r($id);
        //echo '<br>'; 
        $categories= array();
        $categories = Category::getCategoryList();
        $product = Product::getProductById($id[0]);
        
        require_once(ROOT.'/views/product/view.php');
        return true;
    }
    
}
?>