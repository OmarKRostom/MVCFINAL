<?php


class productsModel extends model
{

  function __construct()
  {

  }

  function getallproducts($start,$limit) {
  	$products = DB::getInstance()->retrive("*","products",array(),[$start,$limit]);
    return $products->getresults();
  }

  function getalloptions() {
    $options = DB::getInstance()->retrive("*","options");;
    return $options->getresults();
  }

  function insertproduct($name,$price,$category,$brand,$images,$description,$quantity,$discount,$options) {
  	DB::getInstance()->insert("products",array(
  			"name" => $name,
	  		"price" => $price,
	  		"category" => $category,
	  		"brand" => $brand,
	  		"images" => $images,
	  		"description" => $description,
	  		"quantity" => $quantity,
	  		"discount" => $discount,
        "available_options" => $options
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
