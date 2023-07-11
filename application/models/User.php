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

            return $progDetails->result_object();
        }

        public function get_user_by_id($id_user){
            $query = "select * from users where idUser=".$id_user." ";
            $user = $this->db->query($query);

            return $user->result_object();
        }
    }