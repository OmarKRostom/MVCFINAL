<?php


class settingsModel extends model
{

  function __construct()
  {

  }

  function updatesettings($id,$title,$who,$logo = '') {
    if($logo != '') {
      DB::getInstance()->update("settings",["id","=",$id],array(
        "website_logo" => $logo
      ));
    }
    DB::getInstance()->update("settings",["id","=",$id],array(
      "website_title" => $title,
      "who_phrase" => $who
    ));
  }


}




 ?>
