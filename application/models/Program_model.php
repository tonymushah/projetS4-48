<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Program_model extends CI_Model {

    public function insert_sakafo($nom_sakafo,$image,$type){
        $query = "INSERT INTO sakafo VALUES (default,'%s','%s','%s')";
        $query = sprintf($query, $nom_sakafo, $image,$type);
        $this->db->query($query);
    }
    public function insert_activite($nom_activite,$image,$type){
        $query = "INSERT INTO activite VALUES (default,'%s','%s','%s')";
        $query = sprintf($query, $nom_activite, $image,$type);
        $this->db->query($query);
    }
    
}