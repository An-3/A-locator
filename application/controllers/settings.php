<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	/**
	 * Changing user settings
	 *
	 * @param session_id $who
	 * @param settings_name $where
	 * @param value $what
	 */
	public function change()
	{
		$what = $this->input->post('what');
		$where = $this->input->post('where');
		
		$identity = $this->session->userdata('e-mail');
						
		var_dump($identity);
	}
}