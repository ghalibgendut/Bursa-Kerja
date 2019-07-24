<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Cadmin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Mhome');
		$this->load->helper(array("form","url"));
		//$this->load->library('pdf');
	}
	function rekaplowongan(){
		$data['lowongan']=$this->Mhome->rekaplowongan()->result();
		$this->load->view('Admin/rekap_lowongan',$data);
	}
	function rekaplowongan2(){
		$kategori=$this->input->post('bidang');
		if($kategori=='Perusahaan'){
			$query=
		}elseif ($kategori=='Lowongan') {
			$query
		}elseif ($kategori=='Posisi') {
			// code...
		}
		$data['lowongan']=$this->Mhome->rekaplowongan()->result();
		$this->load->view('Admin/rekap_lowongan',$data);
	}
	function rekapperusahaan(){
		$data['perusahaan']=$this->Mhome->rekapPerusahaan()->result();
		// $data['status']=$this->koneksi->rekapPerusahaan();
		$this->load->view('Admin/rekap_Perusahaan',$data);
	}
	function rekappendidikan(){
		$data['lowongan']=$this->Mhome->rekapTglLowongan();
		$this->load->view('Admin/rekap_TglLowongan',$data);
	}
}
?>
