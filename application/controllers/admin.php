<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $user;
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->user = $this->ion_auth->get_user();		
	}
	
	public function index()
	{
		$this->load->view('admin/admin_view', $this->user);
	}
	
	
	public function invites()
	{
		//get users
		$data = array(
	        'users' => $this->ion_auth->get_users_array('members', null, null)
	    );
		$this->load->view('admin/admin_view', $this->user);
		$this->load->view('admin/invites_view', $data);
	}
}