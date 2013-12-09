<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('ion_auth');
	}
	
	/**
	 * Changing user settings
	 *
	 * @param session_id $who
	 * @param settings_name $where
	 * @param value $what
	 */
	public function change($type)
	{

		$id = $this->session->userdata('id');
		$user = $this->ion_auth->get_user($this->session->userdata('user_id'));
		$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

		switch ($type) {
			case "switch":
				$value = $this->input->post('value');
				$name = $this->input->post('name');

				if ($value == "true")
				{
					$value = 1;
				} else 
				{
					$value = 0;
				}
				$data = array(
						$name => $value,
				); 
				$this->ion_auth->update_user($id, $data);
			break;
			
			case "input":
				$value = $this->input->post('value');
				$name = $this->input->post('name');
				$data = array(
						$name => $value,
				);
				$this->ion_auth->update_user($id, $data);
			break;
			
			case "password":
				$change = $this->ion_auth->change_password($identity, $this->input->post('new'));
				if ($change)
				{ //if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
			break;
			
			default:
				;
			break;
		}
		$messages = $this->ion_auth->messages();
		echo $messages;
	}
		
	public function get()
	{
		$id = $this->session->userdata('id');
		$user = $this->ion_auth->get_user();
	    echo json_encode($user);
	}
}