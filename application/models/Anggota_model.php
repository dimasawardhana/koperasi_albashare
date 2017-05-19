<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}

	public function getAnggota()
	{	$this->db->order_by('id');
		$query = $this->db->get('anggota');
		return $query->result();
	}
  public function getAnggotaById($id){
    $this->db->where('id',$id);
    $this->db->from('anggota');
    $query = $this->db->get();
    return $query->result();
  }
    public function getAnggota_no_rekening(){
        $this->db->select('*, no_rekening.id AS id_rekening');
        $this->db->from('anggota');
        $this->db->join('no_rekening','anggota.id = no_rekening.id_anggota');
	$this->db->order_by('anggota.cabang,no_rekening.no_rekening');
        $query = $this->db->get();
        return $query->result();
    }
	public function getNoRekening($id_anggota)
	{
		$this->db->where('id_anggota', $id_anggota);// ke database ke indeks $id anggota di column id anggota
		$query = $this->db->get('no_rekening');	// ambil seluruh isinya di table no rkening
		return $query->result();
	}
public function getrekeninganggota($id){
$this->db->select('*, no_rekening.id AS id_rekening, no_rekening.cabang as dicabang');
        $this->db->from('anggota');
        $this->db->join('no_rekening','anggota.id = no_rekening.id_anggota');
        $this->db->where('no_rekening.id',$id);
        $query = $this->db->get();
        return $query->result();
}
	public function createdata($table,$data){

		$this->db->insert($table,$data);
	}
  public function updatedata($table,$id,$data){
    $this->db->where('id',$id);
    $this->db->update($table,$data);
  }
	public function getRekening($id_rekening){
		//$this->db->select('saldo_pokok_wajib, saldo_tabarok_a,SUM(IF(debit_kredit= 1,nominal,0))-SUM(IF(debit_kredit= 0,nominal,0)) as saldo_tarekah_a');// belum ditambah saldo tarekah a dan tarekah
		$isiquery = "select saldo_pokok_wajib, saldo_tabarok_a,SUM(IF(b.debit_kredit= 1,nominal,0))-SUM(IF(b.debit_kredit= 0,nominal,0)) as saldo_tarekah_a
				from no_rekening a left join tarekah_a b on a.id = b.id_rekening where a.id =".$id_rekening;
		//$this->db->from('no_rekening');
		//$this->db->join('tarekah_a' , 'no_rekening.id = tarekah_a.id_rekening');
		//$this->db->where('id_rekening',$id_rekening);
//		$query = $this->db->get();
		$query = $this->db->query($isiquery);
		return $query->result();
	}
  public function getRekeningId($id){
    $this->db->where('id',$id);
    $query = $this->db->get('no_rekening');
    return $query->result();
  }
  public function countRow($table,$field,$id){
    $this->db->select('count(*) as jumlah');
    $this->db->from($table);
    $this->db->where($field,$id);
    $query = $this->db->get();
    return $query->result();
  }
    public function getLastRek(){
        $this->db->select('*');
        $this->db->from('no_rekening');
        $this->db->order_by('id','DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result();
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
  public function alltrans(){
  $isiquery = " SELECT no_rekening.no_rekening,no_rekening.id,anggota.nama, no_rekening.cabang, tabarok_a.nominal, tabarok_a.debit_kredit, tabarok_a.date, kode, no_transaksi,petugas,keterangan,created_at
                FROM no_rekening RIGHT JOIN tabarok_a on no_rekening.id = tabarok_a.id_rekening left join anggota on no_rekening.id_anggota = anggota.id
                UNION
                SELECT no_rekening.no_rekening,no_rekening.id,anggota.nama, no_rekening.cabang, tarekah_a.nominal, tarekah_a.debit_kredit, tarekah_a.date, kode, no_transaksi,petugas,keterangan,created_at
                FROM no_rekening RIGHT JOIN tarekah_a ON no_rekening.id = tarekah_a.id_rekening left join anggota on no_rekening.id_anggota = anggota.id
                UNION
                SELECT no_rekening.no_rekening,no_rekening.id,anggota.nama, no_rekening.cabang , nominal_tarekah_b.nominal, nominal_tarekah_b.debit_kredit, tarekah_b.date,kode, no_transaksi,petugas,keterangan,created_at
                FROM no_rekening RIGHT JOIN tarekah_b ON no_rekening.id = tarekah_b.id_rekening RIGHT JOIN nominal_tarekah_b ON nominal_tarekah_b.id_tarekah_b= tarekah_b.id
                left join anggota on no_rekening.id_anggota = anggota.id
                ORDER BY created_at DESC";
  $query  = $this->db->query($isiquery);


  return $query->result();

  }
  public function laporanperbulan(){
    $isiquery = "SELECT a.nama,b.no_rekening,b.id,b.cabang, d.nominal_pokwa as nominal_pokwa,sum(e.bbh) as bbh,
              	sum(case when c.debit_kredit = 1 then nominal else 0 end)  as 'pemasukkan', 
                sum(case when c.debit_kredit = 0 then nominal else 0 end) as 'pengeluaran',
                mid(c.date,1,7) as 'perbulan',
                (select sum(case when debit_kredit = 1 then nominal else (-1*nominal) end) from tabarok_a where date<=c.date and id_rekening = b.id)as total
                FROM anggota a 
                right join no_rekening b on a.id = b.id_anggota
                right JOIN tabarok_a c on b.id = c.id_rekening
		            left JOIN (select sum(nominal) as nominal_pokwa, MID(date,1,7) as tanggal, id_rekening from pokok_wajib group by id_rekening, MID(date,1,7)) d on d.id_rekening = c.id_rekening AND d.tanggal = mid(c.date,1,7)
                left join (select bagi_hasil_tarekah_a.nominal_ke_anggota as bbh, MID(bagi_hasil_tarekah_a.date,1,7) as tanggal, id_rekening from tarekah_a left join bagi_hasil_tarekah_a on tarekah_a.id = bagi_hasil_tarekah_a.id_tarekah_a group by bagi_hasil_tarekah_a.id_tarekah_a )e on e.id_rekening = c.id_rekening AND e.tanggal = mid(c.date,1,7)
                GROUP BY b.id ,perbulan order by perbulan ASC";
    $query = $this->db->query($isiquery);
    return $query->result();
  }
  public function laporanperhari(){ 
    $isiquery = "SELECT a.nama,b.no_rekening,b.id,b.cabang,
              	sum(case when c.debit_kredit = 1 then nominal else 0 end)  as 'pemasukkan', 
                sum(case when c.debit_kredit = 0 then nominal else 0 end) as 'pengeluaran',
                c.date ,
                a.cabang
                FROM anggota a 
                right join no_rekening b on a.id = b.id_anggota
                RIGHT JOIN tabarok_a c on b.id = c.id_rekening
                GROUP BY b.id ,c.date order by c.date ASC";
    $query = $this->db->query($isiquery);
    return $query->result();
  }
  public function show_petty($cabang){
  $isiquery = "SELECT * FROM pettycash WHERE cabang =".$cabang ; 
  $query = $this->db->query($isiquery);
  return $query->result();
  
  }
  public function getId_cabang($id_rekening){
    $this->db->select('cabang');
    $this->db->from('no_rekening');
    $query = $this->db->get();
    return $query->result();
  }
  public function get_pembiayaan_murobahah($id_rekening){
    $this->db->where('id_rekening',$id_rekening);
    $query = $this->db->get('pembiayaan_murobahah');
    return $query->result();
  }
  public function get_pembiayaan_mudhorobah($id_rekening){
    $this->db->where('id_rekening',$id_rekening);
    $query = $this->db->get('pembiayaan_mudhorobah');
    return $query->result();
  }
  public function getRowValueById($id,$table){
    $this->db->where('id',$id);
    $query = $this->db->get($table);
    
      return $query->row();
    
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
  public function getBayar_mudhorobahById($id_mudhorobah){
    $this->db->where('id_mudhorobah',$id_mudhorobah);
    $query = $this->db->get('bayar_mudhorobah');
    return $query->result();
  }
  public function get_mudhorobahById($id_mudhorobah){
    $this->db->where('id',$id_mudhorobah);
    $query = $this->db->get('pembiayaan_mudhorobah');
    return $query->result();
  }
  public function getSum($table,$field_sum,$field,$id){
    $this->db->select('sum('.$field_sum.') as SUM' );
    $this->db->where($field,$id);
    $query = $this->db->get($table);
    return $query->result();
  }
}