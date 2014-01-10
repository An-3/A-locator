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
		
		for ($i = 1; $i <= $num; $i++)
		{
			$invites[$i] = $this->generateRandomString();
		}
		return $invites;
	}
	
	/**
	 * Creates array users with its invites 
	 * 
	 * @param array $users_numbers(array $user_id, int $number_of_invites)
	 * @return array $users_invites(int $user_id => array(string invite1, string invite(n)))
	 */
	public function create_invites($users, $number = 1)
	{	
		$users_invites = array();

		foreach ($users as $user_id)
		{
			$line = array($user_id => $this->generate_invites($number));
			array_push($users_invites, $line);
		}
		return $users_invites;
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
