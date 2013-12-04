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
		$value = $this->input->post('value');
		$name = $this->input->post('name');
		
		switch ($type) {
			case "switch":
				if ($value == "true")
				{
					$value = 1;
				} else 
				{
					$value = 0;
				}
			break;
			
			case "input":
				;
			break;
			
			default:
				;
			break;
		}


		$data = array(
				$name => $value,
		);
		
		$id = $this->session->userdata('id');
		$this->ion_auth->update_user($id, $data);
		$messages = $this->ion_auth->messages();
		echo $messages;
	}
	
	public function chane_input()
	{
		
	}
	
	public function get()
	{
		$id = $this->session->userdata('id');
		$user = $this->ion_auth->get_user();
	}
	
	public function upload(){
	
		$config['upload_path'] = "/application/uploads/";
		$config['allowed_types'] = "jpg|jpeg|png|bmp|tiff";
		$config['max_size']	= 2048;
		$config['max_width'] = 150;
		$config['max_height'] = 100;
		$config['encrypt_name'] = TRUE;
	
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload() == false) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}else{
			$data = $this->upload->data();
			echo json_encode($data);
		}
	}
}