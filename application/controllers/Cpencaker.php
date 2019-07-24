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
    $this->load->library('pdf');
    $this->load->library('ciqrcode');
    $this->load->library('pagination');
  }
  public function index()
  {
    $nama_lowongan=$this->input->get('query');
    $data['lowongan']=$this->Mhome->search($nama_lowongan);
    $table['lowongan']=$this->Mhome->lihat_lowongan('lowongan')->result();
    //paginasi
    $config['base_url'] = site_url('Chome/index'); //site url
    $config['total_rows'] = $this->db->count_all('lowongan'); //total row
    $config['per_page'] = 5;  //show record per halaman
    $config["uri_segment"] = 3;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['data'] = $this->Mhome->pagination_lowongan($config["per_page"], $data['page']);
    $data['pagination'] = $this->pagination->create_links();
    //paginasi
    $this->load->view('Pencaker/VhomePencaker',$data,$table);
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
      $jurusan = $this->input->post('jurusan');

      $config['cacheable']    = true; //boolean, the default is true
      $config['cachedir']     = './assets/'; //string, the default is application/cache/
      $config['errorlog']     = './assets/'; //string, the default is application/logs/
      $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
      $config['quality']      = true; //boolean, the default is true
      $config['size']         = '1024'; //interger, the default is 1024
      $config['black']        = array(224,255,255); // array, default is array(255,255,255)
      $config['white']        = array(70,130,180); // array, default is array(0,0,0)
      $this->ciqrcode->initialize($config);

      $image_name=$nik.'.png'; //buat name dari qr code sesuai dengan nik

      $params['data'] = $nik; //data yang akan di jadikan QR CODE
      $params['level'] = 'H'; //H=High
      $params['size'] = 10;
      $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
      $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

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
                      'jurusan'=>$jurusan,
                      'foto'=>$file,
                      'qr_code'=>$image_name
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
    $data['pendidikan'] = $this->Mhome->get_pendidikan($where)->result();
    $data['portofolio'] = $this->Mhome->get_portofolio($where)->result();
    $data['kemampuan'] = $this->Mhome->get_kemampuan($where)->result();
    $this->load->view('Pencaker/VprofilPencaker',$data);
  }

  //Edit Profil Pencaker start
  public function editProfil()
  {
    $this->form_validation->set_rules('nama','Nama Lengkap','required');
    $this->form_validation->set_rules('statusP','Status Pernikahan','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('email','Email','required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('Pencaker/VeditProfilPencaker');
    }
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();

    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $noTel = $this->input->post('noTel');
    $statusPernikahan = $this->input->post('statusP');
    $alamat = $this->input->post('alamat');
    $pendidikan = $this->input->post('pendidikan_terakhir');
    $jurusan = $this->input->post('jurusan');
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 3000;
    $this->load->library('upload', $config);
    if (! $this->upload->do_upload('foto')) {
      $this->session->set_flashdata('msg',
                '<div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>Maaf!</strong> Anda harus mengupload foto baru.
                </div>');
      $this->load->view('Pencaker/VeditProfilPencaker',$data);
    }
    else {
      $file = $_FILES['foto']['name'];
      $upload_data = $this->upload->data();
      $data = array('namaLengkap'=>$nama,
                    'alamat'=>$alamat,
                    'noTel'=>$noTel,
                    'email'=>$email,
                    'statusPernikahan'=>$statusPernikahan,
                    'pendidikan'=>$pendidikan,
                    'jurusan'=>$jurusan,
                    'foto'=>$file);
      $where = array('nik' => $nik);
      $this->Mhome->edit_pencaker($where,$data,'pencaker');
      redirect('Cpencaker/profilPencaker');
    }
  }
  //Edit Profil Pencaker end
  //Cetak AK-1 start
  public function cetak()
  {
    redirect('Cetak/pdf');
  }
  //Cetak AK-1 end
  //Profil pencaker ends

  //Riwayat Pendidikan Start
  public function riwayatPendidikan()
  {
      $whereU = array('username' => $this->session->userdata('username'));
      $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
      $nik=$cekU['nik'];
      $where = array ('nik'=>$nik);
      $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();

      $nik = $this->input->post('nik');
      $tingkat = $this->input->post('tingkat');
      $namaSekolah = $this->input->post('namaSekolah');
      $jurusan = $this->input->post('jurusan');
      $alamatSekolah = $this->input->post('alamatSekolah');
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'jpeg|jpg|png';
      $config['max_size']             = 3000;
      $this->load->library('upload', $config);

      if (! $this->upload->do_upload('fotoIjazah')) {
        $this->session->set_flashdata('msg',
                  '<div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                    <strong>Maaf!</strong> Anda harus mengupload <strong>FOTO IJAZAH</strong>.
                  </div>');
        $this->load->view('Pencaker/VriwayatPendidikan', $data);
      }
      else {
        $file = $_FILES['fotoIjazah']['name'];
        $upload_data = $this->upload->data();
        $data = array('nik'=>$nik,
                      'tingkat'=>$tingkat,
                      'jurusan'=>$jurusan,
                      'nama_sekolah'=>$namaSekolah,
                      'alamat_sekolah'=>$alamatSekolah,
                      'fotoIjazah'=>$file);
        $this->Mhome->ins_pendidikan('riwayat_pendidikan',$data);
        redirect('Cpencaker/profilPencaker');
    }
  }
  //Riwayat Pendidikan End

  //Portofolio start
  public function portofolio()
  {
    $nik = $this->input->post('nik');
    $pekerjaan = $this->input->post('namaPekerjaan');
    $lamaKerja = $this->input->post('lamaKerja');
    $sertifikat = $this->input->post('sertifikat');
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 3000;
    $this->load->library('upload', $config);

    // if (! $this->upload->do_upload('fotoSertifikat')) {
    //   $error = array('error' => $this->upload->display_errors());
    //   $this->load->view('Pencaker/VportofolioPencaker', $error);
    // }
    //else {
      $whereU = array('username' => $this->session->userdata('username'));
      $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
      $nik=$cekU['nik'];

      $file = $_FILES['fotoSertifikat']['name'];
      $upload_data = $this->upload->data();
      $data = array('nik'=>$nik,
                    'nama_pekerjaan'=>$pekerjaan,
                    'lama_bekerja'=>$lamaKerja,
                    'nama_sertifikat'=>$sertifikat,
                    'foto_sertifikat'=>$file);
      $this->Mhome->ins_portofolio('portofolio',$data);
      redirect('Cpencaker/profilPencaker');
    //}
  }
  //Portofolio end

  //kemampuan Start
  public function kemampuan()
  {
    $nik = $this->input->post('nik');
    $namaKemampuan = $this->input->post('namaKemampuan');
    $level = $this->input->post('level');
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $data = array('nik'=>$nik,
                  'nama_kemampuan'=>$namaKemampuan,
                  'level'=>$level);
    $this->Mhome->ins_kemampuan('kemampuan',$data);
    redirect('Cpencaker/profilPencaker');
  }
  //kemampuan ends

  //Melamar Lowongan Start
  public function melamarLowongan($id)
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['pendidikan'] = $this->Mhome->dataPelamar($where)->row();
    $whereA['id_lowongan']=$id;
    $table['lowongan']=$this->Mhome->dataLowongan($whereA)->row();
    if ($data['pendidikan'] == $table['lowongan']) {
      $this->session->set_flashdata('msg',
                '<div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>Selamat!</strong> Lamaran telah masuk mohon tunggu pemberitahuan selanjutnya.
                </div>');
      $where['id_lowongan']=$id;
      $table['lowongan']=$this->Mhome->get_klw($where)->row();
      $whereU = array ('username' => $this->session->userdata('username'));
      $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
      $nik=$cekU['nik'];
      $idLowongan=$id;
      $tgl = date('y-m-d');
      $data = array('nik'=>$nik,
                    'tgl_melamar'=>$tgl,
                    'status_lamaran'=>'Belum Diterima',
                    'id_lowongan' => $idLowongan);
      $this->Mhome->ins_lamaran('melamar',$data);
      $where['id_lowongan']=$id;
      $table['lowongan']=$this->Mhome->get_klw($where)->row();
      $this->session->set_userdata($table);
      $this->load->view('Pencaker/VdetailLowongan',$table);
    }
    else {
      $this->session->set_flashdata('msg',
                '<div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>Maaf!</strong> Data diri anda tidak cocok dengan lowongan ini.
                </div>');
      $where['id_lowongan']=$id;
      $table['lowongan']=$this->Mhome->get_klw($where)->row();
      $this->session->set_userdata($table);
      $this->load->view('Pencaker/VdetailLowongan',$table);
    }
  }
  //melamar lowongan ends

  //Pencarian lowongan Start
 //  public function cariLowongan()
 //  {
 //    $nama_lowongan=$this->input->get('query');
 //    $data=$this->Mhome->search($nama_lowongan);
 //    //$table['lowongan']=$this->Mhome->lihat_lowongan('lowongan')->result();
 //    echo json_encode($data);
 //    $this->load->view('Pencaker/VhomePencaker',json_encode($data));
 // }
  //Pencarian Lowongan End

}

 ?>
