<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Cetak extends CI_Controller
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
  }
  public function suratLamaranPencaker()
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
    $this->load->view('Pencaker/VsuratLamaran',$data);
  }
  public function suratLamranPerusahaan($id,$idLowongan)
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
    $data['lowongan'] = $this->Mhome->lowongan_perusahaan($whereA)->row_array();
    $data['kecamatan'] = $this->Mhome->get_kecamatanP($where,$whereB)->row_array();
    $data['kelurahan'] = $this->Mhome->get_kelurahanP($where,$whereC)->row_array();
    $data['id']=$where['nik'];
    // print_r($data['lowongan']);
    $this->load->view('Perusahaan/VsuratLamaranPerusahaan',$data);
  }
  public function pdf()
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
    $this->load->view('Pencaker/Vcetak',$data);
      //Ngambil data where pencaker
      // $whereU = array('username' => $this->session->userdata('username'));
      // $cekU = $this->Mhome->cek_user('pencaker',$whereU)->row_array();
      // $nik=$cekU['nik'];
      // $where = array ('nik'=>$nik);
      // $data = $this->Mhome->get_pencaker($where)->row_array();
      // $dataP = $this->Mhome->get_pendidikanSemua($where)->result();
      // $dataA = $this->Mhome->get_pendidikan($nik)->row_array();
      // //Ngambil data where pencaker
      // $pdf = new FPDF('l','mm','A4');
      // $pdf->AddPage();
      // $pdf->SetFont('Arial', 'B', 30);
      // $pdf->Cell(60,7,"KARTU AK-1",0,1,'C');
      // $pdf->Cell(10,7,'',0,1);
      // $pdf->SetFont('Arial','B',14);
      // $pdf->Cell(10,7,'',0,1);
      // $pdf->Image('uploads/'.$data['foto'],200,30,30,0,'JPG','PNG');
      // $pdf->Cell(20,30,'',0,1);
      // $pdf->Cell(70,6,'NIK',1,0);
      // $pdf->Cell(70,6,$data['nik'],1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'NAMA LENGKAP',1,0);
      // $pdf->Cell(70,6,$data['namaLengkap'],1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'TEMPAT LAHIR',1,0);
      // $pdf->Cell(70,6,$data['tempatLahir'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'TANGGAL LAHIR',1,0);
      // $pdf->Cell(70,6,$data['tglLahir'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'JENIS KELAMIN',1,0);
      // $pdf->Cell(70,6,$data['jenisKelamin'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'PENDIDIKAN TERAKHIR',1,0);
      // $pdf->Cell(70,6,$dataA['nama_pendidikan'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'JURUSAN',1,0);
      // $pdf->Cell(70,6,$dataA['jurusan'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'STATUS PERNIKAHAN',1,0);
      // $pdf->Cell(70,6,$data['statusPernikahan'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'AGAMA',1,0);
      // $pdf->Cell(70,6,$data['agama'],1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'ALAMAT',1,0);
      // $pdf->Cell(70,6,$data['alamat'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'EMAIL',1,0);
      // $pdf->Cell(70,6,$data['email'] ,1,0);
      // $pdf->Cell(20,7,'',0,1);
      // $pdf->Cell(70,6,'NO HP',1,0);
      // $pdf->Cell(70,6,$data['noTel'],1,0);
      // $pdf->Cell(100,7,'',0,1);
      // $pdf->Image('assets/qrcode/'.$data['qr_code'],200,100,30,30,'PNG');
      // $pdf->Cell(10,5,'',0,1);
      // $pdf->Cell(60,7,"RIWAYAT PENDIDIKAN",0,1,'C');
      // $pdf->SetFont('Arial','B',14);
      // $pdf->Cell(60,7,'TINGKAT',1,0);
      // $pdf->Cell(60,7,'NAMA SEKOLAH',1,0);
      // $pdf->Cell(60,7,'JURUSAN',1,0);
      // $pdf->Cell(70,7,'ALAMAT SEKOLAH',1,1);
      // foreach ($dataP as $k) {
      //     $pdf->Cell(60,7,$k->tingkat,1,0);
      //     $pdf->Cell(60,7,$k->nama_sekolah,1,0);
      //     $pdf->Cell(60,7,$k->jurusan,1,0);
      //     $pdf->Cell(70,7,$k->alamat_sekolah,1,1);
      // }
      // // $pdf->Cell(70,6,'TINGKAT',1,0);
      // // $pdf->Cell(70,6,$dataP['tingkat'],1,1);
      // // $pdf->Cell(70,6,'NAMA SEKOLAH',1,1);
      // $pdf->Output();
  }
}


 ?>
