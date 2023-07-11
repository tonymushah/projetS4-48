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
	public function get__all_programs(){
		$this->load->model("Programme", "program");
		var_dump($this->program->get__all_programs());
	}
	public function get_current_sakafos(){
		$this->load->Model('User', "user");
		$iduser = 2;
		var_dump($this->user->get_current_sakafos($iduser));
	}
	public function get_current_activite(){
		$this->load->Model('User', "user");
		$iduser = 2;
		var_dump($this->user->get_current_activite($iduser));
	}
}
