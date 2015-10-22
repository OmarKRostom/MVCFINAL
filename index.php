
<?php

require_once 'init.php';

$GLOBALS['ADMIN_ROOT'] = 'http://localhost/MVCFINAL/dashboard/';
$GLOBALS['LOCAL_ROOT'] = 'http://localhost/MVCFINAL/';
$GLOBALS['CONT_LIST'] = ['Home','Users','Products'];
$GLOBALS['ICONS_LIST'] = ['fa fa-home','fa fa-users','fa fa-shopping-cart'];

session_start();

$app = new App;
DB::getInstance();



//$data = DB::getInstance()->retriveAll("*","users",array('name','=','Omar Khairy'));
//var_dump($data->getresults());
//DB::getInstance()->delete("users",array("name","=","Za3bola"));
?>
