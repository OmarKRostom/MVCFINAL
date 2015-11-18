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

  function getalloptions() {
    $options = DB::getInstance()->retrive("*","options");;
    return $options->getresults();
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

  function deleteproduct($id) {
    $users = DB::getInstance()->delete("products",["id","=",$id]);
  }

  function insertoption($title,$data) {
    $values = implode('-',$data);
    DB::getInstance()->insert("options",array(
      "title" => $title,
      "value" => $values
      )
    );
  }

}




 ?>
