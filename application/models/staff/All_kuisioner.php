<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class All_kuisioner extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function Semua_kuisioner(){
		$query=$this->db->query("SELECT * FROM kuisioner ORDER BY id_kuisioner DESC");
		
		if($query->num_rows()>0){
			$no=1;
			foreach($query->result_array() as $value){
				
				$aktif=($value['aktif']=='Y')?"Aktif":"Tidak Aktif";
				$periode=($value['periode']=='1')?"Semester Ganjil":"Semester Genap";
				$this->hasil.="<tr>";
				$this->hasil.="<td>$value[id_kuisioner]</td>";
				$this->hasil.="<td>".$periode."</td>";
				$this->hasil.="<td>$value[tahun]</td>";
				$this->hasil.="<td>".$aktif."</td>";
				$this->hasil.="<td><a href='".base_url()."staff/kuisioner/$value[id_kuisioner]' class='btn btn-primary btn-sm' id='$value[id_kuisioner]'><i class='fa fa-pencil-square-o'></i></a>
				<a class='btn btn-danger btn-sm hapus-kuisioner' id='$value[id_kuisioner]'><i class='fa fa-trash-o'></i></a></td>";
				$this->hasil.="</tr>";

			}
		}

	}

}