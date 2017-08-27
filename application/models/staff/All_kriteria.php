<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class All_kriteria extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function Semua_kriteria(){
		$query=$this->db->query("SELECT * FROM kriteria ORDER BY id_kriteria DESC");
		
		$_dimensi=$this->db->query("SELECT * FROM dimensi");
		$dimensi=array();
		$dimensi[0]="";
		if($_dimensi->num_rows()>0){
			foreach ($_dimensi->result_array() as  $value) {
				$dimensi[$value['id_dimensi']]=$value['dimensi'];
			}			
		}
		$hasil="";
		
		if($query->num_rows()>0){
			$no=1;
			foreach($query->result_array() as $value){
				
				$aktif=($value['aktif']=='Y')?"Aktif":"Tidak Aktif";
				$this->hasil.="<tr>";
				$this->hasil.="<td>$value[id_kriteria]</td>";
				$this->hasil.="<td>$value[kriteria]</td>";
				$this->hasil.="<td>".@$dimensi[$value['id_dimensi']]."</td>";
				$this->hasil.="<td>".$aktif."</td>";

				$this->hasil.="<td><a href='".base_url()."staff/kriteria/$value[id_kriteria]' class='btn bg-purple btn-sm' id='$value[id_kriteria]'><i class='fa fa-pencil-square-o'></i></a>
				<a class='btn btn-danger btn-sm hapus-kriteria' id='$value[id_kriteria]'><i class='fa fa-trash-o'></i></a></td>";
				$this->hasil.="</tr>";

			}
		}

	}

}