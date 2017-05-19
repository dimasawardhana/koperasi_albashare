<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Function_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}
	public function createdata($table,$data){

		$this->db->insert($table,$data);
	}
  public function updatedata($table,$id,$data){
    $this->db->where('id',$id);
    $this->db->update($table,$data);
  }
  public function isExistInDB($table,$data,$field){// validation
		$this->db->where($field,$data);
		$query = $this->db->get($table);

		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function getId_cabang($id_rekening){
    $this->db->select('cabang');
    $this->db->from('no_rekening');
    $query = $this->db->get();
    return $query->result();
  }
  public function getSum($table,$field_sum,$field,$id){
    $this->db->select('sum('.$field_sum.') as SUM' );
    $this->db->where($field,$id);
    $query = $this->db->get($table);
    return $query->result();
  }
}