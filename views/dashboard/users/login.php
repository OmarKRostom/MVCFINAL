<?php
  require_once('views/system_header.php');
?>

  <style type="text/css">
    body {
      background: url('/MVCFINAL/uploads/images/contemporary_china.png');
    }
    .login {
        width: 35%;
        margin: 0px auto;
        margin-top: 15%;
    }
  </style>

  <div class="login">
      <!-- Horizontal Form -->
              <div class="box box-info" style="text-align: center;
    padding-top: 15px;">
                <img class="img-responsive" style="max-width: 200px;margin: 0px auto;" src="<?=$GLOBALS['LOCAL_ROOT'];?>uploads/images/<?=$_SESSION['website_logo'];?>">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$_SESSION['website_title'];?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <p style="color:gray;">Powered by Halcon</p>
                    <button type="submit" class="btn btn-success" style="width:100%;">Sign in</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
        
    </div>

<?php
  require_once('views/system_footer.php');
?>