<?php
	require_once('views/system_header.php');
	require_once('views/dashboard/content_header.php');
?>

<div class="row">
<div class="col-xs-12">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">General Settings</h3>
	  </div>
	  <div class="panel-body">
	    <form method="post" class="settingsform">
	    	<div class="checkbox">
			  <label><input type="checkbox" value="">Enable Maintainance Mode</label>
			</div>
			<div class="form-group">
			  <label for="tabname">Tab name:</label>
			  <input name="tabname" type="text" class="form-control" id="tabname" value="<?=$_SESSION['website_title'];?>">
			</div>
			<div class="form-group">
			  <label for="who_me">Who am I:</label>
			  <textarea rows="10" name="who_me" type="text" class="form-control" id="who_me"><?=$_SESSION['who_phrase'];?></textarea>
			</div>
			<div class="form-group">
				<img class="img-responsive" style="max-width: 200px;margin: 0px auto;" src="<?=$GLOBALS['LOCAL_ROOT'];?>uploads/images/<?=$_SESSION['website_logo'];?>">
			    <label for="imageUpload">Website Logo :</label>
			    <input name="websitelogo" type="file" class="form-control website_logo" id="imageUpload">
		  	</div>
		  	<div class="form-group">
			    <label for="colortheme">Color Theme :</label>
			  	<select name="colortheme" id="colortheme" class="selectpicker">
			  		<option>Black</option>
			  		<option>Cyan</option>
			  		<option>Purple</option>
			  		<option>Red</option>
			  		<option>Gold</option>
			  	</select>
		  	</div>
		  	<div class="form-group">
			    <label for="dashlanguage">Dashboard Language :</label>
			  	<select name="dashlanguage" id="dashlanguage" class="selectpicker">
			  		<option>English</option>
			  		<option>العربية</option>
			  	</select>
		  	</div>
		  	<div class="form-group">
			    <label for="websitelanguage">Website Default Language :</label>
			  	<select name="websitelanguage" id="websitelanguage" class="selectpicker">
			  		<option>English</option>
			  		<option>العربية</option>
			  	</select>
		  	</div>
		  	<button type="button" style="width:100%;" class="updatesettings btn btn-success"><i style="margin-right:10px;" class="fa fa-save"></i><span>Save &amp; Submit</span></button>		
	    </form>
	  </div>
	</div>
</div>
</div>

<script type="text/javascript">
	$('.updatesettings').click(function(){
		var formData = new FormData($('.settingsform')[0]);
		$.ajax({
			type: 'POST',
			url: '<?=$GLOBALS['ADMIN_ROOT']?>settings/updatesettings/',
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
</script>

<?php
	require_once('views/system_footer.php');
	require_once('views/dashboard/content_footer.php');
?>
