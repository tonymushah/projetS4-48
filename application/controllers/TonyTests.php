<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TonyTests extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Programme", "program");
		$this->load->model("User", "user");
	}
	public function sakafo()
	{
		$idProgramme = 1;
		foreach ($this->program->get__sakafo($idProgramme) as $key => $value) {
			var_dump($value);
		}
	}
	public function activite(){
		$idProgramme = 1;
		foreach ($this->program->get__activite($idProgramme) as $key => $value) {
			var_dump($value);
		}
	}
	public function get_current_program(){
		var_dump($this->user->get_current_program(4));
	}
	public function set_current_program(){
		var_dump($this->user->set_current_program(3,1));
	}
}
