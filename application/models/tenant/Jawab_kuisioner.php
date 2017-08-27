<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jawab_kuisioner extends CI_Model {

	public $hasil;
	public $list_kriteria;

	function __construct(){
		parent::__construct();
	}
	
	function get_kuisioner(){
		$id_tenant=$this->session->userdata('id_tenant');
		$id_kuisioner=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$data_id=$id_kuisioner->row();
		$query=$this->db->query("SELECT * FROM kriteria WHERE aktif='Y' ORDER BY id_kriteria ASC");
		if($query->num_rows()>0){
		$data=$query->result_array();
		$check_ada=$this->db->query("SELECT * from hasil_kuisioner WHERE id_kuisioner=$data_id->id_kuisioner AND id_tenant='$id_tenant'");
			if ($check_ada->num_rows()>0)
			{
				$this->hasil.="<div class='box-body'>";
				$this->hasil.="<div class='callout callout-warning'>";
          		$this->hasil.="<h3>Informasi</h3>";
          		$this->hasil.="<h5>Anda Sudah menjawab Kuisioner. Terima Kasih</h5>";
        		$this->hasil.="</div>";
        		$this->hasil.="</div>";
			}else{
				$query2=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y' ORDER BY id_kuisioner");
				if ($query2->num_rows()>0) {
				$data2=$query2->result_array();
				foreach ($data2 as $key => $value) {
				$this->hasil.="<div class='box box-warning'>";
				$this->hasil.="<div class='box-header with-border'>";
				$this->hasil.="<h3 class='box-title'>Form Jawab Kuisioner</h3>";
				$this->hasil.="</div>";
				$this->hasil.="<div class='box-body'>";
				$this->hasil.="<div class='form-group'>";
                $periode=($value['periode']=='1')?"Semester Ganjil":"Semester Genap";
				$this->hasil.="<div class='well bg-orange'>";
                $this->hasil.= "<h3>Periode Kuisioner : ".$periode."</h3>";  
                $this->hasil.= "<h3>Tahun Terbit : $value[tahun]</h3>";  
                $this->hasil.= "<h4> $value[deskripsi] </h4>";
                $this->hasil.= "</div>";
                $this->hasil.= "</div>";

				foreach($data as $val){
				$this->hasil.="<form method='POST' action='http://localhost/spk-lab/AN_tenant/input_jawaban'>";
				$this->hasil.="<div class='form-group'>";
                $this->hasil.="<input type='hidden' class='form-control' name='id_kriteria[]' value='$val[id_kriteria]' />";
                $this->hasil.="<label>$val[kriteria]</label><br/>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='4' type='checkbox' >Sangat Setuju</label></div>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='3' type='checkbox' >Setuju</label></div>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='2' type='checkbox' >Biasa Saja</label></div>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='1' type='checkbox' >Tidak Setuju</label></div>";
                $this->hasil.="<input type='hidden' class='form-control' name='id_kuisioner[]' value='$value[id_kuisioner]' />";
				$this->hasil.="<input type='hidden' class='form-control' name='id_tenant[]' value='$id_tenant' />";
                $this->hasil.="</div>";
        	    }	
            	$this->hasil.="<hr/>";
                $this->hasil.="<div class='form-group'>";
                $this->hasil.="<input type='hidden' class='form-control' name='id_hasil_kuisioner' value='0' />";
                $this->hasil.="<input type='hidden' class='form-control' name='kode_kuisioner' value='$value[id_kuisioner]' />";
				$this->hasil.="<input type='hidden' class='form-control' name='kode_tenant' value='$id_tenant' />";
                $this->hasil.="<button class='btn btn-warning pull-right' id='simpan-jawaban' type='submit' name='submit'>Simpan</button>";
                $this->hasil.="</div>";
                $this->hasil.="</form>";
                $this->hasil.="<br/>";
                $this->hasil.="</div>";
                $this->hasil.="</div>";
			}}
				}
		}
	}
}