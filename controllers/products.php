<?php

class products extends dashboard
{
  function index() {
  	$productsModel = new productsModel();
  	$all_products = $productsModel->getallproducts();
  	require('views/dashboard/products/index.php');
  }
  function add() {

  }
  function delete() {

  }
  function modify() {

  }
}

?>
