<!DOCTYPE html>
<html>
<head>
	<title>Product Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<h3 align="center">Product Registration</h3><br/><br/>
	<form  method="post" enctype="multipart/form-data"  align="center" name="img_form_upload" id="img_form_upload" action = "<?php echo base_url();?>ProductRegistration/addData">
    <div class="form-group">    
    <lable>Product Name:</lable>
    <input type="text" name="product_name" id="product_name" class="form-control"/>
    <span class="text-danger"><?php echo form_error("product_name"); ?></span>
    </div>
    <div class="form-group">
    <lable>Company Id:</lable>
    <input type="text" name="compnay_id" id="compnay_id" class="form-control"/>
    <span class="text-danger"><?php echo form_error("compnay_id"); ?></span>
    </div>
    <div class="form-group">
     <lable>Product Price:</lable>
    <input type="text" name="price_name" id="price_name" class="form-control" />
    <span class="text-danger"><?php echo form_error("price_name"); ?></span>
    </div>
    <div class="form-group">
    <input type="file" name="img_file" id="img_file" align="center" class="form-control">
    <span class="text-danger"><?php echo form_error("img_file"); ?></span>
    </div>
    <input type="submit" value="Registration" name="submit">
    </br>
    </br>
    </br>
    <div id="uploaded_image">
    </div>
</form>
</div>
</body>
</html>
