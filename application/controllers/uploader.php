<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->library('change_settings');
		
		$config['upload_path'] = 'assets/img/userpics/';
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$config['max_size']	= 12048;
		$config['max_width'] = 8000;
		$config['max_height'] = 6000;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		$user = $this->ion_auth->get_user();
		
		if ($this->upload->do_upload() == false) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}else{
			$data = $this->upload->data();
			$this->change_settings->change("userpic", "userpic", $data['file_name']);
			echo json_encode($data);
		}	
	}
}