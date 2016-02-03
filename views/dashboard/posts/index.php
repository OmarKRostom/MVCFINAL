<?php
	require_once('views/system_header.php');
	require_once('views/dashboard/content_header.php');
?>

<h1 class="headtitle"><i style="margin-right: 10px;" class="fa fa-sticky-note"></i>Posts</h1>
<div class="col-sm-9 col-xs-12 nopads">
	<table class="table table-bordered tablebox" style="word-break:break-word;">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Likes</th>
				<th>Date Added</th>
				<th>Delete/Modify</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($all_posts as $post) {
					?>
						<tr>
							<th class="id"><?=$post->id;?></th>
							<th class="title"><?=$post->title;?></th>
							<th class="likes"><?=$post->likes;?></th>
							<th class="date"><?=$post->date;?></th>
							<th style="padding: 0;">
								<div class="btn-group" style="width: 100%;height:100%;">
								  <button type="button" class="btn btn-danger delete-post" style="width: 50%;height:100%;">
								  	<i class="fa fa-trash"></i>
								  </button>
								  <button data-toggle="modal" data-target="#editproduct-Modal" type="button" class="btn btn-warning edit-post" style="width: 50%;height:100%;">
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
			<input type="text" name="post_name" class="form-control search_post_text" placeholder="Search By Post Title...">
			<span class="input-group-btn">
			<button type="submit" id="search-btn" class="btn btn-flat search-post"><i class="fa fa-search"></i></button>
		</span>
	</div>
	</form>
	<button data-toggle="modal" data-target="#addPost_modal" style="width:100%;" class="btn btn-success"><i style="margin-right:10px;" class="fa fa-sticky-note"></i><span>Add post</span></button>
</div>

<div role="dialog" class="modal fade" id="addPost_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add a post</h4>
			</div>
			<div class="success-msg alert-success" style="padding: 10px;display:none;">
		   		Post added successfully.   
			</div>
			<div class="modal-body">
				<form method="post" class="post-form">
					<div class="form-group">
						<label for="post_title">Post Title:</label>
						<input class="post_title form-control" type="text" name="post_title">
					</div>
					<div class="form-group">
						<label for="post_brief">Post Brief "Max-Length(250)":</label>
						<textarea name="post_brief" class="form-control" type="text" rows="5" maxlength="250"></textarea>
					</div>
					<div class="form-group">
						<label for="post_content">Post Content:</label>
						<div class="summernote post_content">

						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="btn-group" style="width:100%;">
		        	<button style="width:65%;" type="button" class="btn btn-success confirm-addpost">Submit</button>
		        	<button style="width:35%;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.confirm-addpost').click(function(){
		var formData = new FormData($('.post-form')[0]);
		var content = $('.note-editable').html();
		formData.append("content",content);
		$.ajax({
			type: 'post',
			url: '<?=$GLOBALS['ADMIN_ROOT']?>posts/add/',
			async: false,
			data: formData,
			success: function() {
				$('.success-msg').show();
			},
			cache: false,
			contentType: false,
			processData: false
		});
	});
	$('.delete-post').click(function(){
		var id = $(this).closest("tr").children(".id").text();
		swal({
			title: "Are you sure you want to delete this post ?",
			text: "This is an irreversible action!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonTet: "Yes, delete it!",
			closeOnConfirm: false

		},function() {
			$.post(
			'<?=$GLOBALS['ADMIN_ROOT']?>posts/delete/',
			{'id':id},
			function(data) {
				swal({
					title: "Post deleted successfully.",
					type: "success"
				},function(){
					window.location.href =  "<?=$GLOBALS['ADMIN_ROOT'];?>posts/index/";
				})
			}
			);	
		});
	})
</script>

<?php
	require_once('views/dashboard/content_footer.php');
	require_once('views/system_footer.php');
?>