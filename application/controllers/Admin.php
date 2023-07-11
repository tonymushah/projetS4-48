<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database('db');
    }
	public function index(){
        $this->load->view('backoffice/accueil_admin');
    }
    public function list_person(){
        $this->load->model('Program_model');
		$data['person'] = $this->Program_model->getallperson();
        $this->load->view('backoffice/list_person',$data);
    }
    public function notification(){        
        $this->load->model('Program_model');
		$data['list'] = $this->Program_model->getalllistattente();
        $this->load->view('backoffice/notification',$data);
    }
    public function list_sakafo(){
        $this->load->model('Program_model');
		$data['matavy'] = $this->Program_model->getallsakafomatavy();
		$data['mahia'] = $this->Program_model->getallsakafomahia();
        $this->load->view('backoffice/list_sakafo',$data);
    }
    public function list_activite(){
        $this->load->model('Program_model');
		$data['mahia'] = $this->Program_model->getallactivitemahia();
		$data['matavy'] = $this->Program_model->getallactivitematavy();
        $this->load->view('backoffice/list_activite',$data);
    }

}
