<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class AN_staff extends CI_Controller {
	protected $login=false;
	//user database
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

		$this->load->model("staff/Myuser","user");

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
			redirect("staff/login");
		}
		else {

		$this->load->model("staff/main");

		$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>'Sistem Pendukung Keputusan Analisa Kepuasan Pengunjung Laboratorium Komputer UNIKAMA - Halaman Utama',
				'user'=>"$this->name_user",
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>1,
				'burl'=>base_url()."staff",
				'data'=>$this->main->get()
				);
		$this->load->view('staff/header',$data);
		$this->load->view('staff/main',$data);
		$this->load->view('staff/footer',$data);
		}
		
	}

	function index(){
		$this->home();
	}
	
	function login($x=''){
		if($this->login){
			redirect('staff');
		}
		$data['status']=$x;
		$this->load->view("staff/login",$data);
	}

	function proseslogin(){
	 	if($this->input->post()){
	 		$user=filterquote($this->input->post("username",TRUE),"all");
	 		$pass=md5($this->input->post("password"));

	 		$cari=$this->db->get_where("user",array("name_user"=>$user,"password_user"=>$pass,"level_user"=>"2","status_user"=>"Y"));

	 		if($cari->num_rows()<1){
	 			redirect("staff/login/1");
	 		}
	 		else{
	 			$row=$cari->row();
	 			$data_sessi=array('login'=>true,
	 						'id_user'=>$row->id_user,
	 						'name_user'=>$row->name_user,
	 						'password_user'=>$row->password_user,
	 						'level_user'=>$row->level_user);
	 			$this->session->set_userdata($data_sessi);
	 			redirect("staff");
	 		}

	 	}
	 	else{
	 		show_404();
	 	}
	}

	function logout(){
		$data= array("login","id_user","name_user","password_user","level_user","random_filemanager_key");
		$this->session->unset_userdata($data);
		redirect("staff");
	}
	
	function all_kuisioner(){
		if(!$this->login){
			redirect("staff/login");
		} else {
			if($this->level_user==2){
			$this->load->model("staff/all_kuisioner","all_halaman");
			$this->all_halaman->semua_kuisioner();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Kuisioner",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>2,
				'burl'=>base_url()."staff",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('staff/header',$data);
			$this->load->view('staff/all_kuisioner',$data);
			$this->load->view('staff/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function kuisioner($id=0){
		if(!$this->login){
			redirect("staff/login");
		}

		else { 
			$this->load->model("staff/kuisioner","modul");
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
					'burl'=>base_url()."staff",
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
					'burl'=>base_url()."staff",
					'id_user'=>$this->id_user,
					'modul'=>"new",
					"id_kuisioner"=>0,
					"periode"=>'',
					"tahun"=>'',
					"deskripsi"=>''
					);
			}
				$this->load->view('staff/header',$data);
				$this->load->view('staff/kuisioner',$data);
				$this->load->view('staff/footer',$data);
		}
	}

	function all_kriteria(){
		if(!$this->login){
			redirect("staff/login");
		} else {
			if($this->level_user==2){
			$this->load->model("staff/all_kriteria","all_halaman");
			$this->all_halaman->semua_kriteria();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Kriteria",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>4,
				'burl'=>base_url()."staff",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('staff/header',$data);
			$this->load->view('staff/all_kriteria',$data);
			$this->load->view('staff/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function kriteria($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("staff/login");
		}
		else {
			if($this->level_user==2){
			$this->load->model("staff/kriteria","halaman");
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
						'burl'=>base_url()."staff",
						'id_user'=>$this->id_user,
						'list_dimensi'=>$this->halaman->get_list_dimensi($id),
						'data'=>$this->halaman->hasil
						);
						$this->load->view('staff/header',$data);
						$this->load->view('staff/kriteria',$data);
						$this->load->view('staff/footer',$data);
					}else{
						$data=array(
						'avatar'=>$this->avatar_user,
						'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
						'title'=>($id==0)?"Kriteria Baru":"Edit Kriteria",
						'user'=>$this->name_user,
						'nama'=>$this->nama_lengkap,
						'user_level'=>$this->level_user,
						'npage'=>5,
						'burl'=>base_url()."staff",
						'id_user'=>$this->id_user,
						'list_dimensi'=>$this->halaman->list_dimensi,
						'data'=>$this->halaman->hasil
						);
						$this->load->view('staff/header',$data);
						$this->load->view('staff/kriteria',$data);
						$this->load->view('staff/footer',$data);		
					}
			}
			} else {
				show_404();
			}
		}		
	}

	function all_dimensi(){
		if(!$this->login){
			redirect("staff/login");
		} else {
			if($this->level_user==2){
			$this->load->model("staff/all_dimensi","all_halaman");
			$this->all_halaman->semua_dimensi();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Dimensi",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>6,
				'burl'=>base_url()."staff",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('staff/header',$data);
			$this->load->view('staff/all_dimensi',$data);
			$this->load->view('staff/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function dimensi($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("staff/login");
		}
		else {
			if($this->level_user==2){
			$this->load->model("staff/dimensi","halaman");

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
				'burl'=>base_url()."staff",
				'id_user'=>$this->id_user,
				'data'=>$this->halaman->hasil
				);
			$this->load->view('staff/header',$data);
			$this->load->view('staff/dimensi',$data);
			$this->load->view('staff/footer',$data);


			}

			} else {
				show_404();
			}
		}		
	}

	function all_tenant(){
		if(!$this->login){
			redirect("staff/login");
		} else {
			if($this->level_user==2){
			$this->load->model("staff/all_tenant","all_halaman");
			$this->all_halaman->semua_tenant();
			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Semua Data Tenant / Pengunjung",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>8,
				'burl'=>base_url()."staff",
				'id_user'=>$this->id_user,
				'hasil'=>$this->all_halaman->hasil,
				);			

			$this->load->view('staff/header',$data);
			$this->load->view('staff/all_tenant',$data);
			$this->load->view('staff/footer',$data);				

			} else {
				show_404();
			}
		}		
	}


	function Tenant($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("staff/login");
		}
		else {

			if($this->level_user==2){
			$this->load->model("staff/tenant","halaman");
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
				'burl'=>base_url()."staff",
				'list_status'=>$this->halaman->list_status,
				'id_user'=>$this->id_user,
				'data'=>$this->halaman->hasil
				);
			$this->load->view('staff/header',$data);
			$this->load->view('staff/tenant',$data);
			$this->load->view('staff/footer',$data);


			}

			} else {
				show_404();
			}
		}		
	}

	function Edit_tenant($id=0){
		$id=abs($id);
		if(!$this->login){
			redirect("staff/login");
		}
		else {

			if($this->level_user==2){
			$this->load->model("staff/edit_tenant","halaman");
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
				'burl'=>base_url()."staff",
				'list_status'=>$this->halaman->get_list_status($id),
				'list_unit'=>$this->halaman->get_list_unit($id),
				'list_prodi'=>$this->halaman->get_list_prodi($id),
				'id_user'=>$this->id_user,
				'data'=>$this->halaman->hasil
				);
			$this->load->view('staff/header',$data);
			$this->load->view('staff/edit_tenant',$data);
			$this->load->view('staff/footer',$data);
			}

			} else {
				show_404();
			}
		}		
	}

	function kotak_saran(){

		if(!$this->login){
			redirect("staff/login");
		} else {

			$this->load->model('staff/kotak_saran','inbox');

			$data=array(
				'avatar'=>$this->avatar_user,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_user,
				'title'=>"Kotak Saran",
				'user'=>$this->name_user,
				'nama'=>$this->nama_lengkap,
				'user_level'=>$this->level_user,
				'npage'=>10,
				'burl'=>base_url()."staff",
				'id_user'=>$this->id_user,
				'kotaksaran'=>$this->inbox->get_data()
				);	

			$this->load->view("staff/header",$data);
			$this->load->view("staff/kotak_saran",$data);
			$this->load->view("staff/footer",$data);						
		}		
	}

	function layout_widget(){

		if(!$this->login){
			redirect("staff/login");
		} else {
			
		}		

	}

	function all_status(){
		if(!$this->login){
			redirect("staff/login");
		}

		else {
			$this->load->model("staff/all_status");
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
					'burl'=>base_url()."staff",
					'id_user'=>$this->id_user,
					'hasil'=>$hasil
					);
				$this->load->view('staff/header',$data);
				$this->load->view('staff/all_status',$data);
				$this->load->view('staff/footer',$data);
		}
	}

	function all_fakultas(){
		if(!$this->login){
			redirect("staff/login");
		}

		else {
			$this->load->model("staff/all_fakultas");
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
					'burl'=>base_url()."staff",
					'id_user'=>$this->id_user,
					'hasil'=>$hasil
					);
				$this->load->view('staff/header',$data);
				$this->load->view('staff/all_fakultas',$data);
				$this->load->view('staff/footer',$data);
		}
	}

	function all_prodi(){
		if(!$this->login){
			redirect("staff/login");
		}

		else {
			$this->load->model("staff/all_prodi");
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
					'burl'=>base_url()."staff",
					'list_fakultas'=>$this->all_prodi->list_fakultas,
					'id_user'=>$this->id_user,
					'hasil'=>$hasil
					);
				$this->load->view('staff/header',$data);
				$this->load->view('staff/all_prodi',$data);
				$this->load->view('staff/footer',$data);
		}
	}
	function form(){
		echo "
		<form method='post' action='test'>
		<input type='text' name='data' value='ando\"sasss'>
		</form>	";
	}
 }

?>