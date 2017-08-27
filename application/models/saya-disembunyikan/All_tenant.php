<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class All_tenant extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}
	
	
	function Semua_tenant(){
		$query=$this->db->query("SELECT * FROM tenant ORDER BY id_tenant DESC");
		$_status=$this->db->query("SELECT * FROM status");
		$status=array();
		$status[0]="";
		if($_status->num_rows()>0){
			foreach ($_status->result_array() as  $value) {
				$status[$value['id_status']]=$value['nama_status'];
			}			
		}
		$fakultas=$this->db->query("SELECT * FROM fakultas");
		$arKat=array();
		$arKat[0]="";
		if($fakultas->num_rows()>0){
			foreach ($fakultas->result_array() as  $value) {
				$arKat[$value['id_fakultas']]=$value['nama_fakultas'];
			}			
		}
		$prodi=$this->db->query("SELECT * FROM prodi");
		$tejur=array();
		$tejur[0]="";
		if($prodi->num_rows()>0){
			foreach ($prodi->result_array() as  $value) {
				$tejur[$value['id_prodi']]=$value['nama_prodi'];
			}			
		}
		
		$hasil="";
		if($query->num_rows()>0){
			$no=1;
			foreach($query->result_array() as $value){
				$id_oreng=$value['id_tenant'];
				$this->hasil.="<tr id='$id_oreng'>";
				$this->hasil.="<td>$value[id_tenant]</td>";
				$this->hasil.="<td>$value[npm]</td>";
				$this->hasil.="<td><span class='nama_lengkap'>".$value['nama_lengkap']."</span></td>";
				$this->hasil.="<td>".@$status[$value['status']]."</td>";
				$this->hasil.="<td>".@$tejur[$value['prodi']]."</td>";
				$this->hasil.="<td>$value[tanggal_daftar]</td>";
				$fotbut="<a class='btn btn-sm btn-primary foto' data-toggle='modal' data-target='#modal-foto'><i class='fa fa-photo'></i></a>";
				$this->hasil.="<td>$fotbut <a href='".base_url()."saya-disembunyikan/edit_tenant/$value[id_tenant]' class='btn btn-primary btn-sm' id='$value[id_tenant]'><i class='fa fa-pencil-square-o'></i></a>
				<a class='btn btn-danger btn-sm hapus-tenant' id='$value[id_tenant]'><i class='fa fa-trash-o'></i></a></td>";
				$this->hasil.="</tr>";

			}
		}
		return $hasil;
	}

}