<?php

require_once 'init.php';

$GLOBALS['ADMIN_ROOT'] = 'http://localhost/MVCFINAL/dashboard/';
$GLOBALS['LOCAL_ROOT'] = 'http://localhost/MVCFINAL/';
$GLOBALS['CONT_LIST'] = ['Home','Users','Products','Posts','Sounds','Settings'];
$GLOBALS['ICONS_LIST'] = ['fa fa-home','fa fa-users','fa fa-shopping-cart','fa fa-sticky-note','fa fa-music','fa fa-gears'];

session_start();

$app = new App;
DB::getInstance();

?>