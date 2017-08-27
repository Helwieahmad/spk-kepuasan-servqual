<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Hasil_kuisioner extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function ambil_hasil(){
		$query=$this->db->query("SELECT * FROM kuisioner ORDER BY id_kuisioner");
		if($query->num_rows()>0){
			foreach($query->result_array() as $value){

				$empat = array('jawaban' => '4','id_tenant !=' => '0', 'id_kuisioner' => $value['id_kuisioner']);
				$sangat_setuju= $this->db->where($empat)->count_all_results("detail_jawaban");
				
				$tiga = array('jawaban' => '3','id_tenant !=' => '0', 'id_kuisioner' => $value['id_kuisioner']);
				$setuju= $this->db->where($tiga)->count_all_results("detail_jawaban");

				$dua = array('jawaban' => '2','id_tenant !=' => '0', 'id_kuisioner' => $value['id_kuisioner']);
				$biasa= $this->db->where($dua)->count_all_results("detail_jawaban");
				
				$satu = array('jawaban' => '1','id_tenant !=' => '0', 'id_kuisioner' => $value['id_kuisioner']);
				$tidak_setuju= $this->db->where($satu)->count_all_results("detail_jawaban");
				
				$periode=($value['periode']=='1')?"Semester Ganjil":"Semester Genap";
				
				$this->hasil.="<tr>";
				$this->hasil.="<td>$value[id_kuisioner]</td>";
				$this->hasil.="<td>".$periode."</td>";
				$this->hasil.="<td><center><strong>$value[tahun]</strong></center></td>";
				$this->hasil.="<td><center><strong>".$sangat_setuju."</strong></center></td>";
				$this->hasil.="<td><center><strong>".$setuju."</strong></center></td>";
				$this->hasil.="<td><center><strong>".$biasa."</strong></center></td>";
				$this->hasil.="<td><center><strong>".$tidak_setuju."</strong></center></td>";
				$this->hasil.="</tr>";

			}
		}

	}

}