<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tenant extends CI_Model {

	public $hasil;
	public $list_status;
	function __construct(){
		parent::__construct();
	}

	function get_tenant($id){
		if($id>0){
		$query=$this->db->query("SELECT * FROM tenant WHERE id_tenant='$id'");
		if($query->num_rows()>0){
			$row=$query->row();
			$this->hasil= array(
				"id_tenant"=>$row->id_tenant,
				"npm"=>$row->npm,
				"password"=>$row->password,
				"nama_lengkap"=>$row->nama_lengkap,
				"email"=>$row->email,
				"avatar_tenant"=>$row->avatar_tenant,
				"tanggal_daftar"=>$row->tanggal_daftar
				);
			return true;
		} else {
			return false;
		}
	 } else {
	 	$this->hasil= array(
				"id_tenant"=>0,
				"npm"=>"",
				"password"=>"",
				"nama_lengkap"=>"",
				"email"=>"",
				"avatar_tenant"=>"",
				"tanggal_daftar"=>""
				);
	 		return true;
	 }
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

	function get_list_status($id){
		$status_tenant='';
		$tenant=$this->db->query("SELECT status FROM tenant WHERE id_tenant='$id'");
		$_status=$tenant->row()>0;
		$id_status=$_status->status;

		$query=$this->db->query("SELECT * FROM status ORDER BY id_status");
		if($query->num_rows()>0){
			foreach($query->result_array() as $data){
				$selected=($id_status==$data['id_status'])?'selected':'';
				$status_tenant.="<option value='$data[id_status]' $selected>";
				$status_tenant.="$data[nama_status]";
				$status_tenant.="</option>";
			}

			return $status_tenant;
		} else {
			$this->list_status=false;
		}
	}

}