<?php
return array(
    
    'news/([0-9]+)' => 'news/view/$1',
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news' => 'news/index',// actionIndex in NewsController
    'product/([0-9]+)' => 'product/view/$1', //actionList in ProductsController
    'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',
    'category/([0-9]+)'=>'catalog/category/$1',
    'catalog'=>'catalog/index',
    'user/register'=>'user/register',
    'user/login'=>'user/login',
    'user/logout'=>'user/logout',
    '^cabinet$'=>'cabinet/index',
    'cabinet/edit'=>'cabinet/edit',
    '^$'=>'site/index',
);