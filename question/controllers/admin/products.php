<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller
{
	
		public function __construct()
		{
			
			parent::__construct();
			$this->load->model('Products_model');
			
			if( !$this->session->userdata('is_logged_in') )
			{
				redirect(base_url().'admin/login');	
			}
		}
		
		
		function index(  )
		{
			$data['message'] = "";
			$data['products'] = $this->Products_model->getAllProducts();
			$this->load->view('admin/products', $data);
		}
		
		function addProduct()
		{
			$this->load->view('admin/addproduct');
			
		}
		
		function saveProduct()
		{
			$row['ProductName'] 	 = $this->input->post('ProductName');
			$row['ProductPrice'] 	 = $this->input->post('ProductPrice');
			$row['ShortDescription'] = $this->input->post('ShortDescription');
			
			$res = $this->Products_model->addProduct($row);
			if ( $res > 0 )
			{
				$data['message'] = " Product saved.";
			}
			else{
				$data['message'] = "Product not saved.";
			}
			
			$data['products'] = $this->Products_model->getAllProducts();
			$this->load->view('admin/products', $data);
		}
		
		function edit($product_id)
		{
			$row = $this->Products_model->getProduct($product_id);
			$this->load->view('admin/editproduct', $row[0] );
		}
	
		function updateProduct()
		{
			$row['ProductName'] 	 = $this->input->post('ProductName');
			$row['ProductPrice'] 	 = $this->input->post('ProductPrice');
			$row['ShortDescription'] = $this->input->post('ShortDescription');
			$row['product_id'] 		 = $this->input->post('Id');
			
			$res = $this->Products_model->updateProduct($row);
			if ( $res > 0 ) 
			{
				$data['message'] = " Product updated. ";
			}
			else{
				$data['message'] = "Product not updated.";
			}
			
			$data['products'] = $this->Products_model->getAllProducts();
			$this->load->view('admin/products', $data);
		}

}
?>