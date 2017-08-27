<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria extends CI_Model {

	public $hasil;
	public $list_dimensi;

	function __construct(){
		parent::__construct();
	}

	function get_kriteria($id){
		if($id>0){
		$query=$this->db->query("SELECT * FROM Kriteria WHERE id_kriteria='$id'");
		if($query->num_rows()>0){
			$row=$query->row();
			$this->hasil= array(
				"id_kriteria"=>$row->id_kriteria,
				"kriteria"=>$row->kriteria,
				"id_dimensi"=>$row->id_dimensi,
				"aktif"=>$row->aktif,
				"keterangan"=>$row->keterangan
				);
			return true;
		} else {
			return false;
		}
	 } else {
	 	$this->hasil= array(
				"id_kriteria"=>0,
				"kriteria"=>"",
				"id_dimensi"=>"",
				"aktif"=>"",
				"keterangan"=>""
	 		);
	 		return true;
	 }
	}
	function get_dimensi(){
		$query=$this->db->query("SELECT * FROM dimensi ORDER BY id_dimensi");
		if($query->num_rows()>0){
			foreach($query->result_array() as $data){
				$this->list_dimensi.="<option value='$data[id_dimensi]'>";
				$this->list_dimensi.="$data[dimensi]";
				$this->list_dimensi.="</option>";
			}
		} else {
			$this->list_dimensi=false;
		}
	}
	function get_list_dimensi($id){
			if ($id>0) {
			$dimensi_kriteria='';
			$kriteria=$this->db->query("SELECT id_dimensi FROM kriteria WHERE id_kriteria='$id'");
			$_dimensi=$kriteria->row();
			$id_dimensi=$_dimensi->id_dimensi;

			$query=$this->db->query("SELECT * FROM dimensi ORDER BY id_dimensi");
			if($query->num_rows()>0){
				foreach($query->result_array() as $data){
					$selected=($id_dimensi==$data['id_dimensi'])?'selected':'';
					$dimensi_kriteria.="<option value='$data[id_dimensi]' $selected>";
					$dimensi_kriteria.="$data[dimensi]";
					$dimensi_kriteria.="</option>";
				}

				return $dimensi_kriteria;
			} else {
				$this->list_dimensi=false;
			}
		}else{
			$this->list_dimensi=false;
		}
	}
}