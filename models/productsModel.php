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

  function insertproduct($name,$price,$category,$brand,$images,$description,$quantity,$discount) {
  	DB::getInstance()->insert("products",array(
  			"name" => $name,
	  		"price" => $price,
	  		"category" => $category,
	  		"brand" => $brand,
	  		"images" => $images,
	  		"description" => $description,
	  		"quantity" => $quantity,
	  		"discount" => $discount
  		)
  	);
  }

}




 ?>
