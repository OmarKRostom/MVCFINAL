<?php

class users extends dashboard
{
    private $usrModel;

  function __construct() {
    $this->usrModel = new userModel();
  }
  function index() {
    
    $all_users = $this->usrModel->getUsers(); 
    if(isset($_GET['username'])) 
       $all_users = $this->usrModel->getUsers($_GET['username']); 
    else
       $all_users = $this->usrModel->getUsers(); 
  	require('views/dashboard/users/view.php');
  }
  function add() {
    var_dump($_POST);
  	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_FILES['profilepic'])) {
      $name = $_POST['username'];
  		$pass = password_hash($_POST['password'],PASSWORD_BCRYPT);
  		$file = $_FILES['profilepic'];
      $email = $_POST['email'];
  		//FILEPROPS
  		$file_name = $file['name'];
  		$file_tmp_loc = $file['tmp_name'];
  		$file_size = $file['size'];
  		$file_ext = strtolower(end(explode('.',$file_name)));
  		$file_name_new = uniqid('',true) . '.' . $file_ext;
  		$file_new_location = 'uploads/usr_profiles/' . $file_name_new;
      if($file['error']===0 && $file_size < 2097152) {
        if(move_uploaded_file($file_tmp_loc, $file_new_location)) {
          echo "YES";
        } else {
          echo "NO";
        }
      }
      //INSERT USER DATA
      $this->usrModel->createUser($name,$pass,$email,$file_name_new);
  	}
  }
  function delete() {
    $usrModel = new userModel();
    $id = $_POST['id'];
    $this->usrModel->deleteUser($id);
  }
  function getinfo() {
    $usrModel = new userModel();
    $id = $_POST['id'];
    $user = $this->usrModel->getUser($id);
    echo json_encode($user);
  }
  
}

?>
