<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model{
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function get_current_program($id_user){
            $query = "select * from programme join detailsProgramme on detailsProgramme.idDetails= programme.idDetails where idUser=".$id_user." and programme.debut<now() and programme.fin>now()";
            $progDetails = $this->db->query($query);
			if(count($progDetails) >= 1){
				$cpr = $progDetails->result_object();
            	return $cpr[0];
			}
        }
		
		public function get_current_sakafos($id_user){
			$prog = $this->get_current_program($id_user);
			$query = sprintf("select * from v_programme_sakafo where idprogramme=%d", $prog->idprogramme);
			$data = new stdClass();
			$data->prog = $prog;
			$data->result = $this->db->query($query)->result_object();
			return $data;
		}
		
		public function get_current_activite($id_user){
			$prog = $this->get_current_program($id_user);
			$query = sprintf("select * from v_programme_activite where idprogramme=%d", $prog->idprogramme);
			$data = new stdClass();
			$data->prog = $prog;
			$data->result = $this->db->query($query)->result_object();
			return $data;
		}
        public function get_user_by_id($id_user){
            $query = "select * from users where idUser=".$id_user." ";
            $user = $this->db->query($query);

            return $user->result_object();
        }
		public function set_current_program($id_user, $id_detail_program){
			$this->load->model("Programme", "program");
			$current = $this->get_current_program($id_user);
			if(is_array($current)){
				if(count($current) >= 1){
					throw new ErrorException("The user already have an ongoing another program");
				}else{
					$dtp = $this->program->get__detail_programm_by_id($id_detail_program);
					if(isset($dtp)){
						$query = sprintf("insert into programme values(default, %s, %s, %d, %d)", "CURRENT_DATE", sprintf("CURRENT_DATE + %d", $dtp->duree_jour), $id_user, $id_detail_program);
						$this->db->query($query);
						return $this->get_current_program($id_user);
					}
				}
			}
		}
    }
