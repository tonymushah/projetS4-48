<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model{
        public function get_current_program($id_user){
            $query = "select * from programme join detailsProgramme on detailsProgramme.idDetails= programme.idDetails where idUser=".$user." and  and programme.debut<now() and programme.fin>now()";
            $progDetails = $this->db->query($query);

            return $progDetails;
        }
    }