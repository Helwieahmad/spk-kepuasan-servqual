<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_status extends CI_Model{
	public $hasil="";
	function __construct(){
		parent::__construct();
	}

	function get_status(){
		$query=$this->db->query("SELECT * FROM status ORDER BY id_status DESC");
		if($query->num_rows()>0){
			$data=$query->result_array();
			$no=1;
			foreach($data as $val){
				$this->hasil.="<tr id_status='$val[id_status]'>";

				$this->hasil.="<th class='no'>";
				$this->hasil.=$no;
				$this->hasil.="</th>";

				$this->hasil.="<td class='nama_status'>";
				$this->hasil.="<span>".$val["nama_status"]."</span><form><input type='text' ></form>";
				$this->hasil.="</td>";

				$this->hasil.="<td class='hapus_status'>";
				$this->hasil.="<button class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></button>";
				$this->hasil.="</td>";

				$this->hasil.="</tr>";
				$no++;
			}
		}
	}


}



?>