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
								<div class="btn-group" style="width: 100%;">
								  <button type="button" class="btn btn-danger delete-product" style="width: 50%;">
								  	<i class="fa fa-trash"></i>
								  </button>
								  <button data-toggle="modal" data-target="#editproduct-Modal" type="button" class="btn btn-warning edit-product" style="width: 50%;">
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
	<div class="row">
		<p style="margin-top: 35px;
    color: #3C8DBC;" class="col-xs-8 gadget_text">
			Available Products
		</p>
		<div class="col-xs-4 pull-right">
			<input type="text" value="75" class="dial">
		</div>
	</div>
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
      <div class="modal-body">
        <ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#basic">Basic Settings</a></li>
		  <li><a data-toggle="tab" href="#estore">E-Store Settings</a></li>
		  <li><a data-toggle="tab" href="#warehouse">Warehouse Settings</a></li>
		</ul>

		<div class="tab-content">
		  <div id="basic" class="tab-pane fade in active">
		    <form method="post" style="margin-top:10px;">
		    	<div class="form-group">
				  <label for="prod_name">Product Name:</label>
				  <input type="text" class="form-control" id="prod_name">
				</div>
				<div class="form-group">
				  <label for="price">Price:</label>
				  <input type="text" class="form-control" id="price">
				</div>
				<div class="form-group">
				  <label for="category">Category:</label>
				  <select class="form-control" id="category">
				  	<option>-- Choose a category --</option>
				    <option>Men</option>
				    <option>Women</option>
				    <option>Children</option>
				    <option>Other</option>
				  </select>
				</div>
				<div class="form-group">
				  <label for="type">Type:</label>
				  <select class="form-control" id="type">
				  	<option>-- Choose a type --</option>
				    <option>Clothes</option>
				    <option>Shoes</option>
				    <option>Glasses</option>
				    <option>Underwear</option>
				  </select>
				</div>
				<div class="form-group">
				  <label for="brand">Brand:</label>
				  <select class="form-control" id="brand">
				  	<option>-- Choose a brand --</option>
				    <option>American Eagle</option>
				    <option>Diesel</option>
				    <option>H&M</option>
				    <option>Ralph Lauren</option>
				  </select>
				</div>
		    </form>
		  </div>
		  <div id="estore" class="tab-pane fade">
		    <h3>Menu 1</h3>
		    <p>Some content in menu 1.</p>
		  </div>
		  <div id="warehouse" class="tab-pane fade">
		    <h3>Menu 2</h3>
		    <p>Some content in menu 2.</p>
		  </div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
	        $(".dial").knob({
			    'readOnly':true,
			    'width': 100,
			    'height': 100
			});
	    });
	});
</script>

<?php
	require_once('views/system_footer.php');
	require_once('views/dashboard/content_footer.php');
?>