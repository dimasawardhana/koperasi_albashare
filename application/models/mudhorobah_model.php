<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class murobahah_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}
	public function get_pembiayaan_mudhorobah($id_rekening){
    $this->db->where('id_rekening',$id_rekening);
    $query = $this->db->get('pembiayaan_mudhorobah');
    return $query->result();
  }
  public function getBayar_mudhorobahById($id_mudhorobah){
    $this->db->where('id_mudhorobah',$id_murobahah);
    $query = $this->db->get('bayar_mudhorobah');
    return $query->result();
  }
  public function get_mudhorobahById($id_mudhorobah){
    $this->db->where('id',$id_mudhorobah);
    $query = $this->db->get('pembiayaan_mudhorobah');
    return $query->result();
  }
}