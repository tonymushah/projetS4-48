<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programme extends CI_Controller {

    public function code(){
        $code = $this->input->post('code');
        $this->load->model('Program_model');
		$code_valide = $this->Program_model->verification_code($code);
        if ($code_valide == false) {
            $data['erreur'] = "Ce code n'est pas disponible";
            $this->load->view('frontoffice/accueil',$data);
        }else{
            $code_valide = $this->Program_model->insert_list_attente($code,$_SESSION['user']);            
            redirect('index.php/Auth/accueil/'.$_SESSION['user']);
        }
    }

    public function Ajoutsakafo(){
        $this->load->view('backoffice/ajouter_sakafo');
    }

    public function Ajoutactivity(){
        $this->load->view('backoffice/ajouter_activite');
    }

    public function upload_image($nom_image){
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($nom_image);
		return $file_info = $this->upload->data();
	}

    public function insert_activity(){
        $nom = $this->input->post('nom');
        $image = $this->upload_image('image');
        $type = $this->input->post('type');
        $this->load->model('Program_model');
		$this->Program_model->insert_activite($nom,$image['file_name'],$type);
        $this->load->view('backoffice/accueil_admin');
    }    

    public function insert_sakafo(){
        $nom = $this->input->post('nom');
        $image = $this->upload_image('image');
        $type = $this->input->post('type');
        $this->load->model('Program_model');
		$this->Program_model->insert_sakafo($nom,$image['file_name'],$type);
        $this->load->view('backoffice/accueil_admin');
    }

    public function validate_code_admin($idliste_attente,$status){
        if($status == 1){
            $this->load->model('Program_model');
            $this->Program_model->validate_list_attente($idliste_attente);
            $this->load->view('backoffice/accueil_admin');
        }else if ($status == 2) {
            $this->load->view('backoffice/accueil_admin');
        }
    }

}
