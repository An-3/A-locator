<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Invitation Model
*
* Author:  An-3
* 		   an-03@yandex.ru
*	  	   
*
* 
*
* 
*
* Created:  19.12.2013
*
* Description:  Invitation subsyste, for IonAuth
* 
*
* Requirements: PHP5 or above
*
*/

//  CI 2.0 Compatibility
if(!class_exists('CI_Model')) { class CI_Model extends Model {} }

class Invitation_model extends CI_Model
{
	/**
	 * Holds an array of tables used
	 *
	 * @var string
	 **/
	public $tables = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->library('session');
	}
	
	/**
	 * Add invite to db with user or not
	 * 
	 * @param string $invite
	 * @param number $user
	 */
	public function attach_invite($invite, $user=1)
	{
		//$sql = "INSERT INTO `invites` (`id` ,`invite_text` ,`uid_user` ,`uid_invited_user` ,`state`) VALUES (NULL, '".$invite."', '".$user."', NULL, '1');";
		$data = array(
				'invite_text' => $invite ,
				'uid_user' => $user
		);
		$this->db->insert('invites', $data);
		return $this->db->affected_rows() == 1;
	}
	
	
	
	/**
	 * Invite checking
	 *
	 * @param string $invite
	 * @return bool
	 * @author An-3
	 *
	 */
	public function check_invite($invite)
	{
		if (empty($invite))
		{
			return FALSE;
		}
		//$query = $this->db->get_where('invites', array('invite_text' => $invite, 'state' => $title));
		
		//$this->db->select('invite_text, state');
		
		$query = $this->db->get_where('invites', array('invite_text' => $invite));
		
		//there is no invites
		if ($query->num_rows() == 0)
		{			
			$this->ion_auth->set_error('invite_absent');
			return false;
		} else {
			$row = $query->row();
			//invite was used
			if ($row->state == 0) {
				$this->ion_auth->set_error('invite_was_used');
				return false;
			} else {
				return true;
			}
		}
	}	
	
	public function use_invite($user, $invite)
	{
		$data = array(
				'uid_invited_user' => $user,
				'state' => '0'
		);
		$this->db->where('invite_text', $invite);
		$this->db->update('invites', $data);
		return true;
	}
}