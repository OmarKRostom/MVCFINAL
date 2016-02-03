<?php

	class sounds extends dashboard {
		private $soundModel;
		function __construct() {
			$this->soundModel = new soundModel();
		}
		function index() {
			$all_sounds = $this->soundModel->getallSounds();
			require('views/dashboard/sounds/index.php');
		}
		function uploadSound() {
			$albumart = $_FILES['track-albumart'];
			$albumart_name = $albumart['name'];
			$albumart_tmp = $albumart['tmp_name'];
			$albumart_ext = end(explode('.',$albumart_name));
			$albumart_new = uniqid('',true) . '.' . $albumart_ext;
			$audiofile = $_FILES['track-soundsfile'];
			$audiofile_name = $audiofile['name'];
			$audiofile_tmp = $audiofile['tmp_name'];
			$audiofile_ext = end(explode('.',$audiofile_name));
			$audiofile_new = uniqid('',true) . '.' . $audiofile_ext;
			//ALBUMART UPLOAD
			if(!$albumart['error'])
				move_uploaded_file($albumart_tmp, 'uploads/albumarts/'.$albumart_new);
			//SOUNDCLIP UPLOAD
			if(!$audiofile['error'])
				move_uploaded_file($audiofile_tmp, 'uploads/sounds/'.$audiofile_new);
			$this->soundModel->addsound($albumart_new,$audiofile_new,$_POST['track-title'],$_POST['track-year'],$_POST['soundcloud']);
		}
		function delete() {
			$this->soundModel->deletesound($_POST['id']);
		}
	}



?>