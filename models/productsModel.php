<?php


class productsModel
{

  function __construct()
  {

  }

  function getallproducts() {
  	$products = DB::getInstance()->retrive("*","products");;
    return $products->getresults();
  }

}




 ?>
