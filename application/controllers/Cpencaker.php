<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Cpencaker extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library("session");
    $this->load->model("Mhome");
    $this->load->helper(array("form","url"));
    $this->load->helper('email');
    $this->load->library('email');
    $this->load->library('form_validation');
  }
  public function index()
  {
    $data['data']=$this->Mhome->lihat_lowongan();
    //$table['lowongan']=$this->Mhome->lihat_lowongan('lowongan')->result();
    $this->load->view('Pencaker/VhomePencaker',$data);
  }
  public function daftar()
  {
    $this->load->view('Pencaker/VregistrasiPencaker');
  }
  //Registrasi start
  public function registrasi()
  {
    if ($this->input->post('daftar')) {
      $this->form_validation->set_rules(
  			'uname','Username',
  			'required|min_length[5]|max_length[12]',
  			array(
  					'required' => 'you have not provided %s.',
  					'is_unique' => 'This is already exists.')
  		);
      $this->form_validation->set_rules('pass','Password','trim|required|min_length[8]');
      $this->form_validation->set_rules('email','E-mail','required');
      $this->form_validation->set_rules('noTel', 'No Telepon', 'trim|required');
      $this->form_validation->set_rules(
  			'nik','NIK',
  			'required|min_length[5]|max_length[16]',
  			array(
  					'required' => 'you have not provided %s.',
  					'is_unique' => 'This is already exists.')
  		);
      $this->form_validation->set_rules('nama','Nama Lengkap','required');
      $this->form_validation->set_rules('lahir','Tempat Lahir','required');
      $this->form_validation->set_rules('tglLahir','Tanggal Lahir','required');
      $this->form_validation->set_rules('jenisK','Jenis Kelamin','required');
      $this->form_validation->set_rules('statusP','Status Pernikahan','required');
      $this->form_validation->set_rules('agama','Agama','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      $this->form_validation->set_rules('pendidikan_terakhir','Pendidikan Terakhir','required');
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('Pencaker/VregistrasiPencaker');
      }
      $username = $this->input->post('uname');
      $password = $this->input->post('pass');
      $email = $this->input->post('email');
      $noTel = $this->input->post('noTel');
      $nik = $this->input->post('nik');
      $nama = $this->input->post('nama');
      $tmptLahir = $this->input->post('lahir');
      $tglLahir = $this->input->post('tglLahir');
      $jk = $this->input->post('jenisK');
      $statusPernikahan = $this->input->post('statusP');
      $agama = $this->input->post('agama');
      $alamat = $this->input->post('alamat');
      $pendidikan = $this->input->post('pendidikan_terakhir');

      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'jpeg|jpg|png';
      $config['max_size']             = 3000;
      $this->load->library('upload', $config);

      if (! $this->upload->do_upload('foto')) {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('Pencaker/VregistrasiPencaker', $error);
      }
      else {
        $file = $_FILES['foto']['name'];
        $upload_data = $this->upload->data();
        $data = array('nik'=>$nik,
                      'namaLengkap'=>$nama,
                      'tempatLahir'=>$tmptLahir,
                      'tglLahir'=>$tglLahir,
                      'jenisKelamin'=>$jk,
                      'statusPernikahan'=>$statusPernikahan,
                      'agama'=>$agama,
                      'alamat'=>$alamat,
                      'username'=>$username,
                      'email'=>$email,
                      'noTel'=>$noTel,
                      'pendidikan'=>$pendidikan,
                      'foto'=>$file
        );
        $tgl = date('y-m-d');
        $akun = array('username'=> $username,
                      'password'=>$password,
                      'tgl_regis'=>$tgl,
                      'status'=>'pencaker',
                      'active'=> 0);
        $this->Mhome->reg_pencaker('pencaker',$data);
        $id = $this->Mhome->reg_akun('akun',$akun);
        $encrypted_id = md5($id);

        //email notification Here
        $config['protocol']='smtp';
        $config['smtp_host']='ssl://smtp.googlemail.com';
        $config['smtp_port']='465';
        $config['smtp_timeout']='30';
        $config['smtp_user']='minformatikaclass01@gmail.com';
        $config['smtp_pass']='satuuntuksemua';
        $config['charset']='utf-8';
        $config['newline']="\r\n";
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $email = $this->input->post('email',true);
        if (valid_email($email)) {
          $this->email->from('minformatikaclass01@gmail.com','Disnaker Kab.Bandung');
          $this->email->to($email);
          $this->email->subject('Registrasi Akun');
          $this->email->message('Selamat akun anda terdaftar, untuk memverifikasi akun silakan klik link dibawah<br><br>'.
          site_url("Cpencaker/verification/$encrypted_id"));
          echo "Email terkirim";
        }
        if (!$this->email->send()) {
          $this->email->print_debugger();
        }
        //until here
        redirect('Chome/index');
      }
    }
  }
  //verification Start
  public function verification($encrypted_id)
  {
    $this->Mhome->changeActiveState($encrypted_id);
    redirect('Chome/masuk');
  }
  //verification end
  //registrasi end

  //Profil Pencaker start
  public function profilPencaker()
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();
    $this->load->view('Pencaker/VprofilPencaker',$data);
  }

  //Edit Profil Pencaker start
  public function editProfil()
  {
    $this->load->view('Pencaker/VeditProfilPencaker');
    $this->form_validation->set_rules('nama','Nama Lengkap','required');
    $this->form_validation->set_rules('statusP','Status Pernikahan','required');
    $this->form_validation->set_rules('agama','Agama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('email','Email','required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('Pencaker/VeditProfilPencaker');
    }
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $noTel = $this->input->post('noTel');
    $statusPernikahan = $this->input->post('statusP');
    $alamat = $this->input->post('alamat');
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 3000;
    $this->load->library('upload', $config);

    if (! $this->upload->do_upload('foto')) {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('Pencaker/VregistrasiPencaker', $error);
    }
    else {
      $whereU = array('username' => $this->session->userdata('username'));
      $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
      $nik=$cekU['nik'];

      $file = $_FILES['foto']['name'];
      $upload_data = $this->upload->data();
      $data = array('namaLengkap'=>$nama,
                    'alamat'=>$alamat,
                    'noTel'=>$noTel,
                    'email'=>$email,
                    'statusPernikahan'=>$statusPernikahan,
                    'foto'=>$file);
      $where = array('nik' => $nik);
      $this->Mhome->edit_pencaker($where,$data,'pencaker');
      redirect('Cpencaker/profilPencaker');
    }
  }
  //Edit Profil Pencaker end
  //Profil pencaker ends

}



 ?>
