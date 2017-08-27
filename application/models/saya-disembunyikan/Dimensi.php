<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dimensi extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function get_dimensi($id){
		if($id>0){
		$query=$this->db->query("SELECT * FROM dimensi WHERE id_dimensi='$id'");
		if($query->num_rows()>0){
			$row=$query->row();
			$this->hasil= array(
				"id_dimensi"=>$row->id_dimensi,
				"dimensi"=>$row->dimensi,
				"keterangan"=>$row->keterangan
				);
			return true;
		} else {
			return false;
		}
	 } else {
	 	$this->hasil= array(
				"id_dimensi"=>0,
				"dimensi"=>"",
				"keterangan"=>""
	 		);
	 		return true;
	 }
	}

}