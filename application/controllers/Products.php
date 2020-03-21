<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();

	}

	public function index()
	{
		$this->get_main_categories();
	}

	public function get_home_categories(){
		 $data['category'] = $this->input->post('category'); 
 		$json= json_encode($data);
 		$obj = json_decode($json);
//echo $obj->category;
 	return $this->product->get_new($obj->category); //new 
	}

	public function get_new_products($id='')

	{
		//$id=$this->uri->segment(3);
	 $category = $this->input->post('category'); 

		$data['new_products'] = $this->product->get_new($category);
		
		$this->template->load('index', 'content', 'home', $data);


	}
	

}