<?php
	require_once('views/system_header.php');
	require_once('views/dashboard/content_header.php');
?>

<!--CONTENT GOES HERE -->
<h1 class="headtitle"><i style="margin-right: 10px;" class="fa fa-shopping-cart"></i>Products</h1>
<div class="col-sm-9 col-xs-12">
	<table class="table table-bordered tablebox">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Category</th>
				<th>Price</th>
				<th>Delete/Modify</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($all_products as $product) {
					?>
						<tr>
							<th class="id"><?=$product->id;?></th>
							<th class="name"><?=$product->name;?></th>
							<th class="category"><?=$product->category;?></th>
							<th class="category"><?=$product->price;?></th>
							<th style="padding: 0;">
								<div class="btn-group" style="width: 100%;height:100%;">
								  <button type="button" class="btn btn-danger delete-product" style="width: 50%;height:100%;">
								  	<i class="fa fa-trash"></i>
								  </button>
								  <button data-toggle="modal" data-target="#editproduct-Modal" type="button" class="btn btn-warning edit-product" style="width: 50%;height:100%;">
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
			<input type="text" name="product_name" class="form-control search_product_text" placeholder="Search By Product Name...">
			<span class="input-group-btn">
			<button type="submit" id="search-btn" class="btn btn-flat search-product"><i class="fa fa-search"></i></button>
		</span>
	</div>
	</form>
	<button data-toggle="modal" data-target="#addproduct_Modal" style="width:100%;" class="btn btn-success"><i style="margin-right:10px;" class="fa fa-cart-plus"></i><span>Add product</span></button>
</div>

<div id="addproduct_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a product</h4>
      </div>
      <div class="success-msg alert-success" style="padding: 10px;display:none;">
		   Product registered successfully.   
		</div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#basic">Basic Settings</a></li>
		  <li><a data-toggle="tab" href="#estore">E-Store Settings</a></li>
		  <li><a data-toggle="tab" href="#warehouse">Warehouse Settings</a></li>
		</ul>

		<div class="tab-content">
		  <div id="basic" class="tab-pane fade in active">
		    <form method="post" class="form1" action="<?$GLOBALS['ADMIN_ROOT']?>products/add">
		    	<div class="form-group">
				  <label for="name">Product Name:</label>
				  <input name="product_name" type="text" class="form-control prod_name" id="prod_name">
				</div>
				<div class="form-group">
				  <label for="price">Price:</label>
				  <input name="price" type="text" class="form-control prod_price" id="price">
				</div>
				<div class="form-group">
				  <label for="category">Category:</label>
				  <select name="category" class="form-control prod_category" id="category">
				  	<?php
						DB::getInstance()->fillInput("categories","en_name");
					?>
				  </select>
				</div>
				<div class="form-group">
				  <label for="brand">Brand:</label>
				  <select name="brand" class="form-control prod_brand" id="brand">
				  	<?php
						DB::getInstance()->fillInput("brands","en_name");
					?>
				  </select>
				</div>
		    </form>
		  </div>
		  <div id="estore" class="tab-pane fade">
		    <form action="" class="gallery_images form2" enctype="multipart/form-data">
	    		<div class="form-group">
	    			<label for="images">Gallery Images:</label>
			    	<input name="images[]" type="file" class="images"  multiple="multiple" />
	    		</div>
	    		<div class="form-group">
	    			<label for="description">Description:</label>
	    			<textarea name="description" rows="6" class="description form-control"></textarea>
	    		</div>
			</form>
		  </div>
		  <div id="warehouse" class="tab-pane fade">
		    <form method="post" class="form3">
		    	<div class="form-group">
				  <label for="quantity">Quantity:</label>
				  <input type="text" class="form-control prod_quantity" id="quantity" name="quantity">
				</div>
				<div class="form-group">
				  <label for="discount">Discount:</label>
				  <input type="text" class="form-control prod_discount" id="discount" name="discount">
				</div>
				<div class="form-group">
					
				</div>
		    </form>
		  </div>
		</div>
      </div>
      <div class="modal-footer">
        <div class="btn-group" style="width:100%;">
        	<button style="width:65%;" type="button" class="btn btn-success confirm-add">Submit</button>
        	<button style="width:35%;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
	$('.confirm-add').click(function(){
		var formData2 = new FormData($('.form2')[0]);
		formData2.append("prod_name",$('.prod_name').val());
		formData2.append("prod_price",$('.prod_price').val());
		formData2.append("prod_brand",$('.prod_brand').val());
		formData2.append("prod_category",$('.prod_category').val());
		formData2.append("prod_quantity",$('.prod_quantity').val());
		formData2.append("prod_discount",$('.prod_discount').val());
		$.ajax({
			type: 'POST',
			url: '<?=$GLOBALS['ADMIN_ROOT']?>products/add/',
			async: false,
			data: formData2,
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
		$(".images").fileinput({
			showPreview: false,
			maxFileCount: 10,
        	allowedFileExtensions: ["jpg", "jpeg", "png"]
		});
		$("#discount").ionRangeSlider({
			min: 0,
			max: 100,
			step: 1
		});
	});
</script>

<?php
	require_once('views/system_footer.php');
	require_once('views/dashboard/content_footer.php');
?>