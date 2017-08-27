<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Main extends CI_Model{

	protected $data=array();


	function __construct(){
		parent::__construct();
	}


	function get(){

		
		return $this->data;


	}







}