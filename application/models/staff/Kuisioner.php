<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kuisioner extends CI_Model {

	public $hasil;
	public $list_kriteria;

	function __construct(){
		parent::__construct();
	}

	function get_kriteria(){
		$query=$this->db->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $data) {
				$this->list_kriteria.="<span class='btn btn-flat btn-block btn-social btn-github span-kriteria' style='margin-bottom:5px;' id='$data[id_kriteria]' title='not_select'><i class='fa fa-check'></i>";
				$this->list_kriteria.=$data["kriteria"];
				$this->list_kriteria.="</span><br/>";
			}
		} else {
			$this->list_kriteria=false;
		}
	}
	
	function get_kuisioner($id){
		$query=$this->db->query("SELECT * FROM kuisioner WHERE id_kuisioner='$id'");
		if($query->num_rows()>0){

			$data=$query->row();

			/* $cari_kriteria=$this->db->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");
			
			$active_kriteria="";
			$result_kriteria=$cari_kriteria->result_array();
			
			$current_kriteria=explode(",", $data->kuisioner_kriteria);
			$jumlah_kriteria=0;
			foreach ($current_kriteria as $__data) {
				$jumlah_kriteria++;

			if($jumlah_kriteria>0){
				$con=0;
				foreach($result_kriteria as $_data){
					if(in_array($_data['id_kriteria'],$current_kriteria)){
						if($con==0){
						$active_kriteria.=$_data['id_kriteria'];
					     } else {
					    $active_kriteria.=','.$_data['id_kriteria'];
					     }
					     $con++;
					 }
				}
			} */
			
			return array(
				"id_kuisioner"=>$data->id_kuisioner,
				"periode"=>reversequote($data->periode,"all"),
				"tahun"=>$data->tahun,
				"aktif"=>$data->aktif,
				"deskripsi"=>reversequote($data->deskripsi,"all")
				);
			/* } */
		} else {
			return false;
		}
	}
	
}