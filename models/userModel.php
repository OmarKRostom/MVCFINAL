<?php


class userModel
{

  function __construct()
  {

  }

  function checkUser($name,$pass) {
  	$users = DB::getInstance()->query("SELECT * FROM users WHERE name = ?"
  		,array($name),1);
  	if(!empty($users)) {
  		if(password_verify($pass,$users->getresults()->password)) {
  			return $users->getresults();
  		}
  	} else {
  		return false;
  	}
  }

  function createUser($user,$pass,$email,$file_new_name) {
  	$users = DB::getInstance()->insert("users",array(
  			"name" => $user,
  			"password" => $pass,
        "email" => $email,
  			"profile" => $file_new_name
  		));
  }

  function getUsers($name = '') {
    if(empty($name))
      $users = DB::getInstance()->retrive("*","users");
    else
      $users = DB::getInstance()->query("SELECT * FROM users WHERE name LIKE '%" . $name . "%'");
    return $users->getresults();
  }

  function getUser($id) {
    $users = DB::getInstance()->retrive("*","users",["id","=",$id]);
    return $users->getresults();
  }

  function deleteUser($id) {
    $users = DB::getInstance()->delete("users",["id","=",$id]);
  }

}



 ?>
