<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Hasil_servqual extends CI_Model {

	public $hasil;
	public $jumlah;
	public $kriteria;
	public $dimensi;

	function __construct(){
		parent::__construct();
	}


	function servqual_kriteria(){
	$query=$this->db->query("SELECT * FROM kriteria WHERE aktif='Y' ORDER BY id_kriteria");
		if ($query->num_rows()>0) {
			foreach($query->result_array() as $value){
			
			$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
			$aktif_kuisioner=$kuisioner_aktif->row();
			$id_kuisioner_aktif=$aktif_kuisioner->id_kuisioner;

			$tenant=$this->db->query("SELECT id_tenant FROM hasil_kuisioner WHERE id_tenant !='0' AND id_kuisioner=$id_kuisioner_aktif");
			$jumlah_tenant=$tenant->num_rows();

			$persep_per_kriteria=$this->db->query("SELECT SUM(jawaban) AS j_k_p FROM detail_jawaban WHERE id_kuisioner=$id_kuisioner_aktif AND id_kriteria=$value[id_kriteria] AND id_tenant != '0'");
			foreach ($persep_per_kriteria->result_array() as $key => $persepsi_per_kriteria) {
			}

			$ekspek_per_kriteria=$this->db->query("SELECT SUM(jawaban*$jumlah_tenant) AS j_k_e FROM detail_jawaban WHERE id_kuisioner=$id_kuisioner_aktif AND id_tenant='0' AND id_kriteria=$value[id_kriteria]");
			$jumlah_ekpektasi_per_kriteria= $ekspek_per_kriteria->result_array();
			foreach ($jumlah_ekpektasi_per_kriteria as $ekspektasi_per_kriteria) {
			}
			
			$hasil_per_kriteria=$persepsi_per_kriteria['j_k_p']-$ekspektasi_per_kriteria['j_k_e'];
			$hasil_akhir_per_kriteria=@($hasil_per_kriteria/$jumlah_tenant);
			$hasil_akhir=number_format($hasil_akhir_per_kriteria,1);

				$id_kuisioner=$aktif_kuisioner->id_kuisioner;
				
				$this->hasil.="<tr>";
				$this->hasil.="<td>$value[id_kriteria]</td>";
				$this->hasil.="<td>$value[kriteria]</td>";
				$this->hasil.="<td>$hasil_akhir</td>";
				if ($hasil_akhir_per_kriteria >= 2) {
					$this->hasil.="<td class='text-blue'><strong>SANGAT BAIK</strong></td>";
				}elseif ($hasil_akhir_per_kriteria >= 1) {
					$this->hasil.="<td class='text-green'><strong>BAIK</strong></td>";
				}elseif($hasil_akhir_per_kriteria >= 0){
					$this->hasil.="<td class='text-green'><strong>CUKUP BAIK</strong></td>";
				}elseif($hasil_akhir_per_kriteria < 0){
					$this->hasil.="<td class='text-orange'><strong>KURANG BAIK</strong></td>";
				}elseif($hasil_akhir_per_kriteria <= 2){
					$this->hasil.="<td class='text-orange'><strong>BELUM BAIK</strong></td>";
				}
				$this->hasil.="</tr>";
				$id_kuisioner=$aktif_kuisioner->id_kuisioner;
				$this->kriteria.="<form method='post' name='servqual_kriteria' id='servqual_kriteria' action='http://localhost/spk-lab/AN_admin/input_servqual_kriteria'>";
				$this->kriteria.="<tr>";
				$this->kriteria.="<td><input type='text' name='id_kriteria[]' value='$value[id_kriteria]'>
				<input type='text' name='id_kuisioner[]' value='$id_kuisioner'></td>";
				$this->kriteria.="<td><input type='text' name='hasil[]' value='$hasil_akhir'></td>";
				$this->kriteria.="</tr>";
				$this->kriteria.="<td><input type='text' name='id' value='$id_kuisioner'></td>";
				$this->kriteria.="</form>";			
				}
				
			}

	}


	function servqual_total(){
	
	$jml_kriteria_aktif=$this->db->where('aktif','Y')->count_all_results("kriteria");

	$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
	$aktif_kuisioner=$kuisioner_aktif->row();
	$id_kuisioner_aktif=$aktif_kuisioner->id_kuisioner;

	$tenant=$this->db->query("SELECT id_tenant FROM hasil_kuisioner WHERE id_tenant !='0' AND id_kuisioner=$id_kuisioner_aktif");
	$jumlah_tenant=$tenant->num_rows();

	$persepsi= $this->db->query("SELECT SUM(jawaban) AS j_p FROM detail_jawaban WHERE id_kuisioner=$id_kuisioner_aktif AND id_tenant !='0'");
	$jumlah_persepsi= $persepsi->result_array();
	foreach ($jumlah_persepsi as $value) {
	}

	$ekspektasi= $this->db->query("SELECT SUM(jawaban*$jumlah_tenant) AS j_e FROM detail_jawaban WHERE id_tenant='0' AND id_kuisioner=$id_kuisioner_aktif");
	$jumlah_ekpektasi= $ekspektasi->result_array();
	foreach ($jumlah_ekpektasi as $val) {
	}

	$jumlah_awal=$value['j_p']-$val['j_e'];

	$hasil_servqual=@($jumlah_awal/$jumlah_tenant);

	$id_total=$this->db->query("SELECT * FROM servqual_total WHERE id_kuisioner='$id_kuisioner_aktif'");
		if($id_total->num_rows()>0){
			// "update";
			$query=$this->db->query("UPDATE servqual_total SET 
				hasil='$hasil_servqual'
				WHERE id_kuisioner='$id_kuisioner_aktif'");	
				} else {
				// "baru";
				$query=$this->db->query("INSERT INTO servqual_total (id_kuisioner,hasil) VALUES ('$id_kuisioner_aktif','$hasil_servqual')");		
		}
	}

	function jumlah(){
		$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		if($kuisioner_aktif->num_rows()>0){
		foreach($kuisioner_aktif->result_array() as $val){
		}}
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
		$querys=$this->db->query("SELECT * FROM servqual_total WHERE id_kuisioner='$id_kuisioner'");
		if ($querys->num_rows()>0) {
			foreach($querys->result_array() as $value){
				$nilai=$value['hasil'];
				$periode=($val['periode']=='1')?"Semester Ganjil":"Semester Genap";
				if ($value['hasil'] >= 1) {
				$this->jumlah.="<h4>Setelah Menghitung Hasil Kuisioner Pada Periode <strong>$periode</strong> Tahun <strong>$val[tahun]</strong>. Secara Keseluruhan Kualitas Layanan Yang Ada di Laboratorium Komputer Universitas Kanjuruhan Malang Mendapatkan Nilai <strong>$nilai</strong> dengan Status <span class='text-blue'><h3>SUDAH BAIK</h3></span></h4>";
				}elseif ( $value['hasil'] <1 && $value['hasil'] >= 0) {
				$this->jumlah.="<h4>Setelah Menghitung Hasil Kuisioner Pada Periode <strong>$periode</strong> Tahun <strong>$val[tahun]</strong>. Secara Keseluruhan Kualitas Layanan Yang Ada di Laboratorium Komputer Universitas Kanjuruhan Malang Mendapatkan Nilai <strong>$nilai</strong> dengan Status <span class='text-green'><h3>CUKUP BAIK</h3></span></h4>";
				}elseif($value['hasil'] < 0){
				$this->jumlah.="<h4>Setelah Menghitung Hasil Kuisioner Pada Periode <strong>$periode</strong> Tahun <strong>$val[tahun]</strong>. Secara Keseluruhan Kualitas Layanan Yang Ada di Laboratorium Komputer Universitas Kanjuruhan Malang Mendapatkan Nilai <strong>$nilai</strong> dengan Status <span class='text-orange'><h3>BELUM BAIK</h3></span></h4>";		
				}
				
			}
		}
	}

	public function no_kuisioner(){
		$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
		$query=$this->db->query("SELECT id_kuisioner FROM servqual_kriteria WHERE id_kuisioner='$id_kuisioner'");
		return $query->result();
	}
	public function no_kriteria(){
		$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
		$query=$this->db->query("SELECT id_kriteria FROM servqual_kriteria WHERE id_kuisioner='$id_kuisioner'");
		return $query->result();
	}
	public function hasilnya(){
		$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
		$query=$this->db->query("SELECT hasil FROM servqual_kriteria WHERE id_kuisioner='$id_kuisioner'");
		foreach ($query->result() as $row)
			{
   			$return[] = $row->hasil;
			}
			return $return;
	}

	 public function get_row1()
    {	$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
        $query = $this->db->query("SELECT COUNT(jawaban) as suara FROM detail_jawaban WHERE id_kuisioner='$id_kuisioner' AND id_tenant !='0' AND  jawaban='4'");
        return $query->result();
    }

    public function get_row2()
    {	$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
        return $this->db->query("SELECT COUNT(jawaban) as suara FROM detail_jawaban WHERE id_kuisioner='$id_kuisioner' AND id_tenant !='0' AND jawaban='3'")->result();
    }

    public function get_row3()
    {	$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
        return $this->db->query("SELECT COUNT(jawaban) as suara FROM detail_jawaban WHERE id_kuisioner='$id_kuisioner' AND id_tenant !='0' AND jawaban='2'")->result();
    }

    public function get_row4()
    {	$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner WHERE aktif='Y'");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
        $query = $this->db->query("SELECT COUNT(jawaban) as suara FROM detail_jawaban WHERE id_kuisioner='$id_kuisioner' AND id_tenant !='0' AND jawaban='1'");
        return $query->result();
    }
}