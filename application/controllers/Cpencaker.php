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
    $data['lowong']=$this->Mhome->lowong()->result();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $this->load->view('Pencaker/VhomePencaker',$data);
  }
  //Registrasi start
  public function daftar()
  {
    $data['listPendidikan'] = $this->Mhome->list_pendidikan()->result();
    $data['listKecamatan'] = $this->Mhome->list_kecamatan()->result();
    $this->load->view('Pencaker/VregistrasiPencaker',$data);
  }
  public function get_kelurahan()
  {
    $id = $this->input->post('id');
    $data = $this->Mhome->list_kelurahan($id)->result();
    echo json_encode($data);
  }

  public function registrasi()
  {
    $data['listPendidikan'] = $this->Mhome->list_pendidikan()->result();
    $data['listKecamatan'] = $this->Mhome->list_kecamatan()->result();
    if ($this->input->post('daftar')) {
      $this->form_validation->set_rules(
  			'uname','Username',
  			'required|min_length[5]|max_length[12]|alpha_dash',
  			array(
  					'required' => 'you have not provided %s.',
  					'is_unique' => 'This is already exists.')
  		);
      $this->form_validation->set_rules('pass','Password','trim|required|min_length[8]');
      $this->form_validation->set_rules('email','E-mail','required');
      $this->form_validation->set_rules('noTel', 'No Telepon', 'trim|required|numeric');
      $this->form_validation->set_rules(
  			'nik','NIK',
  			'required|min_length[16]|max_length[16]|numeric',
  			array(
  					'required' => 'you have not provided %s.',
            'numeric' => '%s must number only.',
  					'is_unique' => 'This is already exists.')
  		);
      $this->form_validation->set_rules('nama','Nama Lengkap','required');
      $this->form_validation->set_rules('lahir','Tempat Lahir','required|alpha');
      $this->form_validation->set_rules('tglLahir','Tanggal Lahir','required');
      $this->form_validation->set_rules('jenisK','Jenis Kelamin','required');
      $this->form_validation->set_rules('statusP','Status Pernikahan','required');
      $this->form_validation->set_rules('agama','Agama','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      $this->form_validation->set_rules('kelurahan','Kelurahan','required');
      $this->form_validation->set_rules('pendidikan_terakhir','Pendidikan Terakhir','required');
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('Pencaker/VregistrasiPencaker',$data);
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
      $kecamatan = $this->input->post('kecamatan');
      $kelurahan = $this->input->post('kelurahan');
      $pendidikan = $this->input->post('pendidikan_terakhir');
      $jurusan = $this->input->post('jurusan');
      $tglLulus = $this->input->post('tglLulus');

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
        $this->session->set_flashdata('msg',
                  '<div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                    <strong>Maaf!</strong> Anda harus mengupload foto atau ukuran foto anda terlalu besar,
                    ukuran foto harus dibawah <strong>3000kb</strong>.
                  </div>');
        $this->load->view('Pencaker/VregistrasiPencaker',$data);
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
                      'id_kecamatan'=>$kecamatan,
                      'id_kelurahan'=>$kelurahan,
                      'username'=>$username,
                      'email'=>$email,
                      'noTel'=>$noTel,
                      'pendidikan'=>$pendidikan,
                      'jurusan'=>$jurusan,
                      'tglIjazah'=>$tglLulus,
                      'status_WN'=>'WNI',
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
          $this->email->message('Selamat akun anda terdaftar dengan <br><br>
          Username :
          '.$username.'<br>
          Password :'.$password.'<br>
          Untuk memverifikasi akun silakan klik link dibawah<br><br>'.
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
    $id=$cekU['id_kecamatan'];
    $idK=$cekU['id_kelurahan'];
    $where = array ('nik'=>$nik);
    $whereA['id_kecamatan'] = $id;
    $whereB['id_kelurahan'] = $idK;
    $data['pencaker'] = $this->Mhome->get_pencaker($where)->result();
    $data['pendidikanAkhir'] = $this->Mhome->get_pendidikan($nik)->row_array();
    $data['pendidikan'] = $this->Mhome->get_pendidikanSemua($where)->result();
    $data['portofolio'] = $this->Mhome->get_portofolio($where)->result();
    $data['kemampuan'] = $this->Mhome->get_kemampuan($where)->result();
    $data['kecamatan'] = $this->Mhome->get_kecamatan($where,$whereA)->row_array();
    $data['kelurahan'] = $this->Mhome->get_kel($where,$whereB)->row_array();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
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
    $data['listKecamatan'] = $this->Mhome->list_kecamatan()->result();
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $noTel = $this->input->post('noTel');
    $statusPernikahan = $this->input->post('statusP');
    $alamat = $this->input->post('alamat');
    $kecamatan = $this->input->post('kecamatan');
    $kelurahan = $this->input->post('kelurahan');
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
      $data['jumlah']= $this->notif()->num_rows();
      $data['notif'] = $this->notif()->result();
      $this->load->view('Pencaker/VeditProfilPencaker',$data);
    }
    else {
      $file = $_FILES['foto']['name'];
      $upload_data = $this->upload->data();
      $data = array('namaLengkap'=>$nama,
                    'alamat'=>$alamat,
                    'id_kecamatan'=>$kecamatan,
                    'id_kelurahan'=>$kelurahan,
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
      $tingkat = explode("-",$this->input->post('tingkat'));
      $nama_pendidikan = $tingkat[1];
      $level = $tingkat[0];
      $namaSekolah = $this->input->post('namaSekolah');
      $jurusan = $this->input->post('jurusan');
      $alamatSekolah = $this->input->post('alamatSekolah');
      $tglLulus = $this->input->post('tglLulus');
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
                    <strong>Maaf!</strong> Anda harus mengupload <strong>FOTO IJAZAH</strong> atau Foto ijazah anda terlalu besar maksimum kapasistas <strong>3000kb</strong>.
                  </div>');
        $data['listPendidikan'] = $this->Mhome->list_pendidikan()->result();
        $data['jumlah']= $this->notif()->num_rows();
        $data['notif'] = $this->notif()->result();
        $this->load->view('Pencaker/VriwayatPendidikan', $data);
      }
      else {
        $file = $_FILES['fotoIjazah']['name'];
        $upload_data = $this->upload->data();
        $data = array('nik'=>$nik,
                      'tingkat'=>$nama_pendidikan,
                      'jurusan'=>$jurusan,
                      'nama_sekolah'=>$namaSekolah,
                      'alamat_sekolah'=>$alamatSekolah,
                      'tgl_lulus' =>$tglLulus,
                      'fotoIjazah'=>$file,
                      'id_list_pendidikan'=>$level);
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
    // else {
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
    // }
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
    // $where = array ('nik'=>$nik);
    $data['pendidikan'] = $this->Mhome->dataPendidikanPelamar($nik)->row_array();
    $where['id_lowongan']=$id;
    $data['lowongan']=$this->Mhome->dataPendidikanLowongan($where)->row_array();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $cari = array('nik'=>$nik,'id_lowongan'=>$id);
    $cek = $this->Mhome->cekLamaran($cari)->num_rows();
    // print_r($data['pendidikan']['id_list_pendidikan']);
    // print_r($data['lowongan']['level']);
    // echo $data['pendidikan']['level'];
    // echo $data['lowongan'];
    // print_r($data['jumlah']);
    // echo "<br>";
    // echo $cek;echo "<br>";
    // echo $where['id_lowongan'];echo "<br>";
    // echo $nik;
    if ($cek > 0) {
      $this->session->set_flashdata('msg',
                '<div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>MAAF!</strong> Data lamaran anda sudah ada dilowongan ini.
                </div>');
      $where['id_lowongan']=$id;
      $data['lowongan']=$this->Mhome->get_klw($where)->row();
      $this->session->set_userdata($data);
      $this->load->view('Pencaker/VdetailLowongan',$data);
    }
    elseif ($data['pendidikan']['id_list_pendidikan'] >= $data['lowongan']['level']) {
      $this->session->set_flashdata('msg',
                '<div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>SELAMAT!</strong> Lamaran telah masuk mohon tunggu pemberitahuan selanjutnya.
                </div>');
      $where['id_lowongan']=$id;
      $data['lowongan']=$this->Mhome->get_klw($where)->row();
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
      $data['lowongan']=$this->Mhome->get_klw($where)->row();
      $data['jumlah']= $this->notif()->num_rows();
      $data['notif'] = $this->notif()->result();
      $this->session->set_userdata($data);
      $this->load->view('Pencaker/VdetailLowongan',$data);
    }
    else {
      $this->session->set_flashdata('msg',
                '<div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>MAAF!</strong> Data diri anda tidak cocok dengan lowongan ini
                  atau silakan lengkapi <strong>PROFIL</strong> anda!.
                </div>');
      $where['id_lowongan']=$id;
      $data['lowongan']=$this->Mhome->get_klw($where)->row();
      $this->session->set_userdata($data);
      $this->load->view('Pencaker/VdetailLowongan',$data);
    }
  }
  //melamar lowongan ends

  //list Lamran start
  public function listLamaran()
  {
    $whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
    $nik=$cekU['nik'];
    $where = array ('nik'=>$nik);
    $data['list']=$this->Mhome->listLamaran($where)->result();
    $data['jumlah']= $this->notif()->num_rows();
    $data['notif'] = $this->notif()->result();
    $this->load->view('Pencaker/VlistStatusLamaran',$data);
  }
  //list Lamaran ends

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
    redirect('Cpencaker/listLamaran');
  }
  //notifikasi ends

}

 ?>
