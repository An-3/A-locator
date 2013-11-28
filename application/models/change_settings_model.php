<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Change Settings Model
*
* Author:  An-3
* 		   an-03@yandex.ru
*
* Location: http://github.com/An-3/a-locator
*
* Created:  28.11.2013
*
* Description: Changing user settings  
*
* Requirements: PHP5 or above
*
*/
//  CI 2.0 Compatibility
if(!class_exists('CI_Model')) { class CI_Model extends Model {} }

class Change_settings_model extends CI_Model
{
	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->load->library('session');
	
		$this->tables  = $this->config->item('tables', 'ion_auth');
		$this->columns = $this->config->item('columns', 'ion_auth');
	
	}
	
	
}