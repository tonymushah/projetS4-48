<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->Model('User');
    }

    public function index(){
        $iduser=1;
        $current_prog = $this->User->get_current_program($iduser);
        
        if (count($current_prog) > 0) {
            $data['current_program']= $current_prog;
        }
        
        $data['user_data']= $this->User->get_user_by_id( $iduser);
        $this->load->view('profil', $data);
    }
}