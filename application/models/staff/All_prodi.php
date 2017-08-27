<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_prodi extends CI_Model{
	public $hasil="";
	public $list_fakultas;
	function __construct(){
		parent::__construct();
	}
	function get_fakultas(){
		$query=$this->db->query("SELECT * FROM fakultas ORDER BY id_fakultas");
		if($query->num_rows()>0){
			foreach($query->result_array() as $data){
				$this->list_fakultas.="<option value='$data[id_fakultas]'>";
				$this->list_fakultas.="$data[nama_fakultas]";
				$this->list_fakultas.="</option>";
			}
		} else {
			$this->list_fakultas=false;
		}
	}
	function get_prodi(){
		$query=$this->db->query("SELECT * FROM prodi ORDER BY id_prodi DESC");
		$fakultas=$this->db->query("SELECT * FROM fakultas");
		$arKat=array();
		$arKat[0]="";
		if($fakultas->num_rows()>0){
			foreach ($fakultas->result_array() as  $value) {
				$arKat[$value['id_fakultas']]=$value['nama_fakultas'];
			}			
		}
		if($query->num_rows()>0){
			$data=$query->result_array();
			$no=1;
			foreach($data as $val){
				$this->hasil.="<tr id_prodi='$val[id_prodi]'>";

				$this->hasil.="<th class='no'>";
				$this->hasil.=$no;
				$this->hasil.="</th>";

				$this->hasil.="<td class='id_fakultas'>";
				$this->hasil.="<span>".@$arKat[$val['id_fakultas']]."</span>";
				$this->hasil.="</td>";
				
				$this->hasil.="<td class='nama_prodi'>";
				$this->hasil.="<span>".$val["nama_prodi"]."</span>";
				$this->hasil.="</td>";

				$this->hasil.="<td class='hapus_prodi'>";
				$this->hasil.="<button class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></button>";
				$this->hasil.="</td>";

				$this->hasil.="</tr>";
				$no++;
			}
		}
	}


}



?>