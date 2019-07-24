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
    $this->load->library("pagination");
    $this->load->model("Mhome");
    $this->load->helper(array("form","url"));
  }

  public function index()
  {
    // if (isset($_GET['query'])) {
      // $data['lowongan']=$this->input->get('query');
    //   $this->session->set_userdata('sess_lowongan', $data['lowongan']);
    // }
    // else {
    //    $data['lowongan'] = $this->session->userdata('sess_lowongan');
    // }
    // $this->db->like('nama_lowongan', $data['lowongan']);
    // $nama_lowongan=$this->input->get('query');
    // $data['lowongan']=$this->Mhome->search($nama_lowongan);
    //$data['lowongan']=$this->input->get('query');
    // $table['lowongan']=$this->Mhome->lihat_lowongan('lowongan')->result();
    // $this->session->sess_destroy();
    //paginasi
    // $config['base_url'] = site_url('Chome/index'); //site url
    // $config['total_rows'] = $this->db->count_all('lowongan'); //total row
    // $config['per_page'] = 7;  //show record per halaman
    // $config["uri_segment"] = 3;  // uri parameter
    // $choice = $config["total_rows"] / $config["per_page"];
    // $config["num_links"] = floor($choice);
    // $config['first_link']       = 'First';
    // $config['last_link']        = 'Last';
    // $config['next_link']        = 'Next';
    // $config['prev_link']        = 'Prev';
    // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    // $config['full_tag_close']   = '</ul></nav></div>';
    // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    // $config['num_tag_close']    = '</span></li>';
    // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['prev_tagl_close']  = '</span>Next</li>';
    // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    // $config['first_tagl_close'] = '</span></li>';
    // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['last_tagl_close']  = '</span></li>';
    // $this->pagination->initialize($config);
    // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    // $data['data'] = $this->Mhome->pagination_lowongan($config["per_page"],$data['page'],$data['lowongan']);
    $data['lowong']=$this->Mhome->lowong()->result();
    // $data['pagination'] = $this->pagination->create_links();
    //paginasi
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

        $data_session = array('username' => $username,
                              'no_siup' => $siup,
                              'user_session' => true);
        $this->session->set_userdata($data_session);
      }
    }
    if ($status2 == 'pencaker') {
      redirect('Cpencaker/index');
      $this->session->userdata('username');
    }
    elseif ($status2 == 'Perusahaan') {
      redirect('Cperusahaan/lihat_lowongan');
      $this->session->userdata('username');
    }
    elseif ($status2 == 'admin') {
      redirect('Cadmin/rekaplowongan');
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

  //link pindah halaman untuk pencaker start
  public function editProfilPencaker()
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();
    $data['listKecamatan'] = $this->Mhome->list_kecamatan()->result();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $this->load->view('Pencaker/VeditProfilPencaker',$data);
  }
  public function get_kelurahan()
  {
    $id = $this->input->post('id');
    $data = $this->Mhome->list_kelurahan($id)->result();
    echo json_encode($data);
  }
  public function riwayatPendidikanPencaker()
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['listPendidikan'] = $this->Mhome->list_pendidikan()->result();
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $this->load->view('Pencaker/VriwayatPendidikan',$data);
  }
  public function portofolioPencaker()
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $this->load->view('Pencaker/VportofolioPencaker',$data);
  }
  public function kemampuanPencaker()
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $this->load->view('Pencaker/VkemampuanPencaker',$data);
  }
  //link pindah halaman untuk pecaker ends

  //melamar start
  public function melamar($id)
  {
    $where['id_lowongan']=$id;
    $data['lowongan']=$this->Mhome->get_klw($where)->row();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $this->session->set_userdata($data);
    $this->load->view('Pencaker/VdetailLowongan',$data);
  }
  public function melamarHome($id)
  {
    $where['id_lowongan']=$id;
    $table['lowongan']=$this->Mhome->get_klw($where)->row();
    $this->session->set_userdata($table);
    $this->load->view('VdetailLowonganHome',$table);
  }
  //melamar end
  //detail pelamar Start
  public function detailProfilPelamar($id,$idLowongan)
  {
    $cek = $this->Mhome->get_kecamatanSemua()->row_array();
    $cekB = $this->Mhome->get_kelurahanSemua()->row_array();
    $idKecamatan=$cek['id_kecamatan'];
    $idKelurahan = $cekB['id_kelurahan'];
    $where['nik']=$id;
    $whereA['id_lowongan']=$idLowongan;
    $whereB['id_kecamatan']=$idKecamatan;
    $whereC['id_kelurahan']=$idKelurahan;
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();
    $data['pendidikan'] = $this->Mhome->get_pendidikanSemua($where)->result();
    $data['portofolio'] = $this->Mhome->get_portofolio($where)->result();
    $data['kemampuan'] = $this->Mhome->get_kemampuan($where)->result();
    $data['melamar'] = $this->Mhome->get_statusLamaran($whereA)->row_array();
    $data['kecamatan'] = $this->Mhome->get_kecamatanP($where,$whereB)->row_array();
    $data['kelurahan'] = $this->Mhome->get_kelurahanP($where,$whereC)->row_array();
    $data['id']=$where['nik'];
    $data['jumlah']=$this->notif_perusahaan()->num_rows();
    $data['notif'] = $this->notif_perusahaan()->result();
    $this->load->view('Perusahaan/VdetailProfilLamaran',$data);
  }
  //detail pelamar ends
  //melamar ends

  //link pindah halaman untuk perusahaan strat
  function editPerusahaan(){
		$whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('perusahaan',$whereU)->row_array();
    $no=$cekU['no_siup'];
		$where = array('no_siup' => $no);
		$data['perusahaan'] = $this->Mhome->get_profile($where)->result();
    $data['jumlah']=$this->notif_perusahaan()->num_rows();
    $data['notif'] = $this->notif_perusahaan()->result();
		$this->load->view('Perusahaan/VeditProfilePerusahaan',$data);
	}
  //link pindah halaman untuk perusahaan ends
  //notifikasi Start
  public function notif()
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik, 'status_notifikasi' => 0, 'status_lamaran !='=>'Belum Diterima');
    $data = $this->Mhome->notifikasi($where);
    return $data;
  }
  public function get_nik($id)
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik, 'id_lowongan'=>$id);
    $data = $this->Mhome->update_notifikasi('melamar',$where);
    redirect('Cpencaker/index');
  }

  public function notif_perusahaan()
  {
		$whereU = array('username' => $this->session->userdata('username'));
		$cekU = $this->Mhome->cek_perusahaan('perusahaan',$whereU)->row_array();
		$no=$cekU['no_siup'];
		$whereA = array ('no_siup'=>$no);
		$cek = $this->Mhome->get_cekLowongan($whereA)->row_array();
		$id = $cek['id_lowongan'];
    // $whereB['melamar.id_lowongan']=$id;
		$whereB['lowongan.no_siup']=$cekU['no_siup'];
    $whereB['status_notifikasi'] = 0;
		$whereB['status_lamaran'] = 'Belum Diterima';
    $data = $this->Mhome->notifikasi_perusahaan($whereB);
    return $data;
  }
  //notifikasi ends
}


 ?>
