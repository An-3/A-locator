<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('change_settings');
		$this->load->library('session');
	}
	
	/**
	 * Changing user settings
	 *
	 * @param session_id $who
	 * @param settings_name $where
	 * @param value $what
	 */

		
	public function get()
	{
		$id = $this->session->userdata('id');
		$user = $this->ion_auth->get_user();
		echo json_encode($user);
	}
	
	public function change($type)
	{	
		$value = $this->input->post('value');
		$name = $this->input->post('name');
		echo $this->change_settings->change($type, $name, $value);
	}
	
	public function clear_userpic()
	{
		echo $this->change_settings->clear_userpic();
	}
	
	
}