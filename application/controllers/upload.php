<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		
		$config['upload_path'] = "/application/uploads/";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$config['max_size']	= 2048;
		$config['max_width'] = 800;
		$config['max_height'] = 600;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
	}
	
	public function index()
	{
		if ($this->upload->do_upload() == false) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}else{
			$data = $this->upload->data();
			echo json_encode($data);
		}	
	}
}