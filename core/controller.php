<?php

class controller
{

  public function __construct() {

  }

  public function loadModel($modelName) {
    require_once('models/' . $modelName . '.php');
    return new $modelName();
  }

  public function loadView($folderName,$fileName,$data = []) {
    require_once('views/' . $folderName . '/' . $fileName . '.php');
  }
}




 ?>
