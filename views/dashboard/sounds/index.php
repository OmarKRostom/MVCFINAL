<?php
	require_once('views/system_header.php');
	require_once('views/dashboard/content_header.php');
?>


<!--CONTENT GOES HERE -->
<h1 class="headtitle"><i style="margin-right: 10px;" class="fa fa-music"></i>Sounds</h1>
<div class="col-sm-9 col-xs-12 nopads">
	<table class="table table-bordered tablebox" style="word-break:break-word;">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Year</th>
				<th>AlbumArt</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($all_sounds as $sound) {
					?>
						<tr>
							<th class="id"><?=$sound->id;?></th>
							<th class="name"><?=$sound->name;?></th>
							<th class="year"><?=$sound->year;?></th>
							<th class="albumart"><?php
								if($sound->albumart!='') {
									?>
										<center><img style="width:100px;" src="<?=$GLOBALS['LOCAL_ROOT'];?>uploads/albumarts/<?=$sound->albumart;?>"></center>
									<?php
								}
							?></th>
							<th style="padding: 0;">
								<div class="btn-group" style="width: 100%;height:100%;">
								  <button type="button" class="btn btn-danger delete-sound" style="width: 100%;height:100%;">
								  	<i class="fa fa-trash"></i>
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
			<input type="text" name="sound_name" class="form-control search_sound_text" placeholder="Search By sound Name...">
			<span class="input-group-btn">
			<button type="submit" id="search-btn" class="btn btn-flat search-sound"><i class="fa fa-search"></i></button>
		</span>
	</div>
	</form>
	<button data-toggle="modal" data-target="#addsound_Modal" style="width:100%;" class="btn btn-success"><i style="margin-right:10px;" class="fa fa-cart-plus"></i><span>Add sound</span></button>
	
</div>

<div class="row pages">
	<div class="col-xs-9">
		<?php	
			while($num_pages > 0) {
				?>
					<a class="<?php if($indexer===intval(end(explode('/',$_GET['url'])))) echo'pagesactive';?>" href="<?=$indexer;?>"><?=$indexer++;?></a>
				<?php
				$num_pages--;
			}
		?>
	</div>
</div>

<div id="addsound_Modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add sound</h4>
			</div>
			<div class="success-msg alert-success" style="padding: 10px;display:none;">
		   		Sound added successfully.   
			</div>
			<div class="modal-body">
				<form method="post" class="soundsForm">
					<div class="form-group">
						<label for="track-title">Track Title:</label>
						<input name="track-title" class="track-title form-control">
					</div>
					<div class="form-group">
						<label for="track-year">Track Year:</label>
						<input name="track-year" class="track-year form-control">
					</div>	
					<div class="form-group">
						<label for="soundcloud">Soundcloud Link:</label>
						<input name="soundcloud" class="soundcloud form-control">
					</div>
					<div class="form-group">
						<label for="track-albumart">Album Art:</label>
						<input type="file" name="track-albumart" class="track-albumart form-control">
					</div>
					<div class="form-group">
						<label for="track-soundsfile">Sound File: "Mp3, Ogg and Flac"</label>
						<input type="file" name="track-soundsfile" class="track-soundsfile form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="btn-group" style="width:100%;">
		        	<button style="width:65%;" type="button" class="btn btn-success add-Sound">Submit</button>
		        	<button style="width:35%;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(".add-Sound").click(function(){
		var formData = new FormData($('.soundsForm')[0]);
		$.ajax({
			type: 'POST',
			url: '<?=$GLOBALS['ADMIN_ROOT']?>sounds/uploadSound/',
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
	$('.delete-sound').click(function(){
		var id = $(this).closest("tr").children('.id').text();
		swal({
			title: "Are you sure you want to delete this sound ?",
			text: "This is an irreversible action!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonTet: "Yes, delete it!",
			closeOnConfirm: false

		},function() {
			$.post(
			'<?=$GLOBALS['ADMIN_ROOT']?>sounds/delete/',
			{'id':id},
			function(data) {
				swal({
					title: "Sound deleted successfully.",
					type: "success"
				},function(){
					window.location.href =  "<?=$GLOBALS['ADMIN_ROOT'];?>users/index/";
				})
			}
			);	
		});
	});
</script>

<?php
	require_once('views/system_footer.php');
	require_once('views/dashboard/content_footer.php');
?>
