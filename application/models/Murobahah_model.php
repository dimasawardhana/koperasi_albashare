<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murobahah_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}

	public function get_pembiayaan_murobahah($id_rekening){
    	$this->db->where('id_rekening',$id_rekening);
    	$query = $this->db->get('pembiayaan_murobahah');
    	return $query->result();
  	}
  	public function getBayar_murobahahById($id_murobahah){
    	$this->db->where('id_murobahah',$id_murobahah);
    	$query = $this->db->get('bayar_murobahah');
    	return $query->result();
  	}
  	public function get_murobahahById($id_mudhorobah){
    	$this->db->where('id',$id_mudhorobah);
    	$query = $this->db->get('pembiayaan_mudhorobah');
    	return $query->result();
  	}
}