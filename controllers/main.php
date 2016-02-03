<?php

class main extends controller
{
  	private $postsModel;
  	private $soundsModel;
  	public $sounds;

	public function __construct() {
		$this->postsModel = new postsModel();
		$this->soundsModel = new soundModel();
	}

	public function index() {
		$posts = $this->postsModel->getallposts();	
		$sounds = $this->soundsModel->getallsounds();
		require('views/home/index.php');
	}
	public function getsound() {
		$sound = $this->soundsModel->getsoundfile($_GET['id']);
		echo json_encode($sound[0]);
	}
}

?>
