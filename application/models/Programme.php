<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Programme extends CI_Model{
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function get_program_by_id($idProgramme){
            $query = "select * from programme join detailsProgramme on programme.idDetails=detailsProgramme.idDetails where idProgramme=".$idProgramme." ";
            $progDetails = $this->db->query($query);

            return $progDetails->result_object();
        }

        public function get_current_sakafo($idProgramme){
            $query = "SELECT *
                FROM detailsProgramme
                JOIN programme ON programme.idDetails = detailsProgramme.idDetails
                JOIN relation_dp_sakafo ON relation_dp_sakafo.idDetails = detailsProgramme.idDetails
                JOIN sakafo ON relation_dp_sakafo.idSakafo = sakafo.idSakafo
                where programme.debut<now() and programme.fin>now() and programme.idProgramme=".$idProgramme." ";

            $table = $this->db->query($query);

            return $table->result_object();
        }

        public function get_current_activite($idProgramme){
            $query = "SELECT *
                FROM detailsProgramme
                JOIN programme ON programme.idDetails = detailsProgramme.idDetails
                JOIN relation_dp_activite ON relation_dp_activite.idDetails = detailsProgramme.idDetails
                JOIN activite ON relation_dp_activite.idActivite = activite.idActivite
                where programme.debut<now() and programme.fin>now() and programme.idProgramme=".$idProgramme." ";
            $table = $this->db->query($query);

            return $table->result_object();
        }

        public function modify_program($idProgramme, $dateFin){
            $query = "update programme set fin = '".$dateFin."' where idProgramme = ".$idProgramme." and programme.debut<now() and programme.fin>now()";
            $this->db->query($query);
            return $query;
        }
		public function get__sakafo($idProgramme){
			$query = sprintf("select * from v_programme_sakafo where idprogramme=%d", $idProgramme);
			return $this->db->query($query)->result_object();
		}
		public function get__activite($idProgramme){
			$query = sprintf("select * from V_Programme_Activite where idProgramme=%d", $idProgramme);
			return $this->db->query($query)->result_object();
		}
		public function get__detail_programm_by_id($id_detail_program){
			$query = sprintf("select * from detailsProgramme where idDetails=%d", $id_detail_program);
			$result = $this->db->query($query)->result_object();
			if(count($result) == 1){
				return $result[0];
			}
		}
    }
