<?php
class ProductRegistration extends CI_Controller{
	public function index()
	{
		
		$this->load->view('Registration');
	}
	public function callback_file_check()
	{
		var_dump('here i am');
		exit;
		$allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['img_file']['name']);
        if(isset($_FILES['img_file']['name']) && $_FILES['img_file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('img_file', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('img_file', 'Please choose a file to upload.');
            return false;
        }

	}
	public function addData()
	{
		$product_name = $_POST['product_name'];
		$company_id = $_POST['compnay_id'];
		$price = $_POST['price_name'];
		
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('compnay_id', 'Company Id', 'required|numeric');
        $this->form_validation->set_rules('price_name', 'Price', 'required|numeric');
        $this->form_validation->set_rules('img_file', '', 'callback_file_check');
        if($this->form_validation->run() == FALSE)
        {
        	$this->load->view('Registration');
        }
        else
        {
			/*if(isset($_FILES['img_file']['name']))
			{
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('img_file'))
				{
					//echo $this->upload->display_errors();
					 $this->form_validation->set_message('img_file', $data['error'] = $this->upload->display_errors());
				}
				else
				{
				
    				$data = $this->upload->data();
				    echo '<img src="'.base_url().'/upload/'.$data['file_name'].'">';
                
				
				}
			}*/
		}	
	}
}
?>