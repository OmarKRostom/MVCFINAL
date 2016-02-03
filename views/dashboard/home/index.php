<?php
	require_once('views/system_header.php');
	require_once('views/dashboard/content_header.php');
?>

<div class="mainContainer">
	<h1 class="headtitle"><i style="margin-right: 10px;" class="fa fa-tachometer"></i>Home Dashboard</h1>
	<div class="tilesContainer">
		<div class="col-sm-4 col-xs-12">
			<div class="tile">
				<div style="font-size:100px"><i class="fa fa-clock-o"></i></div>
				Renewal Date 
			</div>
			<div class="tile">
				<div style="font-size:100px"><i class="fa fa-envelope-o"></i></div>
				Inbox
			</div>
			<div class="tile cursor" data-toggle="modal" data-target="#adduser-Modal">
				<div style="font-size:100px"><i class="fa fa-user-plus"></i></div>
				Add user
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="tile">
				<div style="font-size:100px">
					<i class="fa fa-globe"></i>
				</div>
				Change Language
			</div>
			<a href="<?=$GLOBALS['LOCAL_ROOT']?>">
				<div class="tile">
					<div style="font-size:100px"><i class="fa fa-internet-explorer"></i></div>
					Main site
				</div>
			</a>
			<div class="tile">
				<div style="font-size:100px"><i class="fa fa-info-circle"></i></div>
				About
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="tile">
				<div style="font-size:100px">
					<i class="fa fa-paint-brush"></i>
				</div>
				Change theme
			</div>
			<div class="tile">
				<div style="font-size:100px"><i class="fa fa-life-ring"></i></div>
				Customer support
			</div>
			<div class="tile">
				<div style="font-size:100px"><i class="fa fa-sign-out"></i></div>
				Logout
			</div>
		</div>
	</div>
</div>
<div style="clear:both;"></div>


<div id="adduser-Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add user</h4>
      </div>
      <div class="success-msg alert-success" style="padding: 10px;display:none;">
		   User registered successfully.   
		</div>
      <div class="modal-body">
        <form class="theform" action="<?$GLOBALS['ADMIN_ROOT']?>users/add" method="post" enctype="multipart/form-data">
        	<div class="form-group">
			    <label for="usrname">Username :</label>
			    <input name="username" type="text" class="form-control" id="usrname">
		  	</div>
		  	<div class="form-group">
			    <label for="password">Password :</label>
			    <input name="password" type="password" class="form-control" id="password">
		  	</div>
		  	<div class="form-group">
			    <label for="email">Email :</label>
			    <input name="email" type="text" class="form-control" id="email">
		  	</div>
		  	<div class="form-group">
			    <label for="imageUpload">Profile Picture :</label>
			    <input name="profilepic" type="file" class="form-control" id="imageUpload">
		  	</div>
        </form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-success addsubmit">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	$('.addsubmit').click(function(){
		var formData = new FormData($('.theform')[0]);
		$.ajax({
			type: 'POST',
			url: '<?=$GLOBALS['ADMIN_ROOT']?>users/add/',
			async: false,
			data: formData,
			success: function(data)
			{
				$('.success-msg').show();
			},
			cache: false,
			contentType: false,
			processData: false
		});
	});

	$(document).ready(function(){

	});

</script>
<?php
	require_once('views/dashboard/content_footer.php');
	require_once('views/system_footer.php');
?>