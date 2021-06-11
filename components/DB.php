<?php
class DB
{
    public static function getConnection()
    {
        $paramPath = ROOT. '/config/dbparams.php';
        $param = include($paramPath);
        print_r($param);
        $db=new PDO("mysql:host={$param['host']};dbname={$param['dbname']}", $param['user'], $param['password']);
        $db->exec('SET CHARACTER SET utf8');
        return $db;
    }


} 
?>