<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
			  //  $this->load->library("pagination");
		$this->load->model('brand_model', 'brand');	

	}

	public function index()
	{
		
	
		$this->template->load('index', 'content', 'home');


	}
	public function get_home_categories(){
		 //$data['category'] = $this->input->post('category'); 
		 //
 		//$json= json_encode($data);
 		//$obj = json_decode($json);
		//$category_id= $obj->category;
		//echo $category_id;
		//return $category_id;
		 $category_id= $this->input->post('category'); 

 	     echo json_encode($this->product->get_new($category_id)); //new 
 	 //  $obj = json_decode($id);
		//$category_id= $obj->category;
 		//var_dump($obj);
 		//$products = json_decode(json_encode($this->product->get_new($category_id)), true);
 		//var_dump($products);

	}

}
