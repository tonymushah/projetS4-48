<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    
    public function test(){
        $this->load->Model('User');
        $iduser= 2;
        $function= $this->User->get_user_by_id($iduser);
        var_dump($function);
    }
}