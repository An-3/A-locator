<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
	}
	
	public function index()
	{
		$user = $this->ion_auth->get_user();
		$this->load->view('home_view', $user);
	}
}