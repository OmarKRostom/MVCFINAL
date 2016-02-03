<?php
	class settings extends dashboard {
		private $settingsModel;

		public function __construct() {
			$this->settingsModel = new settingsModel();
		}

		public function index() {
	  		require('views/dashboard/settings/index.php');
	  	}

	  	public function updatesettings() {
	  		$id = 1;
	  		if(!empty($_FILES['name'])) {
	  			$filename = $_FILES['name'];
	  			$fileext = strtolower(end(explode('.',$_FILES['name'])));
	  			$filetmp = $_FILES['tmp_name'];
	  			$filenewname = uniqid('',true) . '.' . $fileext;
	  			if($_FILE['error']==0) {
	  				if(move_uploaded_file($filetmp, $GLOBALS['LOCAL_ROOT'] . '/uploads/images/' . $filenewname)) {
	  					echo "YES";
	  				} else {
	  					echo "NO";
	  				}
	  			}
	  		} 
	  		if(isset($filenewname))
	  			$this->settingsModel->updatesettings($id,$_POST['tabname'],$_POST['who_me'],$filenewname);
	  		else
	  			$this->settingsModel->updatesettings($id,$_POST['tabname'],$_POST['who_me']);
	  	}		
	}
?>