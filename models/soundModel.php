<?php


class soundModel extends model
{

  function __construct()
  {

  }

  function getallsounds() {
  	 $sounds = DB::getInstance()->retrive("*","sounds");
  	 return $sounds->getresults();
  }

  function getsoundfile($id) {
  	$sounds = DB::getInstance()->retrive("*","sounds",["id","=",$id]);
  	 return $sounds->getresults();
  }

  function addsound($albumart,$audiofile,$title,$year,$soundcloud) {
  	DB::getInstance()->insert("sounds",array(
  		"albumart" => $albumart,
  		"audiofile" => $audiofile,
  		"name" => $title,
  		"year" => $year,
      "soundcloud" => $soundcloud
  	));
  }

  function deletesound($id) {
  	$filename = DB::getInstance()->query("SELECT audiofile FROM sounds WHERE id = ?",array($id))->getresults()[0]->audiofile;
	unlink($GLOBALS['LOCAL_ROOT'].'uploads/sounds' . $filename);
	DB::getInstance()->delete("sounds",["id","=",$id]);
  }

}

?>
