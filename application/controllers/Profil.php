<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model("Programme", "program");
	}

	public function index()
	{
		$iduser = $this->session->user;
		$current_prog = $this->User->get_current_program($iduser);

		if (isset($current_prog)) {
			$data['current_program'] = $current_prog;
		}

		$data['user_data'] = $this->User->get_user_by_id($iduser);
		$this->load->view('profil', $data);
	}

	public function select_program()
	{
		if (isset($this->session->user)) {
			$iduser = $this->session->user;
			$current_prog = $this->User->get_current_program($iduser);
			if (isset($current_prog)) {
				redirect("index.php/profil");
			} else {
				$data["all_programs"] = $this->program->get__all_programs();
				$this->load->view("frontoffice/set_current_program", $data);
			}
		} else {
			redirect("index.php/Auth");
		}
	}
	public function validate_program_selection(){
		if (isset($this->session->user)) {
			$iduser = $this->session->user;
			$current_prog = $this->User->get_current_program($iduser);
			if (isset($current_prog)) {
				redirect("index.php/auth");
			} else {
				$iddetail = $this->input->post('program');
				$this->User->set_current_program($iduser, $iddetail);
				redirect("index.php/auth");
			}
		} else {
			redirect("index.php/Auth");
		}
	}
}
