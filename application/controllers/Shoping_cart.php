<?php
class Shoping_cart extends CI_Controller{
	public function index()
	{
		$this->load->model('ShopingModel');
		$data['products'] = $this->ShopingModel->getProducts();
		$this->load->view('ShopingView',$data);
	}
	public function addProducts()
	{
		$this->load->library('cart');
		$data = array(
				"id" => $_POST['product_id'],
				"name" => $_POST['product_name'],
				"qty" => $_POST['quantity'],
				"price" => $_POST['product_price']
				);

    $this->cart->insert($data);
    echo $this->viewItems();

	}
	public function viewItems()
	{
		$this->load->library('cart');
		$output = '';
		$output.='<h4> Your Shopping Cart</h4><br/>
		<div class="table-responsive">
		<div align="right">
		<button type="button" id="clear-cart" class="btn btn-warning">Clear Cart</button>
		</div><br/>
		<table class="table table-bordered">
		<tr>
		<th width="15%">Name</th>
		<th width="15%">Quantity</th>
		<th width="15%">Price</th>
		<th width="15%">Total</th>
		<th width="15%">Action</th>
		</tr>';
		$count = 0;
		foreach ($this->cart->contents() as $item ) {
			$count = $count + 1;
			$output.='<tr>
			<td>'.$item['name'].'</td>
			<td>'.$item['qty'].'</td>
			<td>'.$item['price'].'</td>
			<td>'.$item['subtotal'].'</td>
			<td><button type="button" id="'.$item['rowid'].'"  name="'.$item['rowid'].'" class="btn btn-danger remove-item ">Remove</button></td>
			</tr>';
		}
		$output .='
		<tr>
		<td align="right" colspan="4">Total</td>
		<td>'.$this->cart->total().'</td>
		</tr>
		</table>
		</div>';
		if($count <= 0)
		{
			$output = '<h4 align="center">Cart is Empty</h4>';
		}
		return $output;
	}
	public function removeItem()
	{
		$this->load->library('cart');
		$rowid = $_POST['row_id'];
		$data = array(
				'rowid' => $rowid,
				'qty' => 0
						);
		$this->cart->update($data);
		 echo $this->viewItems();

	}
	public function clear()
	{
		$this->load->library('cart');
		$this->cart->destroy();
		echo $this->viewItems();
	}
	public function load()
	{
		echo $this->viewItems();
	}
}
?>