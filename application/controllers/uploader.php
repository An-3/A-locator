<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->library('change_settings');
		$this->load->library('image_lib');
		
		$path = 'assets/img/userpics/';
		
		$config['upload_path'] = $path;
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$config['max_size']	= 10240;
		$config['max_width'] = 5000;
		$config['max_height'] = 5000;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		$user = $this->ion_auth->get_user();

		if ($this->upload->do_upload() == false) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}else{
			//Upload
			$data = $this->upload->data();
			$image = $this->upload->data();

			//Proportional resize
			//landscape
			if ($image['image_width'] > $image['image_height']) {
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['width'] = '220';
				$config['height'] = '1';				
				$config['master_dim'] = 'width';
				
			//portrait
			} elseif ($image['image_width'] < $image['image_height']) {
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['width'] = '1';
				$config['height'] = '220';
				$config['master_dim'] = 'height';
			//square
			} else {
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['width'] = '220';
				$config['height'] = '220';				
			}
			
			//Image Resizing
			$config['maintain_ratio'] = true;
			$this->image_lib->initialize($config);
			
			if ( ! $this->image_lib->resize()){
				$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
			}			
			//Update profile
			$this->change_settings->change("userpic", "userpic", $data['file_name']);
			unset($config);
			$this->image_lib->clear();
			
			//Make thumbnail
			$this->make_thumb($path,$this->upload->upload_path.$this->upload->file_name);
			
			echo json_encode($data);
		}	
	}
	
	public function make_thumb($path, $file)
	{
		$this->load->library('image_lib');
		$path_thumb = $path.'thumbnail/';
		
		$config2['upload_path'] = 'assets/img/userpics/thumbnail/';
		$config2['new_image'] = $path_thumb;
		$config2['allowed_types'] = "jpg|jpeg|png|gif";
		$config2['max_size']	= 12048;
		$config2['max_width'] = 8000;
		$config2['max_height'] = 6000;
		$config2['encrypt_name'] = false;
		$config2['source_image'] = $file;
		$config2['width'] = '48';
		$config2['height'] = '48';
		
		$this->image_lib->initialize($config2);
		if ( ! $this->image_lib->resize()){
			$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
		}

	}
}