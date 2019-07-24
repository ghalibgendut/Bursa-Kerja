<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Cperusahaan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Mhome');
		$this->load->helper(array("form","url"));
		$this->load->helper('email');
		$this->load->library('email');
		$this->load->library('form_validation');
		//$this->load->library('pdf');
	}
  function index(){
		$whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_user('perusahaan',$whereU)->row_array();
    $no=$cekU['no_siup'];
		$where = array('no_siup' => $no);
		$data['listPendidikan'] = $this->Mhome->list_pendidikan()->result();
		$data['perusahaan'] = $this->Mhome->get_profile($where)->result();
		$data['jumlah']=$this->notif_perusahaan()->num_rows();
    $data['notif'] = $this->notif_perusahaan()->result();
    $this->load->view('Perusahaan/Vinput_lowongan',$data);
  }

	function registrasi(){
		$this->load->view('Perusahaan/Vregis_perusahaan');
		if ($this->input->post('daftar')) {
      $this->form_validation->set_rules(
  			'uname','Username',
  			'required|min_length[5]|max_length[12]|is_unique',
  			array(
  					'required' => 'you have not provided %s.',
  					'is_unique' => 'This is already exists.')
  		);
      $this->form_validation->set_rules('pass','Password','trim|required|min_length[8]');
      $this->form_validation->set_rules('email','E-mail','required');
      $this->form_validation->set_rules(
  			'no_siup','No Siup',
  			'required|numeric',
  			array(
  					'required' => 'you have not provided %s.',
  					'numeric' => '%s number only.')
  		);
      // $this->form_validation->set_rules('no_siup','No Siup','required');
      $this->form_validation->set_rules('nama_perusahaan','Nama Perusahaan','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('Perusahaan/Vregis_perusahaan');
      }
			$nosiup = $this->input->post('no_siup');
      $namaperusahaan = $this->input->post('nama_perusahaan');
			$username = $this->input->post('username');
      $password = $this->input->post('pass');
      $email = $this->input->post('email');
			$alamat = $this->input->post('alamat');


        $data = array('no_siup'=>$nosiup,
                      'nama_perusahaan'=>$namaperusahaan,
                      'alamat'=>$alamat,
                      'username'=>$username,
                      'email'=>$email
        );
        $tgl = date('y-m-d');
        $akun = array('username'=> $username,
                      'password'=>$password,
                      'tgl_regis'=>$tgl,
                      'status'=>'Perusahaan',
                      'active'=> 0);
        $this->Mhome->reg_perushaan('perusahaan',$data);
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
	function lowongan(){
		$data['no_siup']=$this->input->post('No_Siup');
		$data['tanggal_pendaftaran']=date('Y-m-d',strtotime(substr($this->input->post('tgl_pendaftaran'),0,10)));
		$data['batas_waktu']=date('Y-m-d',strtotime(substr($this->input->post('tgl_pendaftaran'),-10)));
		$data['nama_perusahaan']=$this->input->post('Nama_Perusahaan');
		$data['nama_lowongan']=$this->input->post('Nama_lowongan');
		$data['jabatan']=$this->input->post('Jabatan');
		$jk =$this->input->post('Jenis_Kelamin');
		$data['jenis_kelamin']=implode(",",$jk);
		$arr= explode("-",$this->input->post('Pendidikan'));
		$data['pendidikan'] = $arr[1];
		$data['level'] = $arr[0];
		$data['pengalaman']=$this->input->post('Pengalaman');
		$data['pengupahan']=$this->input->post('Pengupahan');
		$data['gaji']=$this->input->post('Gaji');
		$data['tipe_ikatan']=$this->input->post('Tipe_Ikatan_Kerja');
    $data['status']='Belum berakhir';

		$config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 3000;
    $this->load->library('upload', $config);
    if (! $this->upload->do_upload('poster')) {
      $this->session->set_flashdata('msg',
                '<div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>Maaf!</strong> Anda harus mengupload poster.
                </div>');
      $this->load->view('Perusahaan/Vinput_lowongan',$data);
		}
		else {
			$data['posterLowongan'] = $_FILES['poster']['name'];
      $upload_data = $this->upload->data();
			$id_lowongan = $this->Mhome->input_lowongan('lowongan',$data);
			$dataA['pendidikan_minimal']=$data['pendidikan'];
			$dataA['tahun_pengalaman']=$this->input->post('Pengalaman');
			$dataA['deskripsi']=$this->input->post('deskripsi');
			// print_r($jk);
			// echo $data['jenis_kelamin'];
			$this->kualifikasi($id_lowongan,$data['pendidikan'],$this->input->post('Pengalaman'),$this->input->post('deskripsi'));
		}

		//$data = $this->Mhome->ins_kualifikasi('kualifikasi',$dataA);

		//redirect('Cperusahaan/kualifikasi',$data);
	}
	function edit_lowongan($id){
		$where = array('id_lowongan' => $id );
		$data['listPendidikan'] = $this->Mhome->list_pendidikan()->result();
		$data['datalowongan']=$this->Mhome->edit_lowongan($where,'lowongan')->row();
		$data['jumlah']=$this->notif_perusahaan()->num_rows();
		$data['notif'] = $this->notif_perusahaan()->result();
		$this->load->view('Perusahaan/Vedit_lowongan',$data);
	}
	function update_lowongan($id){
		$whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_perusahaan('perusahaan',$whereU)->row_array();
    $no=$cekU['no_siup'];
		$where = array ('id_lowongan'=> $id);
		// print_r($where);
		$data['no_siup']=$this->input->post('No_Siup');
		$data['tanggal_pendaftaran']=date('Y-m-d',strtotime(substr($this->input->post('tgl_pendaftaran'),0,10)));
		$data['batas_waktu']=date('Y-m-d',strtotime(substr($this->input->post('tgl_pendaftaran'),-10)));
		$data['nama_perusahaan']=$this->input->post('Nama_Perusahaan');
		$data['nama_lowongan']=$this->input->post('Nama_lowongan');
		$data['jabatan']=$this->input->post('Jabatan');
		$data['jenis_kelamin']=$this->input->post('Jenis_Kelamin');
		$arr= explode("-",$this->input->post('Pendidikan'));
		$data['pendidikan'] = $arr[1];
		$data['level'] = $arr[0];
		$data['pengalaman']=$this->input->post('Pengalaman');
		$data['pengupahan']=$this->input->post('Pengupahan');
		$data['gaji']=$this->input->post('Gaji');
		$data['tipe_ikatan']=$this->input->post('Tipe_Ikatan_Kerja');
    $data['status']='Belum berakhir';
		$id_lowongan = $this->Mhome->update_lowongan($where,$data,'lowongan');
		$dataA['pendidikan_minimal']=$data['pendidikan'];
		$dataA['tahun_pengalaman']=$this->input->post('Pengalaman');
		$dataA['deskripsi']=$this->input->post('deskripsi');
		$this->Mhome->update_lowongan($where,$dataA,'kualifikasi');
		redirect('Cperusahaan/lihat_lowongan');
		// echo $data['jenis_kelamin']=$this->input->post('Jenis_Kelamin');

		// redirect('Cperusahaan/lihat_lowongan');
	}
	function lihat_lowongan(){
		$whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_perusahaan('perusahaan',$whereU)->row_array();
    $no=$cekU['no_siup'];
    $where = array ('no_siup'=>$no);
		$data['lowong']=$this->Mhome->lowongan_perusahaan($where)->result();
		$data['jumlah']=$this->notif_perusahaan()->num_rows();
    $data['notif'] = $this->notif_perusahaan()->result();
		$this->load->view('Perusahaan/VhomePerusahaan',$data);
	}

	function kualifikasi($data,$pen,$peng,$des){
		$dataA['id_lowongan']=$data;
		$dataA['pendidikan_minimal']=$pen;
		$dataA['tahun_pengalaman']=$peng;
		$dataA['deskripsi']=$des;
		$this->Mhome->ins_kualifikasi('kualifikasi',$dataA);
		redirect('Cperusahaan/index');
	}
	function Profil(){
		$whereU = array('username' => $this->session->userdata('username'));
    $cekU = $this->Mhome->cek_perusahaan('perusahaan',$whereU)->row_array();
    $no=$cekU['no_siup'];
    $where = array ('no_siup'=>$no);
    $data['perusahaan'] = $this->Mhome->get_profile($where)->result();
		$data['jumlah']=$this->notif_perusahaan()->num_rows();
    $data['notif'] = $this->notif_perusahaan()->result();
    $this->load->view('Perusahaan/VprofilePerusahaan',$data);

	}
	function Lamaran(){
		$whereU = array('username' => $this->session->userdata('username'));
		// $whereU = array('nama_perusahaan' => $this->session->userdata('nama_perusahaan'));
		$cekU = $this->Mhome->cek_perusahaan('perusahaan',$whereU)->row_array();
		$no=$cekU['no_siup'];
		$where = array ('no_siup'=>$no);
		$data['perusahaan']=$this->Mhome->lamaranPerusahaan($where)->result();
		// $data['jumlah']= $this->jml_notif_perusahaan();
		$data['jumlah']=$this->notif_perusahaan()->num_rows();
    $data['notif'] = $this->notif_perusahaan()->result();
		$this->load->view('Perusahaan/VlihatLamaran',$data);
	}
	function detailPelamarKerja($id)
	{
		//$where = array('username' => $this->session->userdata('username'));
		$where['lowongan.id_lowongan']=$id;
		// $where['pencaker.nik'] = $nik;
		$data['lamaran'] = $this->Mhome->detailPelamar($where)->result();
		$data['jumlah']=$this->notif_perusahaan()->num_rows();
    $data['notif'] = $this->notif_perusahaan()->result();
		$this->load->view('Perusahaan/Vpelamar',$data);
	}
	public function statusPelamar($status,$id,$idLowongan,$catatan)
	{
		$data['catatan']=$catatan;
		$where1['nik'] = $id;
		$where1['id_lowongan'] = $idLowongan;
		$data['status_notifikasi'] = 0;
		$hasil = "";
		if ($status == "1") {
			$data['status_lamaran'] = "Diterima";
			$this->Mhome->updateStatusLamaran($where1,$data,'melamar');
			$hasil = "Diterima";
		}
		elseif ($status == "2") {
			$data['status_lamaran'] =  "Panggil Wawancara";
			$this->Mhome->updateStatusLamaran($where1,$data,'melamar');
			$hasil = "Panggil Wawancara";
		}
		elseif ($status == "3") {
			$data['status_lamaran'] = "Ditolak";
			$this->Mhome->updateStatusLamaran($where1,$data,'melamar');
			$hasil = "Di Tolak";
		}
		$data['hasil'] = $hasil;
		echo json_encode($data);
	}
	function test() {
		$catatan = $this->input->post('catatan');
		$status = $this->input->post('status_lamaran');
		$nik = $this->input->post('nik');
		$idLowongan = $this->input->post('idLowongan');
		$this->statusPelamar($status, $nik, $idLowongan, $catatan);
		// $data['status'] = $status;
		// $data['isi'] = $catatan;
		// $data['nik'] = $nik;
		// $data['idLowongan'] = $idLowongan;
		// echo json_encode($data);
		// redirect('Cpencaker/statusPelamar');
	}
	public function tombol_selesai($id)
	{
		$whereU = array('username' => $this->session->userdata('username'));
		$cekU = $this->Mhome->cek_perusahaan('perusahaan',$whereU)->row_array();
		$no=$cekU['no_siup'];
		$idLowongan['id_lowongan'] = $id;
		$where = array ('no_siup'=>$no, 'id_lowongan'=>$id);
		$data = $this->Mhome->update_status('lowongan',$where);
		redirect('Cperusahaan/Lamaran');
		// echo $id;
		// $this->load->view('Perusahaan/VlihatLamaran',$data);
	}
	// notifikasi start
	public function jml_notif_perusahaan()
	{
		$whereU = array('username' => $this->session->userdata('username'));
		$cekU = $this->Mhome->cek_perusahaan('perusahaan',$whereU)->row_array();
		$no=$cekU['no_siup'];
		$whereA = array ('no_siup'=>$no);
		$cek = $this->Mhome->get_cekLowongan($whereA)->result();
		print_r($cek);
		// $id = $cek['id_lowongan'];
		// $whereB['id_lowongan']=$id;
		// $whereB['status_notifikasi'] = 0;
		// $data = $this->Mhome->jumlah_notifikasi_perusahaan($whereB)->row_array();
		// return $data;
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
	public function get_nik($id)
	{
		$whereU = array('username' => $this->session->userdata('username'));
		$cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
		$nik=$cekU['nik'];
		$where = array ('nik'=>$nik, 'id_lowongan'=>$id);
		$data = $this->Mhome->update_notifikasi('melamar',$where);
		redirect('Cperusahaan/Lamaran');
	}
	//notifikasi end

}

?>
