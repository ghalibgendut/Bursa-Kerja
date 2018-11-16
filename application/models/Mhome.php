<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Mhome extends CI_Model
{
  //Multi level lgon start here
  public function cek_login($table,$where){
    return $this->db->get_where($table,$where);
  }
  public function ambil($table,$where2){
    return $this->db->get_where($table,$where2);
  }
  // Multi Level Login ends here
  public function lihat_lowongan(){
    //return $this->db->get($table);
    $query=$this->db->get('lowongan');
    if($query->num_rows()>0){
      return $query->result();
    }else {
      return array();
    }
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
  //Profil Pencari Kerja End
}





 ?>
