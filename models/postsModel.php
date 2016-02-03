<?php


class postsModel extends model
{

  function __construct()
  {

  }

  function getSinglepost($id) {
    $post = DB::getInstance()->retrive("*","posts",["id","=",$id]);
    return $post->getresults();
  }

  function getallposts() {
  	$posts = DB::getInstance()->retrive("*","posts");
    return $posts->getresults();
  }

  function insertpost($title,$brief,$content,$date) {
    DB::getInstance()->insert("posts",array(
      "title" => $title,
      "content" => $content,
      "brief" => $brief,
      "date" => $date
    ));
  }
  function deletepost($id) {
    DB::getInstance()->delete("posts",['id','=',$id]);
  }

}




 ?>
