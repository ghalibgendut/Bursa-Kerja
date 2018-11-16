<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
 // Percobaan
class Chome extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library("session");
    $this->load->model("Mhome");
    $this->load->helper(array("form","url"));
  }

  public function index()
  {
    $data['data']=$this->Mhome->lihat_lowongan();
    $this->load->view('Vhome',$data);
  }
  public function login()
  {
    if ($this->input->post('masuk')) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $where = array ('username'=>$username, 'password'=>$password);
      $cek = $this->Mhome->cek_login('akun',$where)->num_rows();
      $ambil = $this->Mhome->cek_login('akun',$where)->row_array();
      $status2 = $ambil['status'];
      $active = $ambil['active'];
      if ($cek > 0 ) {
        if ($active == 0) {
          //die('Harap Aktivasi akun');
          //$message = $this->session->set_flashdata('Aktivasi','Harap cek email anda untuk aktifasi akun');
          redirect('Chome/masuk');
        }
        $where2 = array('username' => $username);
        $ambil = $this->Mhome->ambil('perusahaan',$where2)->row_array();
        $siup = $ambil['no_siup'];

        //echo $status2;
        $data_session = array('username' => $username,
                              'no_siup' => $siup,
                              'user_session' => true);
        $this->session->set_userdata($data_session);
      }
    }
    if ($status2 == 'pencaker') {
      $data['data']=$this->Mhome->lihat_lowongan();
      //$table['lowongan']=$this->Mhome->lihat_lowongan('lowongan')->result();
      $this->load->view('Pencaker/VhomePencaker',$data);
    }
    elseif ($status2 == 'perusahaan') {
      echo "Sukses";
    }
    else {
      $this->session->set_flashdata('Gagal','username dan password salah!');
      redirect('Chome/masuk');
    }
  }
  public function masuk()
  {
    $this->load->view('Vlogin');
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('Chome/index');
  }

}


 ?>
