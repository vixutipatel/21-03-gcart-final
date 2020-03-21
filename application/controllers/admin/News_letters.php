<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_letters extends Frontend_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('newsletter_model', 'news_letters');

	}

	/**
	 * Loads the admin dashboard
	 */
	public function index()
	{
		$email = $this->input->post('email');
		$data = array(
			'email' => $this->input->post('email')
		);
		$inserts = $this->news_letters->insert($data);
		//if ($inserts)
		//{
		//	set_alert('success', 'Your are subscription successfully. ');
		//	redirect();	
		//}
		log_activity("User trying to subscribe  In [Email: $email]");
		echo json_encode($email);
	}
	/**
	 * Checks if subscriber with provided email id exists or not
	 * @return [type] [description]
	 */
	public function email_exists()
	{
		$exists = $this->news_letters->count_by('email', $this->input->post('email'));
		$exists=1;
		echo json_encode($exists);

		//echo $exists;
	}

}
