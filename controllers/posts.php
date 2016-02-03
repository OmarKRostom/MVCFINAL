<?php

class posts extends dashboard {
	protected $postsModel;
	function __construct() {
		$this->postsModel = new postsModel();
	}
	function index($pageIndex) {
		$index = empty($pageIndex) ? 1 : intval($pageIndex);
		$all_posts = $this->postsModel->getallposts(($index-1)*10,10);
		$num_pages = $this->postsModel->countPages("posts")[0]->rows;
	    $num_pages = ceil(intval($num_pages)/10);
	    $indexer = 1;
	    require('views/dashboard/posts/index.php');
	}
	function add() {
		$this->postsModel->insertPost($_POST['post_title'],$_POST['post_brief'],$_POST['content'],date("d/m/y"));
	}
	function delete() {
		$this->postsModel->deletePost($_POST['id']);
	}
	function getpost() {
		$post = $this->postsModel->getSinglepost($_GET['id']);
		echo json_encode($post[0]);
	}
}

?>