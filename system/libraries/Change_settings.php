<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_settings {
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('ion_auth');
		$this->ci->load->library('session');
		$this->ci->load->helper('file');
	}
	
	/**
	 * Function change user settings
	 * 
	 * @param string $type
	 * @param string $name
	 * @param string $value
	 * @return string
	 */
	public function change($type, $name="", $value="")
	{
		$id = $this->ci->session->userdata('id');
		$user = $this->ci->ion_auth->get_user($this->ci->session->userdata('user_id'));
		$identity = $this->ci->session->userdata($this->ci->config->item('identity', 'ion_auth'));
		
		switch ($type) {
			case "switch":
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
				$this->ci->ion_auth->update_user($id, $data);
				break;
		
			case "input":
				$data = array(
						$name => $value,
				);
				$this->ci->ion_auth->update_user($id, $data);
				break;
			case "userpic":
				$data = array(
						$name => $value,
				);
				$this->clear_userpic();
				$this->ci->ion_auth->update_user($id, $data);
				break;
		
			case "password":
				$change = $this->ci->ion_auth->change_password($identity, $this->input->post('new'));
				if ($change)
				{ //if the password was successfully changed
					$this->ci->session->set_flashdata('message', $this->ion_auth->messages());
				}
				else
				{
					$this->ci->session->set_flashdata('message', $this->ion_auth->errors());
				}
				break;
		
			default:
				;
				break;
		}
		$messages = $this->ci->ion_auth->messages();
		return $messages;
	}
	public function clear_userpic()
	{
		$id = $this->ci->session->userdata('id');
		$user = $this->ci->ion_auth->get_user($id);
		$userpic = $user->userpic;
		$name = "userpic";
		$value = "default.png";
		$data = array(
				$name => $value,
		);
		$this->ci->ion_auth->update_user($id, $data);
		$path_to_file = "assets/img/userpics/".$userpic;
		
		if ($userpic != $value)
		{
			unlink($path_to_file);
		}
	}
}