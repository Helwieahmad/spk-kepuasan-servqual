<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AN_Rilisitas extends CI_Controller{

	protected $public_data=array();
 
	public function __construct(){
		parent::__construct();

		$this->load->helper(array('custom_url','front_end','filter','text','tanggal'));
	}
}