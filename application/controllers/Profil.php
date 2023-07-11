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

		if (count($current_prog) > 0) {
			$data['current_program'] = $current_prog[0];
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
				redirect("profil");
			} else {
				$data["all_programs"] = $this->program->get__all_programs();
				$this->load->view("frontoffice/set_current_program", $data);
			}
		} else {
			redirect("Auth");
		}
	}
	public function validate_program_selection(){
		if (isset($this->session->user)) {
			$iduser = $this->session->user;
			$current_prog = $this->User->get_current_program($iduser);
			if (isset($current_prog)) {
				redirect("profil");
			} else {
				$iddetail = $this->input->post('program');
				$this->User->set_current_program($iduser, $iddetail);
				redirect("profil");
			}
		} else {
			redirect("Auth");
		}
	}
}
