<!DOCTYPE>
<html>
<head>
	<title>Shoping Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
<br/><br/>
<div class="col-lg-6 col-md-6">
    <marquee behavior="alternate" direction="up" width="80%"><marquee direction="right">Welcom to Chinmay Shopping Center</marquee></marquee>
    <div class="table-responsive">
        <h4 align="center">Products List</h4></br></br>
        <?php
            foreach($products as $row){
            echo '<div class="col-md-4" align="center" style="padding:16px; background-color: #f1f1f1; height: 400px; margin-bottom: 16px; border:1px solid #ccc;">
                <img src="http://localhost/shoping_cart/upload/'.$row->product_image.'" class="img-thumbnail"/><br/>
                <h4>'.$row->product_name.'</h4>
                <h3 class="text-danger">'.$row->product_price.'</h3>
                <input type="text" name="'.$row->product_id.'" id="'.$row->product_id.'" size="10"/></br></br>
                <button type="button" name = "add-cart" class="btn btn-success add-cart" data-productname="'.$row->product_name.'" data-price="'.$row->product_price.'" data-productid="'.$row->product_id.'">Add Cart</button>
            </div>';
        }
        ?>
    </div>
</div>
<div class="col-lg-6 col-md-6">
     <marquee behavior="alternate" direction="up" width="80%"><marquee direction="left">Enjoy Shopping</marquee></marquee>
    <div id="card_details">
        <h4 align="center">Card is Empty</h4>
    </div>
</div>
</div>
</body>
</html>
<script>

$(document).ready(function(){

    $('.add-cart').click(function() {
            
            var product_name = $(this).attr('data-productname');
            var product_price = $(this).attr('data-price');
            var product_id = $(this).attr('data-productid');
            var quantity = $('#' + product_id).val();

            if(quantity != "" && quantity > 0)
            {
                $.ajax({
                    url:"<?php echo base_url();?>Shoping_cart/addProducts",
                    data:{product_name:product_name,product_price:product_price,product_id:product_id,quantity:quantity},
                    method:"POST",
                    success:function(data)
                    {
                        alert('Item is added');
                        $('#' + product_id).val("");
                        $('#card_details').html(data);
                    }   
                });
            }
            else
            {
                alert('Enter quantity ');
            }
        });

    $('#card_details').load("<?php echo base_url();?>Shoping_cart/load");

    $(document).on("click",".remove-item",function() {
        var row_id = $(this).attr('id');
        if(confirm('Are you want to remove item'))
        {
            $.ajax({
                    url:"<?php echo base_url();?>Shoping_cart/removeItem",
                    data:{row_id:row_id},
                    method:"POST",
                    success:function(data)
                    {
                        alert('Item is remove successfully');
                        $('#card_details').html(data);
                    }   
                });
        }
        else
        {
            return false;
        }
    });

    $(document).on("click","#clear-cart",function() {
        if(confirm('Are you want to clear cart'))
        {
            $.ajax({
                    url:"<?php echo base_url();?>Shoping_cart/clear",
                    success:function(data)
                    {
                        alert('cart clear successfully');
                        $('#card_details').html(data);
                    }   
                });
        }
        else
        {
            return false;
        }
    });
});
</script>
    