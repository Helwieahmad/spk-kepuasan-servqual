<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class AN_admin extends CI_Controller {
	protected $login=false;
	//user data
	protected $id_user;
	protected $name_user;
	protected $nama_lengkap;
	protected $password_user;
	protected $level_user;
	protected $avatar_user;

	protected $c;

	function __construct(){
		parent::__construct();

		//Panggil database
		$this->load->database();

		//session
		$this->load->library(array(''));
		$this->login=$this->session->userdata('login');	


		//panggil helper	
		$this->load->helper(array('filter','url','text'));

		$this->load->model("saya-disembunyikan/Myuser","user");

		$this->login= $this->user->set($this->session->userdata('id_user'),$this->session->userdata('name_user'),$this->session->userdata('password_user'));
		
			$this->id_user=$this->user->id;
			$this->name_user=$this->user->name;
			$this->nama_lengkap=$this->user->nama;
			$this->password_user=$this->user->password;
			$this->level_user=$this->user->level;
			$this->avatar_user=$this->user->avatar;	
	}

	private function home(){ //Halaman Home
		
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}
		else {

		$this->load->model("saya-disembunyikan/main");

		$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>'Sistem Pendukung Keputusan Analisa Kepuasan Pengunjung Laboratorium Komputer UNIKAMA - Halaman Utama',
				'user'=>"$this->name_user",
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>1,
				'burl'=>base_url()."saya-disembunyikan",
				'data'=>$this->main->get()
				);
		$this->load->view('saya-disembunyikan/header',$data);
		$this->load->view('saya-disembunyikan/main',$data);
		$this->load->view('saya-disembunyikan/footer',$data);
		}
		
	}

	public function index(){
		$this->home();
	}

	
	function login($x=''){
		if($this->login){
			redirect('saya-disembunyikan');
		}
		$data['status']=$x;
		$this->load->view("saya-disembunyikan/login",$data);
	}

	function proseslogin(){
	 	if($this->input->post()){
	 		$user=filterquote($this->input->post("username",TRUE),"all");
	 		$pass=md5($this->input->post("password"));

	 		$cari=$this->db->get_where("user",array("name_user"=>$user,"password_user"=>$pass,"level_user"=>"1","status_user"=>"Y"));

	 		if($cari->num_rows()<1){
	 			redirect("saya-disembunyikan/login/1");
	 		}
	 		else{
	 			$row=$cari->row();
	 			$data_sessi=array('login'=>true,
	 						'id_user'=>$row->id_user,
	 						'name_user'=>$row->name_user,
	 						'password_user'=>$row->password_user,
	 						'level_user'=>$row->level_user);
	 			$this->session->set_userdata($data_sessi);
	 			redirect("saya-disembunyikan");
	 		}

	 	}
	 	else{
	 		show_404();
	 	}
	}

	function logout(){
		$data= array("login","id_user","name_user","password_user","level_user","random_filemanager_key");
		$this->session->unset_userdata($data);
		redirect("saya-disembunyikan");
	}
	
	function all_kuisioner(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/all_kuisioner","all_halaman");
			$this->all_halaman->semua_kuisioner();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Kuisioner",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>2,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/all_kuisioner',$data);
			$this->load->view('saya-disembunyikan/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function kuisioner($id=0){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}

		else { 
			$this->load->model("saya-disembunyikan/kuisioner","modul");
			$this->modul->get_kriteria();

			if($id!==0){
				$hasil=$this->modul->get_kuisioner($id);
				if($hasil==false){
					show_404();
				} else {
					$data=array(
					'avatar'=>$this->avatar_user,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
					"title"=>"Edit Kuisioner",
					"user"=>$this->name_user,
					'nama'=>$this->nama_lengkap,
					'user_level'=>$this->level_user,
					'npage'=>3,
					'burl'=>base_url()."saya-disembunyikan",
					'id_user'=>$this->id_user,
					'data'=>$hasil,
					'modul'=>"edit"
					);
					$data=array_merge($data,$hasil);
				}

			} else {

			$data=array(
					'avatar'=>$this->avatar_user,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
					"title"=>"Tambah Kuisioner",
					"user"=>$this->name_user,
					'user_level'=>$this->level_user,
					'nama'=>$this->nama_lengkap,
					'npage'=>3,
					'burl'=>base_url()."saya-disembunyikan",
					'id_user'=>$this->id_user,
					'modul'=>"new",
					"id_kuisioner"=>0,
					"periode"=>'',
					"tahun"=>'',
					"deskripsi"=>''
					);
			}
				$this->load->view('saya-disembunyikan/header',$data);
				$this->load->view('saya-disembunyikan/kuisioner',$data);
				$this->load->view('saya-disembunyikan/footer',$data);
		}
	}

	function all_kriteria(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/all_kriteria","all_halaman");
			$this->all_halaman->semua_kriteria();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Kriteria",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>4,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/all_kriteria',$data);
			$this->load->view('saya-disembunyikan/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function kriteria($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}
		else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/kriteria","halaman");
			$this->halaman->get_dimensi();
			if(!$this->halaman->get_kriteria($id)){
				show_404();
			} else {
				if ($id>0) {
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>($id==0)?"Kriteria Baru":"Edit Kriteria",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>5,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'list_dimensi'=>$this->halaman->get_list_dimensi($id),
				'data'=>$this->halaman->hasil
				);
			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/kriteria',$data);
			$this->load->view('saya-disembunyikan/footer',$data);

				}else{
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>($id==0)?"Kriteria Baru":"Edit Kriteria",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>5,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'list_dimensi'=>$this->halaman->list_dimensi,
				'data'=>$this->halaman->hasil
				);
			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/kriteria',$data);
			$this->load->view('saya-disembunyikan/footer',$data);

			}
			}

			} else {
				show_404();
			}
		}		
	}

	function all_dimensi(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/all_dimensi","all_halaman");
			$this->all_halaman->semua_dimensi();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Dimensi",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>6,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/all_dimensi',$data);
			$this->load->view('saya-disembunyikan/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function dimensi($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}
		else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/dimensi","halaman");

			if(!$this->halaman->get_dimensi($id)){
				show_404();
			} else {

			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>($id==0)?"Dimensi Baru":"Edit Dimensi",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>7,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'data'=>$this->halaman->hasil
				);
			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/dimensi',$data);
			$this->load->view('saya-disembunyikan/footer',$data);


			}

			} else {
				show_404();
			}
		}		
	}

	function all_tenant(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/all_tenant","all_halaman");
			$this->all_halaman->semua_tenant();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Tenant / Pengunjung",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>8,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/all_tenant',$data);
			$this->load->view('saya-disembunyikan/footer',$data);				

			} else {
				show_404();
			}
		}		
	}


	function tenant($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}
		else {

			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/tenant","halaman");
			$this->halaman->get_status();

			if(!$this->halaman->get_tenant($id)){
				show_404();
			} else {

			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>($id==0)?"Tenant Baru" : "Tenant Baru",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>9,
				'burl'=>base_url()."saya-disembunyikan",
				'list_status'=>$this->halaman->list_status,
				'id_user'=>$this->id_user,
				'data'=>$this->halaman->hasil
				);
			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/tenant',$data);
			$this->load->view('saya-disembunyikan/footer',$data);


			}

			} else {
				show_404();
			}
		}		
	}

	function edit_tenant($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}
		else {

			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/edit_tenant","halaman");
			if(!$this->halaman->get_tenant($id)){
				show_404();
			} else {

			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>($id==0)?"Tambah Data Tenant": "Edit Data Tenant",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>35,
				'burl'=>base_url()."saya-disembunyikan",
				'list_status'=>$this->halaman->get_list_status($id),
				'list_unit'=>$this->halaman->get_list_unit($id),
				'list_prodi'=>$this->halaman->get_list_prodi($id),
				'id_user'=>$this->id_user,
				'data'=>$this->halaman->hasil
				);
			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/edit_tenant',$data);
			$this->load->view('saya-disembunyikan/footer',$data);
			}

			} else {
				show_404();
			}
		}		
	}

	function kotak_saran(){

		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {

			$this->load->model('saya-disembunyikan/kotak_saran','inbox');

			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Kotak Saran",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>10,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'kotaksaran'=>$this->inbox->get_data()
				);	

			$this->load->view("saya-disembunyikan/header",$data);
			$this->load->view("saya-disembunyikan/kotak_saran",$data);
			$this->load->view("saya-disembunyikan/footer",$data);						
		}		
	}

	function layout_widget(){

		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			
		}		

	}

	function all_status(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}

		else {
			$this->load->model("saya-disembunyikan/all_status");
			$hasil=$this->all_status->get_status();
			$hasil=$this->all_status->hasil;

			$data=array(
					'avatar'=>$this->avatar_user,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
					"title"=>"Status",
					"user"=>$this->name_user,
					'nama'=>$this->nama_lengkap,
					'user_level'=>$this->level_user,
					'npage'=>11,
					'burl'=>base_url()."saya-disembunyikan",
					'id_user'=>$this->id_user,
					'hasil'=>$hasil
					);
				$this->load->view('saya-disembunyikan/header',$data);
				$this->load->view('saya-disembunyikan/all_status',$data);
				$this->load->view('saya-disembunyikan/footer',$data);
		}
	}

	function all_fakultas(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}

		else {
			$this->load->model("saya-disembunyikan/all_fakultas");
			$hasil=$this->all_fakultas->get_fakultas();
			$hasil=$this->all_fakultas->hasil;

			$data=array(
					'avatar'=>$this->avatar_user,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
					"title"=>"Fakultas",
					"user"=>$this->name_user,
					'nama'=>$this->nama_lengkap,
					'user_level'=>$this->level_user,
					'npage'=>12,
					'burl'=>base_url()."saya-disembunyikan",
					'id_user'=>$this->id_user,
					'hasil'=>$hasil
					);
				$this->load->view('saya-disembunyikan/header',$data);
				$this->load->view('saya-disembunyikan/all_fakultas',$data);
				$this->load->view('saya-disembunyikan/footer',$data);
		}
	}

	function all_prodi(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}

		else {
			$this->load->model("saya-disembunyikan/all_prodi");
			$hasil=$this->all_prodi->get_prodi();
			$hasil=$this->all_prodi->get_fakultas();
			$hasil=$this->all_prodi->hasil;

			$data=array(
					'avatar'=>$this->avatar_user,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
					"title"=>"prodi",
					"user"=>$this->name_user,
					'nama'=>$this->nama_lengkap,
					'user_level'=>$this->level_user,
					'npage'=>13,
					'burl'=>base_url()."saya-disembunyikan",
					'list_fakultas'=>$this->all_prodi->list_fakultas,
					'id_user'=>$this->id_user,
					'hasil'=>$hasil
					);
				$this->load->view('saya-disembunyikan/header',$data);
				$this->load->view('saya-disembunyikan/all_prodi',$data);
				$this->load->view('saya-disembunyikan/footer',$data);
		}
	}

	function input_ekspektasi(){
		$id_hasil_kuisioner=$this->input->post('id_hasil_kuisioner');
		$kode_kuisioner= $this->input->post('kode_kuisioner');
		$kode_tenant = $this->input->post('kode_tenant');
		$id_kriteria = $this->input->post('id_kriteria');
		$id_kuisioner= $this->input->post('id_kuisioner');
		$jawaban = $this->input->post('jawaban');
		$id_tenant = $this->input->post('id_tenant');
    	$result = array();
    	if (!empty($id_kriteria) && (!empty($jawaban))) {
    		foreach($id_kriteria AS $key => $val){
	     	$result[] = array(
	      	"id_kriteria"  => $_POST['id_kriteria'][$key],
	      	"id_kuisioner"  => $_POST['id_kuisioner'][$key],
	      	"jawaban"  => $_POST['jawaban'][$key],
	      	"id_tenant"  => $_POST['id_tenant'][$key]);
		    }       
	    $test= $this->db->insert_batch('detail_jawaban', $result);
	    if($test){
	    	if ($id_hasil_kuisioner==0) {
			$query=$this->db->query("INSERT INTO hasil_kuisioner (id_kuisioner,id_tenant) VALUES ('$kode_kuisioner','$kode_tenant')");
				echo "ok";
			}else{
				echo "Database Error...!!!";
			}     
	     redirect('AN_admin/ekspektasi_lab');    
	 	}else{
	     echo "Database Error";
	    }
		}else{
			echo "Belum ada Jawaban";

		}
   
	}

	function ekspektasi_lab(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/ekspektasi_lab","halaman");
			$this->halaman->get_kuisioner();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Input Ekspektasi",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>14,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->halaman->hasil,
				);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/ekspektasi_lab',$data);
			$this->load->view('saya-disembunyikan/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function hasil_kuisioner(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/hasil_kuisioner","all_halaman");
			$this->all_halaman->ambil_hasil();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Halaman Hasil Kuisioner",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>15,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/hasil_kuisioner',$data);
			$this->load->view('saya-disembunyikan/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function hasil_servqual(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/hasil_servqual","all_halaman");
			$this->all_halaman->jumlah();
			$this->all_halaman->servqual_total();
			$this->all_halaman->servqual_kriteria();
			$data=array(
				'suara1' => $this->all_halaman->get_row1(),
            	'suara2' => $this->all_halaman->get_row2(),
            	'suara3' => $this->all_halaman->get_row3(),
            	'suara4' => $this->all_halaman->get_row4(),
				'i_kuisioner'=>$this->all_halaman->no_kuisioner(),
				'i_kriteria'=>$this->all_halaman->no_kriteria(),
				'i_hasil'=>$this->all_halaman->hasilnya(),
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Halaman Hasil Servqual",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>16,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				'jumlah'=>$this->all_halaman->jumlah,
				'kriteria'=>$this->all_halaman->kriteria,
				'dimensi'=>$this->all_halaman->dimensi

			);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/hasil_servqual',$data);
			$this->load->view('saya-disembunyikan/footer',$data);			

			} else {
				show_404();
			}
		}		
	}

	function input_servqual_kriteria(){
		$id= $this->input->post('id');
		$id_kriteria = $this->input->post('id_kriteria');
		$id_kuisioner= $this->input->post('id_kuisioner');
		$hasil = $this->input->post('hasil');
		$kuisioner_id=$this->db->query("SELECT id_kuisioner FROM servqual_kriteria WHERE id_kuisioner='$id'");
		if ($kuisioner_id->num_rows()>0) {
			$result = array();
    		foreach($id_kuisioner AS $key => $val){

	     	$result[] = array(
	      	"id_kuisioner"  => $_POST['id_kuisioner'][$key],
	      	"id_kriteria"  => $_POST['id_kriteria'][$key],
	      	"hasil"  => $_POST['hasil'][$key]);
		    } 
	    $this->db->update_batch('servqual_kriteria', $result);
	    redirect('AN_admin/hasil_servqual');
		}else{
    	$result = array();
    		foreach($id_kuisioner AS $key => $val){
	     	$result[] = array(
	      	"id_kuisioner"  => $_POST['id_kuisioner'][$key],
	      	"id_kriteria"  => $_POST['id_kriteria'][$key],
	      	"hasil"  => $_POST['hasil'][$key]);
		    } 
	    $this->db->insert_batch('servqual_kriteria', $result);
	    redirect('AN_admin/hasil_servqual');

		}
	}

	function user_baru(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}
		
		else{
			if($this->level_user==1){
				$data=array(
					'avatar'=>$this->avatar_user,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
					'title'=>'User Baru',
					'user'=>$this->name_user,
					'nama'=>$this->nama_lengkap,
					'user_level'=>$this->level_user,
					'npage'=>22,
					'burl'=>base_url()."saya-disembunyikan",
					);

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/user',$data);
			$this->load->view('saya-disembunyikan/footer',$data);

			} else {
				show_404();
			}
		}
	}

	function all_user(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		}

		else {
			if($this->level_user==1){
				$this->load->model("saya-disembunyikan/daftar_user");
				$this->daftar_user->show();
				$data=array(
					'avatar'=>$this->avatar_user,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
					"title"=>"Managemen User",
					"user"=>$this->name_user,
					'nama'=>$this->nama_lengkap,
					'user_level'=>$this->level_user,
					'npage'=>21,
					'burl'=>base_url()."saya-disembunyikan",
					'table'=>$this->daftar_user->hasil
					);
				$this->load->view('saya-disembunyikan/header',$data);
				$this->load->view('saya-disembunyikan/all_user',$data);
				$this->load->view('saya-disembunyikan/footer',$data);
			} else {
				show_404();
			}
		}
	}

	function log(){
		if(!$this->login){
			redirect("saya-disembunyikan/login");
		} else {
			if($this->level_user==1){
			$this->load->model("saya-disembunyikan/log","all_halaman");
			$this->all_halaman->jumlah();
			$this->all_halaman->servqual_total();
			$data=array(
				'suara1' => $this->all_halaman->get_row1(),
            	'suara2' => $this->all_halaman->get_row2(),
            	'suara3' => $this->all_halaman->get_row3(),
            	'suara4' => $this->all_halaman->get_row4(),
				'i_kuisioner'=>$this->all_halaman->no_kuisioner(),
				'i_kriteria'=>$this->all_halaman->no_kriteria(),
				'i_hasil'=>$this->all_halaman->hasilnya(),
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Halaman Log",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>16,
				'burl'=>base_url()."saya-disembunyikan",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				'jumlah'=>$this->all_halaman->jumlah

			);			

			$this->load->view('saya-disembunyikan/header',$data);
			$this->load->view('saya-disembunyikan/log',$data);
			$this->load->view('saya-disembunyikan/footer',$data);			

			} else {
				show_404();
			}
		}		
	}

 }

?>