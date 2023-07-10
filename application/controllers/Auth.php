<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
public function __construct(){
	parent::__construct();
	$this->load->database('db');
}
	public function index()
	{
		$this->load->view('login');
	}
	public function error_login(){
		$data['errorl'] = 'Your Account is Invalid';  
		$data['formdata'] = $this->session->flashdata('error_login');
		$this->load->view('login',$data);
	}	
	public function inscription(){
		$this->load->view('inscription');
	}
	public function error_sign(){
		$data['errors'] = 'use an another email'; 
		$data['formdata'] = $this->session->flashdata('error_sign');
		$this->load->view('inscription',$data);
	}

	public function logout(){    
        $this->session->unset_userdata('iduser');  
		redirect("index.php/Auth");  
    }

	public function accueil($id){
		$data['user'] = $id;		
		$this->load->view('accueil',$data);
	}

	public function upload_image($nom_image){
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($nom_image);
		return $file_info = $this->upload->data();
	}

	public function process_login(){
		$email = $this->input->post('email');
		$mdp = $this->input->post('password');
		$this->load->model('Login_model');
		$verif = $this->Login_model->verif_login($email,$mdp);
		if($verif == null){
			redirect('index.php/Auth/error_login');
			$this->session->set_flashdata('error_login',$this->input->post());
		}else{
			$user = $this->Login_model->getuserbyemail($email);
			$_SESSION['iduser'] = $user['iduser'];		
			redirect('index.php/Auth/accueil/'.$_SESSION['iduser']);
		}
	}
	public function process_inscription(){
		$nom = $this->input->post('name');
		$email = $this->input->post('email');
		$mdp = $this->input->post('password');
		$weight = $this->input->post('poids');
		$taille = $this->input->post('taille');
		$image = $this->upload_image('image');
		$this->load->model('Login_model');
		$verif = $this->Login_model->verif_email($email);
		if($verif == null){
			$iduser = $this->Login_model->insert_person($nom,$email,$mdp,$weight,$taille,$image['file_name']);
			$this->session->set_userdata('iduser',$iduser);
			redirect('index.php/Auth/accueil/'.$_SESSION['iduser']);
		}else{
			$this->session->set_flashdata('error_sign',$this->input->post());
			redirect('index.php/Auth/error_sign');
		}
	}

}
