<?php

class postsFront extends controller {
	protected $postsModel;
	function __construct() {
		$this->postsModel = new postsModel();
	}

	function getpost() {
		$post = $this->postsModel->getSinglepost($_GET['id']);
		echo json_encode($post[0]);
	}
}

?>