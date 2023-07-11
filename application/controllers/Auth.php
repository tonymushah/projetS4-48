<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller {
public function __construct(){
	parent::__construct();
	$this->load->database('db');
	$this->load->Model('User');
}
  public function index()
	{
		if(isset($this->session->user)){
			redirect("index.php/Auth/accueil");
		}else{
			$this->load->view('frontoffice/login');
		}
	}
	public function error_login()
	{
		$data['errorl'] = 'Your Account is Invalid';
		$data['formdata'] = $this->session->flashdata('error_login');
		$this->load->view('frontoffice/login', $data);
	}
	public function inscription()
	{
		$this->load->view('frontoffice/inscription');
	}
	public function error_sign()
	{
		$data['errors'] = 'use an another email';
		$data['formdata'] = $this->session->flashdata('error_sign');
		if($this->session->flashdata("throwable") !== null){
			$data["throwable"] = $this->session->flashdata("throwable");
		}
		$this->load->view('frontoffice/inscription', $data);
	}
	public function accueil(){
		$id = $this->session->user;
		if(isset($id)){
			$current_prog = $this->User->get_current_program($id);
        $data = array();
		if (isset($current_prog)) {
			$data['current_program']= $current_prog;
        }
		$user = $this->User->get_user_by_id($id);
        $data['user_data']= $user[0];
		$data['user'] = $id;		
		$this->load->view('frontoffice/accueil', $data);
		}else{
			redirect("index.php/Auth");
		}
	}

	public function contact(){
		$this->load->view('frontoffice/contact');
	}

	public function upload_image($nom_image){
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($nom_image);
		return $file_info = $this->upload->data();
	}

	public function process_login()
	{
		$email = $this->input->post('email');
		$mdp = $this->input->post('password');
		$this->load->model('Login_model');
		$verif = $this->Login_model->verif_login($email, $mdp);
		if ($verif == null) {
			redirect('index.php/Auth/error_login');
			$this->session->set_flashdata('error_login', $this->input->post());
		} else {
			$user = $this->Login_model->getuserbyemail($email);
			$_SESSION['user'] = $user['iduser'];		
			redirect('index.php/Auth/accueil/');
		}
	}
	public function process_inscription()
	{
		
			$nom = $this->input->post('name');
			$email = $this->input->post('email');
			$mdp = $this->input->post('password');
			$weight = $this->input->post('poids');
			$taille = $this->input->post('taille');
			$image = $this->upload_image('image');
			$this->load->model('Login_model');
		try {
			$verif = $this->Login_model->verif_email($email);
			if ($verif == null) {
				$iduser = $this->Login_model->insert_person($nom, $email, $mdp, $weight, $taille, $image['file_name']);
				$this->session->set_userdata('user', $iduser);
				redirect('index.php/Auth/accueil/' . $_SESSION['user']);
			} else {
				$this->session->set_flashdata('error_sign', $this->input->post());
				redirect('index.php/Auth/error_sign');
			}
		} catch (\Throwable $th) {
			$this->session->set_flashdata('error_sign', $this->input->post());
			$this->session->set_flashdata("throwable", $th->getMessage());
			redirect('index.php/Auth/error_sign');
		}
	}

	//admin

	public function login_admin()
	{
		$this->load->view('backoffice/login_admin');
	}

	public function process_login_admin()
	{
		$email = $this->input->post('email');
		$mdp = $this->input->post('password');
		if ($email == "admin@gmail.com" && $mdp == "admin") {
			redirect('index.php/Auth/accueil_admin');
		} else {
			redirect('index.php/Auth/error_login_admin');
		}
	}

	public function accueil_admin()
	{
		$this->load->view('backoffice/accueil_admin');
	}

	public function error_login_admin()
	{
		$data['errorl'] = 'Admin account is incorrect';
		$this->load->view('backoffice/login_admin', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		redirect('index.php/Auth');
	}
}
