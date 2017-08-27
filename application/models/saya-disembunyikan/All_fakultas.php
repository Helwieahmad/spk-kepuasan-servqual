<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_fakultas extends CI_Model{
	public $hasil="";
	function __construct(){
		parent::__construct();
	}

	function get_fakultas(){
		$query=$this->db->query("SELECT * FROM fakultas ORDER BY id_fakultas DESC");
		if($query->num_rows()>0){
			$data=$query->result_array();
			$no=1;
			foreach($data as $val){
				$this->hasil.="<tr id_fakultas='$val[id_fakultas]'>";

				$this->hasil.="<th class='no'>";
				$this->hasil.=$no;
				$this->hasil.="</th>";

				$this->hasil.="<td class='nama_fakultas'>";
				$this->hasil.="<span>".$val["nama_fakultas"]."</span><form><input type='text' ></form>";
				$this->hasil.="</td>";

				$this->hasil.="<td class='hapus_fakultas'>";
				$this->hasil.="<button class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></button>";
				$this->hasil.="</td>";

				$this->hasil.="</tr>";
				$no++;
			}
		}
	}


}



?>