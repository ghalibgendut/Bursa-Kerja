<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Mhome extends CI_Model
{
  //paginasi start
  function pagination_lowongan($limit, $start){
        $query = $this->db->get('lowongan', $limit, $start);
        return $query;
    }
  //paginasi end
  //Multi level login start here
  public function cek_login($table,$where){
    return $this->db->get_where($table,$where);
  }
  public function ambil($table,$where2){
    return $this->db->get_where($table,$where2);
  }
  // Multi Level Login ends here
  public function lihat_lowongan($table){
    // $hasil=$this->db->query("SELECT * FROM lowongan WHERE nama_lowongan LIKE '%$nama_lowongan%'");
    // return $hasil->result();
    return $this->db->get($table);
    // $query=$this->db->get('lowongan');
    // if($query->num_rows()>0){
    //   return $query->result();
    // }else {
    //   return array();
    // }
  }
  //pendaftaran akun pencari kerja mulai
  public function reg_pencaker($table,$data){
    return $this->db->insert($table,$data);
  }
  public function reg_akun($table,$akun){
    $this->db->insert($table,$akun);
    return  $this->db->insert_id();
  }
  public function changeActiveState($encrypted_id)
  {
    $data = array('active'=>1);
    $this->db->where('md5(id_akun)',$encrypted_id);
    return $this->db->update('akun',$data);
  }
  //pendaftaran akun pencari kerja selesai

  //Profil Pencari Kerja start
  public function get_pencaker($where){
    return $this->db->get_where('pencaker',$where);
  }
  public function cek_user($table,$where){
    return $this->db->get_where($table,$where);
  }
  public function edit_pencaker($where,$data,$table){
    $this->db->where($where);
    //$update_data['foto'] = $data['foto'];
    $query = $this->db->update($table,$data);
  }
    //Riwayat Pendidikan start
  public function ins_pendidikan($table,$data){
    $this->db->insert($table,$data);
    return  $this->db->select('*')->from('riwayat_pendidikan')->where('id_pendidikan',$this->db->insert_id())->get()->row();
  }
  public function get_pendidikan($where)
  {
    return $this->db->get_where('riwayat_pendidikan',$where);
  }
    //Riwayat Pendidikan ends
    //portofolio start
  public function ins_portofolio($table,$data){
    $this->db->insert($table,$data);
    return  $this->db->select('*')->from('portofolio')->where('id_portofolio',$this->db->insert_id())->get()->row();
  }
  public function get_portofolio($where){
    return $this->db->get_where('portofolio',$where);
  }
    //portofolio ends
    //kemampuan Start
  public function ins_kemampuan($table,$data){
    $this->db->insert($table,$data);
    return  $this->db->select('*')->from('kemampuan')->where('id_kemampuan',$this->db->insert_id())->get()->row();
  }
  public function get_kemampuan($where){
    return $this->db->get_where('kemampuan',$where);
  }
    //kemampuan ends
  //Profil Pencari Kerja End

  //melamar pekerjaan Start
  public function ins_lamaran($table,$data){
    return $this->db->insert($table,$data);
  }
    //pengecekan lamaran start
  public function dataPelamar($where)
  {
    $this->db->select('pendidikan','jenisKelamin');
    $this->db->from('pencaker');
    $this->db->where('nik',$where['nik']);
    $query = $this->db->get();
    return $query;
  }
  public function dataLowongan($whereA)
  {
    $this->db->select('pendidikan','jenis_kelamin');
    $this->db->from('lowongan');
    $this->db->where('id_lowongan',$whereA['id_lowongan']);
    $query = $this->db->get();
    return $query;
  }
    //pengecekan lamaran end
  //melamar pekerjaan ends

  //Registrasi Perusahaan Start
  function reg_perushaan($table,$data){
    return $this->db->insert($table,$data);
  }
  //Registrasi perusahaan ends

  //Input Lowongan Start
  function input_lowongan($table,$data){
    return $this->db->insert($table,$data);
  }
  public function ins_kualifikasi($table,$dataA)
  {
    $this->db->insert($table,$dataA);
    return $this->db->insert_id();
  }
  //Input lowongan ends
  //Menampilkan lowongan Start
  public function get_klw($where){
    $this->db->select('*','deskripsi');
    $this->db->from('lowongan');
    $this->db->join('kualifikasi','lowongan.id_lowongan = kualifikasi.id_lowongan','left');
    $this->db->where('lowongan.id_lowongan',$where['id_lowongan']);
    $query = $this->db->get();
    return $query;
  }
  function get_profile($where){
    return $this->db->get('perusahaan',$where);
  }
  function cek_perusahaan($table,$where){
    return $this->db->get_where($table,$where);
  }
  function editPerusahaan($table,$where){
  return $this->db->get_where($table,$where);
  }
  function update_perusahaan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
  }
  //menampilkan lowongan ends

  //pencarian lowongan Start
  public function search($nama_lowongan)
  {
    $hasil=$this->db->query("SELECT * FROM lowongan WHERE nama_lowongan LIKE '%$nama_lowongan%'");
    return $hasil->result();
    // $hsl=$this->db->query("SELECT * FROM lowongan WHERE nama_lowongan LIKE'%$nama_lowongan%'");
    //     if($hsl->num_rows()>0){
    //       foreach ($hsl->result() as $data) {
    //           $hasil=array(
    //               'no_siup' => $data->no_siup,
    //               'nama_lowongan' => $data->nama_lowongan,
    //               'nama_perusahaan' => $data->nama_perusahaan,
    //               'jabatan' => $data->jabatan,
    //               'gaji' => $data->gaji
    //               );
    //       }
    //     }
    //     return $hasil;
  }
  //pencarian lowongan End
}





 ?>
