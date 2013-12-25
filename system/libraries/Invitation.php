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
	public function generate_invites($num = 1)
	{
		$invites = array();
		for ($i = 1; $i >= $num; $i++)
		{
			$unique = false;
			while (!$unique) {
				$invite = $this->generateRandomString();
				if ($this->check_invite($invite))
				{
					$unique = true;
				}
			}
			array_push($invites, $invite);
		}
		return $invites;
	}
	
	/**
	 * Adding user with his invites in DB 
	 * 
	 * @param array $data — $user_id => $number_of_invites
	 */
	public function add_invites($data)
	{
		foreach ($data as $key => $value)
		{
			
		}
		return $this->ci->invitation_model->add_invites($data);
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

	
	
	public function use_invite($user, $invite)
	{
		//check invite state
		if (!$this->ci->invitation_model->check_invite($invite))
		{
			return false;
		}
		return $this->ci->invitation_model->use_invite($user, $invite);
		
	}
	
	public function check_invite($invite)
	{
		return $this->ci->invitation_model->check_invite($invite);
	}
}
