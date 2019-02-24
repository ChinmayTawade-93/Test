<?php
class ShopingModel extends CI_Model{
	public function getProducts(){
		
		$query = $this->db->get('product');
		return $query->result();

	}
}
?>