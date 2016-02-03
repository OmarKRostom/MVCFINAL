<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <title><?=$_SESSION['website_title'];?> dashboard</title>
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/animate.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/ion.rangeSlider-master/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/ion.rangeSlider-master/css/ion.rangeSlider.skinNice.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/bootstrap-fileinput-master/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/summernote.css">
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/bootstrap3_player.css"/>
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/jquery.mCustomScrollbar.min.css"/>

    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/js/jquery.min.js"></script>
      <?php
        if(isset($_GET['url'])) {
            ?>
            <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/main.css"/>
        <?php
        }else{
            ?>
        <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/custom-theme.css"/>
        <?php
        }
    ?>
  </head>
  <body>