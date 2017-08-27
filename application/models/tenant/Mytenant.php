<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mytenant extends CI_Model {
 public $list_status;
 public $hasil;
 public $id;
 public $npm;
 public $nama;
 public $email;
 public $password;
 public $level;
 public $avatar;

 function __construct (){
 	parent::__construct();
	$this->load->library('session');
 } 

	function insertUser($data)
    {
		return $this->db->insert('tenant', $data);
	}
	
	function get_status(){
		$query=$this->db->query("SELECT * FROM status ORDER BY id_status");
		if($query->num_rows()>0){
			foreach($query->result_array() as $data){
				$this->list_status.="<option value='$data[id_status]'>";
				$this->list_status.="$data[nama_status]";
				$this->list_status.="</option>";
			}
		} else {
			$this->list_status=false;
		}
	}

 	function set($id,$npm,$password){


 	$query=$this->db->query("SELECT * from tenant where id_tenant='$id'and npm='$npm' and password='$password' and level_tenant='3'");
 	if($query->num_rows()>0){
 	$row=$query->row();
 	$this->id=$row->id_tenant;
 	$this->npm=$row->npm;
 	$this->nama=$row->nama_lengkap;
 	$this->email=$row->email;
 	$this->password=$row->password;
 	$this->level=$row->level_tenant;
 	$this->avatar=$row->avatar_tenant;
 	$data_sessi=array('login'=>true,
	 				  'id_tenant'=>$row->id_tenant,
	 				  'npm'=>$row->npm,
	 				  'password'=>$this->password,
	 				  'level_tenant'=>$this->level);
	 $this->session->set_userdata($data_sessi);


	 // mulai generate access security key
	 if(!$this->session->userdata("random_filemanager_key")){
	 	$karakter = 'abcdefghijklmnopqrstuvwxyz0123456789';
	 	$hasil = '';
		 for ($i = 0; $i < 10; $i++) {
		      $hasil .= $karakter[rand(0, strlen($karakter) - 1)];
		 }
		 $this->session->set_userdata(array("random_filemanager_key"=>$hasil));
	 };
	 
 	 return true;
 	}
 	else {
 		$data_sessi=array('login'=>false,
	 						'id_tenant'=>"",
	 						'npm'=>"",
	 						'password'=>"");
	 	$this->session->set_userdata($data_sessi);
 		return false;
 	}
 }



}


?>