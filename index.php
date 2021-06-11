<?php
//FRONT CONTROLLER
//1. GENERAL SETTINGS
//2. INCLUDING SYSTEM FILES
//3. ESTABLISH DATABASE CONNECTION 
//4. CALL CLASS ROUTER 

error_reporting(E_ALL);
ini_set('display_errors', 'on');

define('ROOT', dirname(__FILE__));
define('ROUTER', ROOT.'/components');

include_once(ROOT.'/components/Autoload.php');
//require_once(ROUTER.'/Router.php');
//require_once(ROOT.'/components/DB.php');

session_start();
(new Router)->run();

