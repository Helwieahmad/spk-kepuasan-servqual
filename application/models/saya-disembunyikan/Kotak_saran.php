<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Kotak_saran extends CI_Model
{
   function __construct(){
   	parent::__construct();
   }


   function get_data(){

   		$this->db->order_by('id', 'DESC');
   		$data=$this->db->get("Kotak_saran");

   		return $data->result_array();
   }

} 