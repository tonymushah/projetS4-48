<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function verif_login($email,$mdp){
        $query = "SELECT count(*) as count FROM users WHERE email = '%s' AND mdp = '%s'";
        $query = sprintf($query, $email, $mdp);
        $result = $this->db->query($query);
        $row = $result->row();
        $count = $row->count;
        if ($count != 0) {
            return true;
        } else {
            return false;
        }
    }
    public function verif_email($email){
        $query = "SELECT count(*) as count FROM users WHERE email = '%s'";
        $query = sprintf($query, $email);
        $result = $this->db->query($query);
        $row = $result->row();
        $count = $row->count;
        if ($count != 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getuserbyemail($email){
        $query = "select * from users where email = '%s'";
        $query = sprintf($query, $email);
        $result = $this->db->query($query);
        $tab = array();
        foreach($result->result_array() as $row){
            $tab['iduser'] = $row['iduser'];
            $tab['nom'] = $row['nom'];
            $tab['email'] = $row['email'];
            $tab['mdp'] = $row['mdp'];
            $tab['poids'] = $row['poids'];
            $tab['taille'] = $row['taille'];
            $tab['image'] = $row['image'];
            $tab['montant'] = $row['montant'];
        }
        return $tab;
    }
    public function insert_person($nom,$email,$mdp,$poids,$taille,$image){
        $query = "INSERT INTO users VALUES (default,'%s','%s','%s','%s','%s','%s',10)";
        $query = sprintf($query, $nom, $email,$mdp,$poids,$taille,$image);
        $this->db->query($query);
        $iduser = $this->db->insert_id();
        return $iduser;
    }
}