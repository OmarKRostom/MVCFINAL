<?php

class products extends dashboard
{
  protected $productsModel;
  function __construct() {
    $this->productsModel = new productsModel();
  }
  function index($pageIndex) {
    $index = empty($pageIndex) ? 1 : intval($pageIndex);
  	$all_products = $this->productsModel->getallproducts(($index-1)*10,10);
    $num_pages = $this->productsModel->countPages("products")[0]->rows;
    $num_pages = ceil(intval($num_pages)/10);
    $indexer = 1;
    $options = $this->productsModel->getalloptions();
  	require('views/dashboard/products/index.php');
  }
  function add() {
    $allfiles = [];
    //FILES MANIPULATING
    $image_names = array_values($_FILES['images']['name']);
    $image_tmps = array_values($_FILES['images']['tmp_name']);
    $image_sizes = array_values($_FILES['images']['size']);
    if(!empty($image_names[0]))
      foreach($image_names as $key=>$img) {
        $ext = strtolower(end(explode('.',$img)));
        $new_img = uniqid('prod',true) . '.' . $ext;
        $file_new_location = 'uploads/products/' . $new_img;
        if(move_uploaded_file($image_tmps[$key], $file_new_location)) {
            echo "Uploaded successfully.";
          } else {
            echo "Some error occured.";
          }
        array_push($allfiles,$new_img); 
      }
    $images = implode('/',$allfiles);
    $this->productsModel->insertProduct(
      $_POST['prod_name'],$_POST['prod_price'],$_POST['prod_category']
      ,$_POST['prod_brand'],$images,$_POST['description'],$_POST['prod_quantity']
      ,$_POST['prod_discount'],$_POST['options']
    );
  }
  function delete() {
    $id = $_POST['id'];
    $this->productsModel->deleteproduct($id);
  }
  function modify() {

  }
  function addoption() {
    $option_name = $_POST['option_name'];
    array_shift($_POST);
    $option_vals = array_values($_POST);
    var_dump($option_vals);
    $this->productsModel->insertoption($option_name,$option_vals);
  }
}

?>
