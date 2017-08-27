<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_user extends CI_Model {
	public $hasil="";

	function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

	function show(){
		$query=$this->db->query("SELECT * FROM user ORDER BY id_user DESC");
		if($query->num_rows()>0){
			
			foreach($query->result_array() as $row){
				$level=($row['level_user']=='1')?"Administrator":"Staff";
				$tatus=($row['status_user']=='Y')?"<span class='label label-success'>Aktif</span>":"<span class='label label-danger'>Tidak Aktif</span>";
				$id=$row['id_user'];
				$this->hasil.="<tr class='edit' id='$id'>";
				$this->hasil.="<th class='no'>";
				$this->hasil.=$id;
				$this->hasil.="</th>";
				$this->hasil.="<td><span class='editable username'>".$row['name_user']."</span><form class='username'><input type='text'></form></td>";
				$this->hasil.="<td><span class='editable full_name'>".$row['nama_lengkap']."</span><form class='full_name'><input type='text'></form></td>";
				$this->hasil.="<td><span class='editable email'>".$row['email']."</span><form class='email'><input type='text'></form></td>";
				$levop=($row['level_user']=='1')?"<select class='level'><option value='0' >Riliser</option><option value='1' selected>Super Admin</option></select>":"<select class='level'><option value='0' selected>Riliser</option><option value='1' >Super Admin</option></select>";
				$this->hasil.="<td><span class='editable level'>".$level."</span>$levop</td>";
				$staop=($row['status_user']=='Y')?"<select class='status'><option value='Y' selected>Aktif</option><option value='N' >Nonaktif</option></select>":"<select class='status'><option value='Y'>Aktif</option><option value='N' selected>Nonaktif</option></select>";
				$this->hasil.="<td><span class='status'>".$tatus."</span>$staop</td>";
				$pasbut="<button class='btn btn-sm btn-primary password'><i class='fa fa-lock'></i>Password</button>";
				$fotbut="<button class='btn btn-sm btn-primary foto'><i class='fa fa-photo'></i> Foto</button>";
				$hapus=($this->session->userdata('id_user')!=$row['id_user'])?"<button class='btn btn-sm btn-danger hapus'><i class='fa fa-remove'></i> Hapus</button>":"<button class='btn btn-sm btn-danger disabled'><i class='fa fa-remove'></i> Hapus</button>";
				$this->hasil.="<td>"."$pasbut &nbsp; $fotbut &nbsp; $hapus"."</td>";
				$this->hasil.="</tr>";

			}

			return true;
		} else {
			return false;
		}
	}
}