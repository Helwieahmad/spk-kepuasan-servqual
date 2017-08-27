<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ekspektasi_lab extends CI_Model {

	public $hasil;
	public $list_kriteria;

	function __construct(){
		parent::__construct();
	}
	
	function get_kuisioner(){
		$id_user=$this->session->userdata('id_user');
		$id_kuisioner=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$data_id=$id_kuisioner->row();
		$query=$this->db->query("SELECT * FROM kriteria WHERE aktif='Y' ORDER BY id_kriteria ASC");
		if($query->num_rows()>0){
		$data=$query->result_array();
		$check_ada=$this->db->query("SELECT id_tenant from hasil_kuisioner WHERE id_kuisioner=$data_id->id_kuisioner AND id_tenant='0'");
			if ($check_ada->num_rows()>0)
			{
				$this->hasil.="<div class='box-body'>";
				$this->hasil.="<div class='callout callout-primary bg-blue'>";
          		$this->hasil.="<h3>Informasi</h3>";
          		$this->hasil.="<h5>Anda Sudah Menginputkan Ekspektasi Untuk Kuisioner Yang sedang aktif.</h5>";
        		$this->hasil.="</div>";
        		$this->hasil.="</div>";
			}else{

				$this->hasil.="<div class='box-body'>";
				$query2=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y' ORDER BY id_kuisioner");
				if ($query2->num_rows()>0) {
				$data2=$query2->result_array();
				foreach ($data2 as $key => $value) {
				$this->hasil.="<div class='form-group'>";
                $periode=($value['periode']=='1')?"Semester Ganjil":"Semester Genap";
				$this->hasil.="<div class='well bg-blue'>";
                $this->hasil.= "<h3> Input Ekspektasi Kepala Laboratorium : ".$periode."</h3>";  
                $this->hasil.= "<h3>Tahun Terbit : $value[tahun]</h3>";  
                $this->hasil.= "<h4 class='text-justify'> Halaman ini digunakan untuk mengisi Ekspektasi / Harapan Kepala Laboratorium mengenai Kualitas Layanan Yang Ada di Laboratorium Komputer Universitas Kanjuruhan Malang. Nilai Ekspektasi ini akan dijadikan sebagai tolak ukur standar kualitas layanan yang telah diterapkan di Laboratorium.  </h4>";
                $this->hasil.= "</div>";
                $this->hasil.= "</div>";

				foreach($data as $val){
				$this->hasil.="<form method='POST' action='http://localhost/spk-lab/AN_admin/input_ekspektasi'>";
				$this->hasil.="<div class='form-group'>";
                $this->hasil.="<input type='hidden' class='form-control' name='id_kriteria[]' value='$val[id_kriteria]' />";
                $this->hasil.="<label>$val[kriteria]</label><br/>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='4' type='checkbox' >Sangat Setuju</label></div>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='3' type='checkbox' >Setuju</label></div>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='2' type='checkbox' >Biasa Saja</label></div>";
             	$this->hasil.="<div class='checkbox'><label><input name='jawaban[]' required='required' class='$val[id_kriteria]' value='1' type='checkbox' >Tidak Setuju</label></div>";
                $this->hasil.="<input type='hidden' class='form-control' name='id_kuisioner[]' value='$value[id_kuisioner]' />";
				$this->hasil.="<input type='hidden' class='form-control' name='id_tenant[]' value='0' />";
                $this->hasil.="</div>";
        	    }	
            	$this->hasil.="<hr/>";
                $this->hasil.="<div class='form-group'>";
                $this->hasil.="<input type='hidden' class='form-control' name='id_hasil_kuisioner' value='0' />";
                $this->hasil.="<input type='hidden' class='form-control' name='kode_kuisioner' value='$value[id_kuisioner]' />";
				$this->hasil.="<input type='hidden' class='form-control' name='kode_tenant' value='0' />";
                $this->hasil.="<button class='btn btn-primary pull-right' id='simpan-jawaban' type='submit' name='submit'>Simpan</button>";
                $this->hasil.="</div>";
                $this->hasil.="</form>";
                $this->hasil.="<br/>";
                $this->hasil.="</div>";
			}}
				}
		}
	}
}