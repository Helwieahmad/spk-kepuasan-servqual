<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class AN_tenant extends CI_Controller {
	protected $login=false;
	//user data
	protected $id_tenant;
	protected $npm;
	protected $nama_lengkap;
	protected $password;
	protected $level_tenant;
	protected $avatar_tenant;
	protected $c;

	function __construct(){
		parent::__construct();

		//Panggil database
		$this->load->database();

		//session
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->login=$this->session->userdata('login');	


		//panggil helper	
		$this->load->helper(array('filter','url','text','form','security'));

		$this->load->model("tenant/Mytenant","tenant");

		$this->login= $this->tenant->set($this->session->userdata('id_tenant'),$this->session->userdata('npm'),$this->session->userdata('password'));
		
			$this->id_tenant=$this->tenant->id;
			$this->npm=$this->tenant->npm;
			$this->nama_lengkap=$this->tenant->nama;
			$this->email=$this->tenant->email;
			$this->password=$this->tenant->password;
			$this->level_tenant=$this->tenant->level;
			$this->avatar_tenant=$this->tenant->avatar;	
	}

	Public function get_unit()
	{
		  $result=$this->db->where('id_fakultas','8')
						->get('prodi')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id_prodi;
			$data['label']=$r->nama_prodi;
			$json[]=$data;
		}
		echo json_encode($json);
	}

	Public function get_fakultas()
	{
		$query=$this->db->get('fakultas');
        $result= $query->result();
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id_fakultas;
			$data['label']=$r->nama_fakultas;
			$json[]=$data;
		}
		echo json_encode($json);
	}

	Public function get_prodi()
	{
		  $result=$this->db->where('id_fakultas',$_POST['id'])
						->get('prodi')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id_prodi;
			$data['label']=$r->nama_prodi;
			$json[]=$data;
		}
		echo json_encode($json);
	}

	private function home(){ //Halaman Home
		
		if(!$this->login){
			redirect("tenant/login");
		}
		else {

		$this->load->model("tenant/main");

		$data=array(
				'avatar'=>$this->avatar_tenant,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_tenant,
				'title'=>'Sistem Pendukung Keputusan Analisa Kepuasan Pengunjung Laboratorium Komputer UNIKAMA - Halaman Utama',
				'tenant'=>"$this->npm",
				'nama'=>$this->nama_lengkap,
				'tenant_level'=>$this->level_tenant,
				'npage'=>1,
				'burl'=>base_url()."tenant",
				'data'=>$this->main->get()
				);
		$this->load->view('tenant/header',$data);
		$this->load->view('tenant/main',$data);
		$this->load->view('tenant/footer',$data);
		}
		
	}
	function input_jawaban(){
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
	     redirect('AN_tenant/jawab_kuisioner');    
	 	}else{
	     echo "Database Error";
	    }
		}else{
			echo "Belum ada Jawaban";

		}
   
	}
	function index(){
		$this->home();
	}
	
	function login($x=''){
		if($this->login){
			redirect('tenant');
		}
		$data['status']=$x;
		$this->load->view("tenant/login",$data);
	}

	function proseslogin(){
	 	if($this->input->post()){
	 		$npm=filterquote($this->input->post("npm",TRUE),"all");
	 		$pass=md5($this->input->post("password"));

	 		$cari=$this->db->get_where("tenant",array("npm"=>$npm,"password"=>$pass,"level_tenant"=>"3"));

	 		if($cari->num_rows()<1){
	 			redirect("tenant/login/1");
	 		}
	 		else{
	 			$row=$cari->row();
	 			$data_sessi=array('login'=>true,
	 						'id_tenant'=>$row->id_tenant,
	 						'npm'=>$row->npm,
	 						'password'=>$row->password,
	 						'level_tenant'=>$row->level_tenant);
	 			$this->session->set_userdata($data_sessi);
	 			redirect("tenant");
	 		}

	 	}
	 	else{
	 		show_404();
	 	}
	}

	function logout(){
		$data= array("login","id_tenant","npm","password","level_tenant","random_filemanager_key");
		$this->session->unset_userdata($data);
		redirect("tenant");
	}

	function register()
    {	
    	$this->load->model("tenant/Mytenant","tenant");
    		$this->tenant->get_status();
			$data = array(
				'list_status'=>$this->tenant->list_status,
				'data'=>$this->tenant->hasil
			);
		//set validation rules
		$this->form_validation->set_rules('npm', 'NPM / NIDN /NIK', 'trim|required|numeric|min_length[5]|max_length[30]|is_unique[tenant.npm]|xss_clean');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|required|matches[cpassword]|md5');
		$this->form_validation->set_rules('cpassword', 'Konfirmasi Password', 'trim|required|md5');
	
		//validate form input
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$this->load->view('tenant/register',$data);
        }
		else
		{
			//insert the user registration details into database
			$data = array(
				'npm' => $this->input->post('npm'),
				'password' => $this->input->post('password'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),
				'level_tenant' => $this->input->post('level_tenant'),
				'tanggal_daftar' => $this->input->post('tanggal_daftar')

			);
	
			// insert form data into database
			if ($this->tenant->insertUser($data))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissable">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Anda telah berhasil mendaftar! Silahkan Login untuk memperbarui data diri Anda Terima Kasih.</div>');
					redirect('tenant/register');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissable">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Oops! Error. Sepertinya Kami tidak bisa menghubungi system database Kami. Mungkin karena server database kammi Offline !!!</div>');
				redirect('tenant/register');
			}
		}
	}
	

	function jawab_kuisioner(){
		if(!$this->login){
			redirect("tenant/login");
		} else {
			if($this->level_tenant==3){
			$this->load->model("tenant/jawab_kuisioner","halaman");
			$this->halaman->get_kuisioner();
			$data=array(
				'avatar'=>$this->avatar_tenant,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_tenant,
				'title'=>"Jawab Kuisioner",
				'npm'=>$this->npm,
				'nama'=>$this->nama_lengkap,
				'tenant_level'=>$this->level_tenant,
				'npage'=>2,
				'burl'=>base_url()."tenant",
				'id_tenant'=>$this->id_tenant,
				'hasil'=>$this->halaman->hasil,
				);			

			$this->load->view('tenant/header',$data);
			$this->load->view('tenant/jawab_kuisioner',$data);
			$this->load->view('tenant/footer',$data);				

			} else {
				show_404();
			}
		}		
	}

	function kirim_saran($id=0){
		if(!$this->login){
			redirect("tenant/login");
		}
		else{
			$this->load->model("tenant/edit_tenant","hal");
			if($this->level_tenant==3){
				$this->hal->get_tenant();
				$data=array(
					'avatar'=>$this->avatar_tenant,
					'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_tenant,
					'title'=>'Kirim Saran',
					'npm'=>$this->npm,
					'nama'=>$this->nama_lengkap,
					'email'=>$this->email,
					'tenant_level'=>$this->level_tenant,
					'npage'=>3,
					'burl'=>base_url()."tenant",
					'data'=>$this->hal->hasil
					);

			$this->load->view('tenant/header',$data);
			$this->load->view('tenant/kirim_saran',$data);
			$this->load->view('tenant/footer',$data);

			} else {
				show_404();
			}
		}
	}

	function edit_tenant(){
		if(!$this->login){
			redirect("tenant/login");
		}
		else {
			if($this->level_tenant==3){
			$this->load->model("tenant/edit_tenant","halaman");

			if(!$this->halaman->get_tenant()){
				show_404();
			} else {
				$this->halaman->ganti_foto();
			$data=array(
				'avatar'=>$this->avatar_tenant,
				'path_avatar'=>base_url()."an-component/media/upload-user-avatar/".$this->avatar_tenant,
				'title'=>"Edit Data Tenant",
				'npm'=>$this->npm,
				'nama'=>$this->nama_lengkap,
				'tenant_level'=>$this->level_tenant,
				'npage'=>4,
				'burl'=>base_url()."tenant",
				'list_status'=>$this->halaman->get_list_status(),
				'list_unit'=>$this->halaman->get_list_unit(),
				'list_prodi'=>$this->halaman->get_list_prodi(),
				'id_tenant'=>$this->id_tenant,
				'data'=>$this->halaman->hasil,
				'ambil'=>$this->halaman->ambil
				);
			$this->load->view('tenant/header',$data);
			$this->load->view('tenant/edit_tenant',$data);
			$this->load->view('tenant/footer',$data);
			}

			} else {
				show_404();
			}
		}		
	}

	function layout_widget(){

		if(!$this->login){
			redirect("tenant/login");
		} else {
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