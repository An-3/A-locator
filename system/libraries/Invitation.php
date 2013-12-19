<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invitation {
	
	/**
	 * CodeIgniter global
	 *
	 * @var string
	 **/
	protected $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('ion_auth');
		$this->ci->load->library('session');
		$this->ci->load->model('invitation_model');
	}
	

	/**
	 * Generate invites
	 * 
	 * @param number $num
	 * @return string $invite
	 */
	public function generate_invite()
	{
		$unique = false;
		while (!$unique) {
			$invite = $this->generateRandomString();
			if ($this->ci->invitation_model->check_unique_invite($invite))
			{
				$unique = true;
			}
		}
		return $invite;
	}
	
	/**
	 * Generating new invite and attach it in db for selected user
	 * 
	 * @param number $user
	 */
	public function add_invite($user)
	{
		return $this->ci->invitation_model->attach_invite($this->generate_invite());
	}
	
	/**
	 * Generate random string
	 * 
	 * @param number $length
	 * @return string
	 */
	private function generateRandomString($length = 32) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	public function use_invite($invite, $user)
	{
		
	}
}
