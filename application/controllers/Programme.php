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
