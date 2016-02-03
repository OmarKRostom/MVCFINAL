<?php require("views/system_header.php"); ?>
<?php require("views/navbar.php"); ?>
<style type="text/css">
	.center-block {
		height: auto !important;
	}
	.table {
		background-color: transparent !important;
		margin-top: 10px;
		color:#f5f5f5 !important;
	}
	.well {
		background-color: rgba(0,0,0,0.75) !important;
		border-radius: 0px !important;
		box-shadow: none !important;
		border:none !important;
		height:395px;
		padding:14px !important;
	}
	.navbar-toggle:focus,.navbar-toggle:active,.navbar-toggle:hover {
	    background-color: transparent !important;
	}
	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    	border-top: 1px solid #6A6A6A;
    	border-bottom: 1px solid #6A6A6A;
	}
</style>
<div class="home">
	<table width="100%" align="center" height="90%">
		<tbody>
			<tr>
				<td width="100%" valign="middle" align="center">
					<div class="welcome">
						موقع القارئ الشيخ
						<img style="margin-top:20px;max-width:380px;" src="<?=$GLOBALS['LOCAL_ROOT']?>/uploads/images/logo-black.png" class="img-responsive">
						<i class="animated bounce fa fa-angle-down" style="font-size:42px !important;margin-top:20px;"></i>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="container" style="background-color:rgba(255,255,255,0.8);box-shadow:0px 2px 5px 1px #3a3a3a;padding:50px;padding-bottom:0px !important;">
	<div class="who-wrapper">
		<div class="who">
			<div class="row">
				<h2 class="box-title"><i style="margin-left:5px;color:white !important;" class="fa fa-user"></i>من أنا</h2>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<img class="img-sheikh img-responsive" src="<?=$GLOBALS['LOCAL_ROOT'];?>uploads/images/SlnUsuKg.jpg">
				</div>
				<div class="col-sm-8 col-xs-12 pull-right">
					<p class="who_me"><?=$_SESSION['who_phrase'];?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="theblog">
		<div class="row">
			<h2 class="box-title"><i style="margin-left:5px;    color: white !important;
" class="fa fa-rss"></i>المدونة</h2>
		</div>
		<div class="row">
		  <?php
		  	foreach($posts as $post) {
		  		?>
		  			<div class="col-sm-3 col-xs-12 pull-right">
					    <div class="thumbnail singlePost">
					      <div id="<?=$post->id;?>" class="caption">
					        <h3 style="direction:rtl;"><?=$post->title;?></h3>
					        <div class="brief"><?php
					        	if($post->brief=='') echo "لا يوجد نبذة لهذا الموضوع.";
					        	else echo $post->brief;
					        ?></div>
					        <div style="width:100%;margin-top:20px;" class="btn-group">
					        	<button style="width:50%;" data-toggle="modal" data-target="#viewArticle" class="btn btn-success viewArticle"><i style="margin-right:5px;" class="fa fa-eye"></i><span class="hidden-xs">المزيد</span></button>
					        	<button style="width:50%;" class="btn btn-warning"><i style="margin-right:5px;" class="fa fa-share"></i><span class="hidden-xs">مشاركة</span></button>
					        </div>
					      </div>
						</div>
					</div>
		  		<?php
		  	}
		  ?>
		</div>
	</div>
	<div class="thesoundplayer">
		
		  <div class="row">
		  	<h2 class="box-title"><i style="margin-left:5px;color:white !important;" class="fa fa-headphones"></i>الصوتيات</h2>
		  </div>
		  <div class="row">
			<div class="col-sm-6 col-xs-12 lsidePlayer">
			    <audio controls class="theplayer"
			      data-info-album-art="<?=$GLOBALS['LOCAL_ROOT'];?>/uploads/albumarts/56992337b560c7.71868180.jpg"
			      data-info-album-title="8874"
			      data-info-artist="حاتم فريد الواعر"
			      data-info-title="سورة الفاتحة"
			      data-info-label="Independent"
			      data-info-year="2016"
			      data-info-att-link="https://github.com/iainhouston">
			      <source class="player_source" src="<?=$GLOBALS['LOCAL_ROOT'];?>/uploads/sounds/56992337b561a6.49378282.mp3" type="audio/mpeg"/>
			       
			    </audio>
		  	</div><!-- /row -->
			  <div class="col-sm-6 col-xs-12 rsidePlayer">
			  	<div class="playlist" data-mcs-theme="dark">
			  		<?php
			  			foreach($sounds as $key=>$sound) {
			  				?>
			  					<div class="soundlist <?php if($key==0) echo "soundlist-active";?>" id="<?=$sound->id;?>">
			  						<p style="float:right;"><?=$sound->name;?></p>
			  						<div class="btn-group">
			  							<a class="btn btn-warning" href="<?=$sound->soundcloud;?>"><i style="margin-right:5px;" class="fa fa-soundcloud"></i>ساوند كلاود</a>
			  							<a class="btn btn-success" target="_blank" href="<?=$GLOBALS['LOCAL_ROOT'];?>uploads/sounds/<?=$sound->audiofile;?>"><i style="margin-right:5px;" class="fa fa-download"></i>تحميل</a>
			  						</div>
			  					</div>
			  				<?php
			  			}
			  		?>
			  	</div>
			  </div>
		  </div>
		  
	</div>
	<div class="newsletter">
		<div class="row">
	  		<h2 class="box-title" style="width:280px;"><i style="margin-left:5px;color:white !important;" class="fa fa-newspaper-o"></i>المجلة الاخبارية</h2>
	  	</div>
	  	<div class="row">
	  		<form method="post" class="newsForm">
	  			<div class="form-group col-sm-4 col-xs-12">
	  				<label for="email">البريد الاكتروني</label>
	  				<input name="email" class="form-control email">
	  			</div>
	  			<div class="form-group col-sm-4 col-xs-12">
	  				<label for="first_name">الاسم الاول</label>
	  				<input name="name" class="form-control first_name">
	  			</div>
	  			<div class="form-group col-sm-4 col-xs-12">
	  				<label for="last_name">الاسم الاخير</label>
	  				<input name="name" class="form-control last_name">
	  			</div>
	  			<button type="button" class="btn btn-success newsletterSubmit">اشترك</button>
	  		</form>
	  	</div>
	</div>

	<!-- Modal -->
	<div id="viewArticle" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        <p></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="pull-left btn btn-warning" data-dismiss="modal">إغلاق</button>
	      </div>
	    </div>

	  </div>
	</div>
	<div class="about">
		<div class="row">
	  		<h2 class="box-title"><i style="margin-left:5px;color:white !important;" class="fa fa-info-circle"></i>حول</h2>
	  	</div>
	  	<div class="row" style="margin-top:15px;">
			<div style="text-align:center;font-family: 'Droid Arabic Kufi', sans-serif;font-size:18px;" class="col-sm-4 col-xs-12">
				<p style="font-weight:bold;">للتواصل معنا</p>
				<div style="font-family: 'Raleway', sans-serif !important;">info@hatemfarid.com<i style="margin-left:5px;" class="fa fa-envelope"></i></div>
				<div style="font-family: 'Raleway', sans-serif !important;">+20 111 444 6677<i style="margin-left:5px;" class="fa fa-phone-square"></i></div>
				<ul class="social-footer"  style="        width: 230px;
    margin: 0px auto;
    margin-top: 15px;
">
					<li class="fb"><a  href=""><i class="fa fa-facebook"></i></a></li>
					<li class="tw"><a  href=""><i class="fa fa-twitter"></i></a></li>
					<li class="sc"><a  href=""><i class="fa fa-soundcloud"></i></a></li>
				</ul>
			</div>
			<div style="text-align:center;font-family: 'Droid Arabic Kufi', sans-serif;" class="mfoot col-sm-4 col-xs-12">
				هذا الموقع صدقة جارية وهو الموقع الرسمي والوحيد للشيخ حاتم فريد.
				جميع حقوق النشر محفوظة
				2015-2016
			</div>
			<div style="text-align:center;font-family: 'Droid Arabic Kufi', sans-serif;font-size:18px; " class="rfoot col-sm-4 col-xs-12">
				إدارة وتطوير فريق
				<p style="margin-bottom:0px;font-weight:bold;">هالكون</p>
				<p style="font-size:14px;">لخدمات الويب وتطبيقات الموبايل</p>
				<ul class="social-footer"  style="        width: 195px;
    margin: 0px auto;
    margin-top: 5px;
">
					<li class="fb"><a  href=""><i class="fa fa-facebook"></i></a></li>
					<li class="tw"><a  href=""><i class="fa fa-twitter"></i></a></li>
				</ul>
			</div>
			<div style="z-index:-10;" class="col-xs-12 masjid hidden-xs">
				<img class="img-responsive" src="<?=$GLOBALS['LOCAL_ROOT']?>/uploads/images/footer_masjid.png">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(".soundlist").click(function(){
		var id = $(this).attr("id");
		$('.mCSB_container').children().removeClass("soundlist-active");
		$(this).addClass("soundlist-active");
		$.get('<?=$GLOBALS['LOCAL_ROOT'];?>main/getsound/',{id:id},function( data ) {
		  data = data.trim();
		  var jsonObj = $.parseJSON(data);
		  $(".albumartimg").attr("src","<?=$GLOBALS['LOCAL_ROOT']?>uploads/albumarts/"+jsonObj.albumart);
		  var audio = $(".theplayer");    
	      $(".player_source").attr("src", "<?=$GLOBALS['LOCAL_ROOT'];?>/uploads/sounds/"+jsonObj.audiofile);
	      $('table').find('tr td')[2].innerHTML = jsonObj.name;
	      $('table').find('tr td')[3].innerHTML = jsonObj.year;
	      audio.load();		  
		});
	});
	$(".viewArticle").click(function(){
		var id = $(this).closest(".caption").attr("id");
		$.get('<?=$GLOBALS['LOCAL_ROOT'];?>postsFront/getpost/',{id:id},function( data ) {
		  data = data.trim();
		  var jsonObj = $.parseJSON(data);
		  $(".modal-header").html(jsonObj.title);
		  $(".modal-body").html(jsonObj.content);
		});

	});
</script>
<?php require("views/system_footer.php"); ?>

