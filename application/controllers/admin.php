<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $user;
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->library('invitation');
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
	
	public function create_invites() {
		$users = $this->input->post('users');
		$number = $this->input->post('number');
		if (!$users) 
		{
			echo "Выберите, пожалуйста, пользователей";
		} elseif ($number == 0) {
			echo "Выберите, пожалуйста, количество";
		}
		else {
			header('Content-Type: application/json');
			  
			  $arr = $this->invitation->create_invites($users, $number);
			  $array = array(
			  	'19' => array('1' => 'sdsdsd', '2' => 'swdesdsd'),
			  	'fruit' => 'apple'
				);
			echo json_encode($arr);
		}
	}
}