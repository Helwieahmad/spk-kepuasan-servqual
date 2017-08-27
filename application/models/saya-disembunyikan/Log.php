<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Log extends CI_Model {
	public $hasil;
	public $jumlah;
	//public $dimensi;

	function __construct(){
		parent::__construct();
	}


	function servqual_total(){
	
	}

	function jumlah(){
		$query=$this->db->query("SELECT * FROM kuisioner ORDER BY id_kuisioner");
		if ($query->num_rows()>0) {
			foreach($query->result_array() as $value){
				$id_kuisioner=$value['id_kuisioner'];
				$querys=$this->db->query("SELECT * FROM servqual_total WHERE id_kuisioner=$id_kuisioner");
				if ($querys->num_rows()>0) {
				foreach($querys->result_array() as $val){
				
				
				$periode=($value['periode']=='1')?"Semester Ganjil":"Semester Genap";
				$this->jumlah.="<tr>";
				$this->jumlah.="<td>$value[id_kuisioner]</td>";
				$this->jumlah.="<td>$periode</td>";
				$this->jumlah.="<td>$value[tahun]</td>";
				$this->jumlah.="<td>$val[hasil]</td>";
				if ($val['hasil'] >= 1) {
					$this->jumlah.="<td class='text-blue'><strong>SUDAH BAIK</strong></td>";
				}elseif ($val['hasil']  >= 0) {
					$this->jumlah.="<td class='text-green'><strong>CUKUP BAIK</strong></td>";
				}elseif($val['hasil']  < 0){
					$this->jumlah.="<td class='text-orange'><strong>BELUM BAIK</strong></td>";
				}
				$this->jumlah.="</tr>";	
				}
				}}
			}
	}

	public function no_kuisioner(){
		$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
		$query=$this->db->query("SELECT id_kuisioner FROM servqual_kriteria ");
		return $query->result();
	}
	public function no_kriteria(){
		$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
		$query=$this->db->query("SELECT id_kriteria FROM servqual_kriteria");
		return $query->result();
	}
	public function hasilnya(){
		$kuisioner_aktif=$this->db->query("SELECT * FROM kuisioner");
		$aktif_kuisioner=$kuisioner_aktif->row();
		$id_kuisioner=$aktif_kuisioner->id_kuisioner;
		$query=$this->db->query("SELECT hasil FROM servqual_kriteria ");
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
    {	
        return $this->db->query("SELECT COUNT(jawaban) as suara FROM detail_jawaban WHERE id_tenant !='0' AND jawaban='2'")->result();
    }

    public function get_row4()
    {
        $query = $this->db->query("SELECT COUNT(jawaban) as suara FROM detail_jawaban WHERE id_tenant !='0' AND jawaban='1'");
        return $query->result();
    }
}