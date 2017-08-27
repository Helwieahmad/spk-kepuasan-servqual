<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_tenant extends CI_Model {

	public $hasil;
	public $ambil;
	public $list_status;
	public $list_unit;
	public $list_prodi;

	function __construct(){
		parent::__construct();
	}
	
	function get_tenant(){
		$query=$this->db->query("SELECT * FROM tenant WHERE id_tenant='".$this->session->userdata("id_tenant")."'");
		if($query->num_rows()>0){
			$row=$query->row();
			$this->hasil= array(
				"id_tenant"=>$row->id_tenant,
				"npm"=>$row->npm,
				"nama_lengkap"=>$row->nama_lengkap,
				"email"=>$row->email,
				"status"=>$row->status,
				"prodi"=>$row->prodi,
				"avatar_tenant"=>$row->avatar_tenant
				);
			return true;
		} else {
			return false;
		}
	}
	function get_list_status(){
		$status_tenant='';
		$tenant=$this->db->query("SELECT status FROM tenant WHERE id_tenant='".$this->session->userdata("id_tenant")."'");
		$_status=$tenant->row();
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

	function get_list_unit(){
		$unit_tenant='';
		$tenant=$this->db->query("SELECT prodi FROM tenant WHERE id_tenant='".$this->session->userdata("id_tenant")."'");
		$_unit=$tenant->row();
		$id_unit=$_unit->prodi;

		$query=$this->db->query("SELECT * FROM prodi WHERE id_fakultas='8' ORDER BY id_prodi");
		if($query->num_rows()>0){
			foreach($query->result_array() as $data){
				$selected=($id_unit==$data['id_prodi'])?'selected':'';
				$unit_tenant.="<option value='$data[id_prodi]' $selected>";
				$unit_tenant.="$data[nama_prodi]";
				$unit_tenant.="</option>";
			}

			return $unit_tenant;
		} else {
			$this->list_unit=false;
		}
	}


	function get_list_prodi(){
		$prodi_tenant='';
		$tenant=$this->db->query("SELECT prodi FROM tenant WHERE id_tenant='".$this->session->userdata("id_tenant")."'");
		$_prodi=$tenant->row();
		$id_prodi=$_prodi->prodi;

		$query=$this->db->query("SELECT * FROM prodi WHERE NOT id_fakultas='8' ORDER BY id_prodi");
		if($query->num_rows()>0){
			foreach($query->result_array() as $data){
				$selected=($id_prodi==$data['id_prodi'])?'selected':'';
				$prodi_tenant.="<option value='$data[id_prodi]' $selected>";
				$prodi_tenant.="$data[nama_prodi]";
				$prodi_tenant.="</option>";
			}

			return $prodi_tenant;
		} else {
			$this->list_prodi=false;
		}
	}
	
	function ganti_foto(){
		$query=$this->db->query("SELECT * FROM tenant WHERE id_tenant='".$this->session->userdata("id_tenant")."' ORDER BY id_tenant DESC");
		$ambil="";
		if($query->num_rows()>0){
			$no=1;
			foreach($query->result_array() as $value){
				$id_oreng=$value['id_tenant'];
				$this->ambil.="<tr id='$id_oreng'>";
				$this->ambil.="<td style='display:none;'><span class='nama_lengkap'>".$value['nama_lengkap']."</span></td>";
				$fotbut="<a class='btn btn-block btn-default btn-lg foto' data-toggle='modal' data-target='#modal-foto'><i class='fa fa-photo'></i></a>";
				$this->ambil.="<td>$fotbut</td>";
				$this->ambil.="</tr>";

			}
		}
		return $ambil;
	}
}