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
    public function verification_code($code){
        $query = "SELECT count(*) FROM code WHERE idcode = '%s'";
        $query = sprintf($query,$code);
        $result = $this->db->query($query);
        $row = $result->row();
        $count = $row->count;
        if ($count == 0) {
            return false;
        } 
        $query = "SELECT status_ FROM code WHERE idcode = '%s'";
        $query = sprintf($query,$code);
        $result = $this->db->query($query);
        $row = $result->row();
        $status = $row->status_;
        if($status != 0){
            return false;
        }
        return true;
    }
    public function insert_list_attente($idcode,$iduser){
        $query = "INSERT INTO liste_attente VALUES (default,'%s','%s',0)";
        $query = sprintf($query, $idcode, $iduser);
        $this->db->query($query);
        $sql = "UPDATE code SET status_ = 1 WHERE idcode = '%s'";
        $sql = sprintf($sql,$idcode);
        $this->db->query($sql);
    }

    public function getalllistattente(){
        $query = "SELECT l.idliste as idliste,l.idcode as idcode,u.nom as nom,c.montant as montant,validation_ as validation_ FROM liste_attente as l JOIN code as c ON l.idcode = c.idcode JOIN users as u ON u.iduser = l.iduser";
        $query = $this->db->query($query);
        $tab = array();
        $i= 0;
        foreach($query->result_array() as $row){
            $tab[$i]['idliste'] = $row['idliste'];
            $tab[$i]['idcode'] = $row['idcode'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['montant'] = $row['montant'];            
            $tab[$i]['validation_'] = $row['validation_'];
            $i++;
        }
        return $tab;
    }

    public function getallperson(){
        $query = "select * from users";
        $query = $this->db->query($query);
        $tab = array();
        $i= 0;
        foreach($query->result_array() as $row){
            $tab[$i]['iduser'] = $row['iduser'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['email'] = $row['email'];
            $tab[$i]['mdp'] = $row['mdp'];
            $tab[$i]['poids'] = $row['poids'];
            $tab[$i]['taille'] = $row['taille'];
            $tab[$i]['image'] = $row['image'];
            $tab[$i]['montant'] = $row['montant'];
            $i++;
        }
        return $tab;
    }

    public function getallsakafomahia(){
        $query = "select * from sakafo where type_ = 0";
        $query = $this->db->query($query);
        $tab = array();
        $i= 0;
        foreach($query->result_array() as $row){
            $tab[$i]['idsakafo'] = $row['idsakafo'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['images'] = $row['images'];
            $tab[$i]['type_'] = $row['type_'];
            $i++;
        }
        return $tab;
    }

    public function getallsakafomatavy(){
        $query = "select * from sakafo where type_ = 1";
        $query = $this->db->query($query);
        $tab = array();
        $i= 0;
        foreach($query->result_array() as $row){
            $tab[$i]['idsakafo'] = $row['idsakafo'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['images'] = $row['images'];
            $tab[$i]['type_'] = $row['type_'];
            $i++;
        }
        return $tab;
    }

    public function getallactivitemahia(){
        $query = "select * from activite where type_ = 0";
        $query = $this->db->query($query);
        $tab = array();
        $i= 0;
        foreach($query->result_array() as $row){
            $tab[$i]['idactivite'] = $row['idactivite'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['images'] = $row['images'];
            $tab[$i]['type_'] = $row['type_'];
            $i++;
        }
        return $tab;
    }
    public function getallactivitematavy(){
        $query = "select * from activite where type_= 1";
        $query = $this->db->query($query);
        $tab = array();
        $i= 0;
        foreach($query->result_array() as $row){
            $tab[$i]['idactivite'] = $row['idactivite'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['images'] = $row['images'];
            $tab[$i]['type_'] = $row['type_'];
            $i++;
        }
        return $tab;
    }

    public function getallcode(){
        $query = "select idcode from code";
        $query = $this->db->query($query);
        $tab = array();
        $i= 0;
        foreach($query->result_array() as $row){
            $tab[$i]['idcode'] = $row['idcode'];
            $i++;
        }
        return $tab;
    }

    public function validate_list_attente($idliste_attente){
        $sql = "UPDATE liste_attente SET validation_ = 1 WHERE idliste = '%s'";
        $sql = sprintf($sql,$idliste_attente);
        $this->db->query($sql);
        $query = "SELECT l.iduser as iduser,c.montant as montant FROM liste_attente as l JOIN code as c ON l.idcode = c.idcode WHERE l.idliste = '%s'";
        $query = sprintf($query,$idliste_attente);
        $result = $this->db->query($query);
        $row = $result->row();
        $iduser = $row->iduser; 
        $montant = $row->montant;
        $sql = "UPDATE users AS u SET montant = (SELECT u.montant + '%s' FROM users AS us WHERE us.iduser = '%s') WHERE u.iduser IN (SELECT l.iduser FROM liste_attente AS l WHERE l.idliste = '%s')";
        $sql = sprintf($sql,$montant,$iduser,$idliste_attente);
        $this->db->query($sql);
    }

}