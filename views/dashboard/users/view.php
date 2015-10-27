<?php
	require_once('views/system_header.php');
	require_once('views/dashboard/content_header.php');
?>

<!--CONTENT GOES HERE -->
<h1 class="headtitle"><i style="margin-right: 10px;" class="fa fa-users "></i>Users</h1>
<div class="col-sm-9 col-xs-12">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Permission</th>
				<th>Delete/Modify</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($all_users as $user) {
					?>
						<tr>
							<th class="id"><?=$user->id;?></th>
							<th class="name"><?=$user->name;?></th>
							<th class="email"><?=$user->email;?></th>
							<th class="permission"><?=$user->permission;?></th>
							<th style="padding: 0;">
								<div class="btn-group" style="width: 100%;height:100%;">
								  <button type="button" class="btn btn-danger delete-user" style="width: 50%;height: 100%;">
								  	<i class="fa fa-trash"></i>
								  </button>
								  <button data-toggle="modal" data-target="#edituser-Modal" type="button" class="btn btn-warning edit-user" style="width: 50%;height: 100%;">
								  	<i class="fa fa-pencil-square-o"></i>
								  </button>
								</div>
							</th>
						</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
<div class="col-sm-3 col-xs-12 gadget">
	<form method="get">
	<div class="input-group" style="margin-bottom:10px;">
			<input type="text" name="username" class="form-control search_user_text" placeholder="Search Username...">
			<span class="input-group-btn">
			<button type="submit" id="search-btn" class="btn btn-flat search-user"><i class="fa fa-search"></i></button>
		</span>
	</div>
	</form>
	<button data-toggle="modal" data-target="#adduser-Modal" style="width:100%;" class="btn btn-success"><i style="margin-right:10px;" class="fa fa-user-plus"></i><span>Add user</span></button>
</div>

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

<div id="edituser-Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit user</h4>
      </div>
      <div class="modal-body">
        <form class="theform" action="<?$GLOBALS['ADMIN_ROOT']?>users/edit" method="post" enctype="multipart/form-data">
        	<div class="form-group">
			    <label for="usrname">Username :</label>
			    <input name="username" type="text" class="ed-username form-control" id="usrname" value="">
		  	</div>
		  	<div class="form-group">
			    <label for="password">Password :</label>
			    <input name="password" type="password" class="ed-password form-control" id="password">
		  	</div>
		  	<div class="form-group">
			    <label for="email">Email :</label>
			    <input name="email" type="text" class="ed-email form-control" id="email">
		  	</div>
		  	<div class="form-group">
			    <label for="imageUpload">Profile Picture :</label>
			    <input name="profilepic" type="file" class="ed-imageUpload form-control" id="imageUpload">
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

	$('.delete-user').click(function(){
		var id = $(this).closest("tr").children('.id').text();
		$.post(
			'<?=$GLOBALS['ADMIN_ROOT']?>users/delete/',
			{'id':id},
			function(data) {
				window.location.href =  "<?=$GLOBALS['ADMIN_ROOT'];?>users/index/";
			}
		);
	});

	$('.edit-user').click(function(){
		var id = $(this).closest("tr").children('.id').text();
		$.get(
			'<?=$GLOBALS['ADMIN_ROOT']?>users/getinfo/',
			{'id':id},
			function(data) {
				console.log(data);
				$(".ed-username").val(data);
			}
		);
	});

</script>

<?php
	require_once('views/system_footer.php');
	require_once('views/dashboard/content_footer.php');
?>