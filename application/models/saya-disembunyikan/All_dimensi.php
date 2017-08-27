<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class All_dimensi extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function Semua_dimensi(){
		$query=$this->db->query("SELECT * FROM dimensi ORDER BY id_dimensi DESC");
		if($query->num_rows()>0){
			$no=1;
			foreach($query->result_array() as $value){

				$this->hasil.="<tr>";
				$this->hasil.="<td>$value[id_dimensi]</td>";
				$this->hasil.="<td>$value[dimensi]</td>";
				$this->hasil.="<td>$value[keterangan]</td>";

				$this->hasil.="<td><a href='".base_url()."saya-disembunyikan/dimensi/$value[id_dimensi]' class='btn btn-primary btn-sm' id='$value[id_dimensi]'><i class='fa fa-pencil-square-o'></i></a>
				<a class='btn btn-danger btn-sm hapus-dimensi' id='$value[id_dimensi]'><i class='fa fa-trash-o'></i></a></td>";
				$this->hasil.="</tr>";

			}
		}

	}

}