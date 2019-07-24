<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Mhome extends CI_Model
{
  //paginasi start
  public function lowong(){
    $query="select * from lowongan where batas_waktu >= Current_Date and tanggal_pendaftaran <= current_date and status != 'selesai'";
    return $this->db->query($query);
  }
  function lowongan_perusahaan($where){
    return $this->db->get_where('lowongan',$where);
  }
  public function pagination_lowongan($limit, $start,$lowongan){
        // $this->db->select('*');
        // $this->db->from('lowongan');
        // $this->db->where("(`nama_lowongan` LIKE '%$res%')");
        // $query = $this->db->get('lowongan',$limit, $start,$lowongan);
        // return $query; select * from lowongan where batas_waktu >= Current_Date and tanggal_pendaftaran <= current_date and status != 'selesai' ORDER BY `level`
        // $where = array('status !' => 'Selesai', 'batas_waktu >=' => date('Y-m-d'), 'tanggal_pendaftaran <=' => date('Y-m-d'));
        // $this->db->where($array);
          // $where['batas_waktu >=Current_Date']=;
          // $where['tanggal_pendaftaran <=']= 'Current_Date';
          // $where['status !']='Selesai';
          // $this->db->where($where);
          // $this->db->select('*');
      		// $this->db->from('lowongan');
      		if (!empty($lowongan)) {
      			// $this->db->like('nama_lowongan', $lowongan);
            // $this->db->or_like('nama_perusahaan',$lowongan);
            // $this->db->or_like('jabatan', $lowongan);
            $query="select * from lowongan where batas_waktu >= Current_Date and tanggal_pendaftaran <= current_date and status != 'selesai' and nama_lowongan like '$lowongan' or nama_perusahaan like '$lowongan' or jabatan like '$lowongan'  limit $limit";
      		}else{
            $query="select * from lowongan where batas_waktu >= Current_Date and tanggal_pendaftaran <= current_date and status != 'selesai' limit $limit";
          }
          $getData=$this->db->query($query);
          // $this->db->order_by('id_lowongan','DESC');
      		// $getData = $this->db->get('', $limit, $start);

      		if ($getData->num_rows() > 0){
              return $getData->result_array();
          }
      		else{
              return null;
          }
  }
  public function pagination_lowongan1($limit, $start,$lowongan){
        // $this->db->select('*');
        // $this->db->from('lowongan');
        // $this->db->where("(`nama_lowongan` LIKE '%$res%')");
        // $query = $this->db->get('lowongan',$limit, $start,$lowongan);
        // return $query; select * from lowongan where batas_waktu >= Current_Date and tanggal_pendaftaran <= current_date and status != 'selesai' ORDER BY `level`
        $where = array('status !' => 'Selesai', 'batas_waktu >=' => date('Y-m-d'), 'tanggal_pendaftaran <=' => date('Y-m-d'));
        // $this->db->where($array);
          // $where['batas_waktu >=Current_Date']=;
          // $where['tanggal_pendaftaran <=']= 'Current_Date';
          // $where['status !']='Selesai';
          $this->db->where($where);
          $this->db->select('*');
      		$this->db->from('lowongan');
      		if (!empty($lowongan)) {
      			$this->db->like('nama_lowongan', $lowongan);
            $this->db->or_like('nama_perusahaan',$lowongan);
            $this->db->or_like('jabatan', $lowongan);
      		}
          // $this->db->order_by('id_lowongan','DESC');
      		$getData = $this->db->get('', $limit, $start);

      		if ($getData->num_rows() > 0){
              return $getData->result_array();
          }
      		else{
              return null;
          }
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
    return $this->db->query("select * from lowongan where batas_waktu >= Current_Date and tanggal_pendaftaran <= current_date and status != 'selesai' ORDER BY level");
  }
  //pendaftaran akun pencari kerja mulai
  public function reg_pencaker($table,$data){
    return $this->db->insert($table,$data);
  }
  public function reg_akun($table,$akun){
    $this->db->insert($table,$akun);
    return  $this->db->insert_id();
  }
  public function list_kecamatan()
  {
    $query = $this->db->query('SELECT * FROM kecamatan ORDER BY nama_kecamatan ASC');
    return $query;
  }
  public function list_kelurahan($id)
  {
    $query = $this->db->query("SELECT * FROM `kelurahan` WHERE `id_kecamatan` = $id");
    return $query;
  }
  public function get_kel($where,$whereB)
  {
    $this->db->select('nama_kelurahan');
    $this->db->from('pencaker');
    $this->db->join('kelurahan','pencaker.id_kelurahan = kelurahan.id_kelurahan');
    $this->db->where($where,$whereB);
    $query = $this->db->get();
    return $query;
  }
  public function get_kecamatan($where,$whereA)
  {
    $this->db->select('nama_kecamatan');
    $this->db->from('pencaker');
    $this->db->join('kecamatan','pencaker.id_kecamatan = kecamatan.id_kecamatan');
    $this->db->where($where,$whereA);
    $query = $this->db->get();
    return $query;
  }
  public function get_kecamatanP($where,$whereB)
  {
    $this->db->select('nama_kecamatan');
    $this->db->from('pencaker');
    $this->db->join('kecamatan','pencaker.id_kecamatan = kecamatan.id_kecamatan');
    $this->db->where($where,$whereB);
    $query = $this->db->get();
    return $query;
  }
  public function get_kelurahanP($where,$whereC)
  {
    $this->db->select('nama_kelurahan');
    $this->db->from('pencaker');
    $this->db->join('kelurahan','pencaker.id_kelurahan = kelurahan.id_kelurahan');
    $this->db->where($where,$whereC);
    $query = $this->db->get();
    return $query;
  }
  public function get_kecamatanSemua()
  {
    $this->db->select('id_kecamatan');
    $this->db->from('kecamatan');
    $query = $this->db->get();
    return $query;
  }
  public function get_kelurahanSemua()
  {
    $this->db->select('id_kelurahan');
    $this->db->from('kelurahan');
    $query = $this->db->get();
    return $query;
  }
  public function list_pendidikan()
  {
    $query = $this->db->query('SELECT * FROM list_pendidikan');
    return $query;
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
  public function get_pendidikan($nik)
  {
    //return $this->db->query("SELECT * FROM `riwayat_pendidikan` WHERE `tgl_lulus` IN (SELECT MAX(`tgl_lulus`) FROM `riwayat_pendidikan` WHERE `nik` = $nik  GROUP BY `nik`)");
    //return $this->db->get_where('riwayat_pendidikan',$where);
    $data = $this->db->query("SELECT MAX(`tgl_lulus`) AS `maxi` FROM `riwayat_pendidikan` WHERE `nik` = $nik ")->row_array();
    $tgl = $data['maxi'];
    return $this->db->query(" SELECT * FROM `riwayat_pendidikan` JOIN `list_pendidikan` USING (`id_list_pendidikan`) WHERE `nik` = $nik AND `tgl_lulus` = '$tgl'");
  }
  public function get_pendidikanSemua($where)
  {
     $this->db->select('*','nama_pendidikan');
     $this->db->from('riwayat_pendidikan');
     $this->db->where($where);
     $query = $this->db->get();
     return $query;
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
  public function listLamaran($where)
  {
    $this->db->select('lowongan.id_lowongan, perusahaan.no_siup, pencaker.nik, nama_lowongan, perusahaan.nama_perusahaan, namaLengkap, status_lamaran, catatan');
    $this->db->from('perusahaan');
    $this->db->join('lowongan','perusahaan.no_siup = lowongan.no_siup');
    $this->db->join('melamar', 'lowongan.id_lowongan = melamar.id_lowongan');
    $this->db->join('pencaker', 'melamar.nik = pencaker.nik');
    $this->db->where('pencaker.nik',$where['nik']);
    $query = $this->db->get();
    return $query;
  }
    //pengecekan lamaran start
  public function cekLamaran($cari)
  {
    //$this->db->query("SELECT nik, id_lowongan FROM melamar WHERE nik = $where['nik'] AND id_lowongan = $whereA['id_lowongan']");
    $this->db->select('nik, id_lowongan');
    $this->db->from('melamar');
    $this->db->where($cari);
    $query = $this->db->get();
    return $query;
  }
  public function dataPendidikanPelamar($nik)
  {
    $data = $this->db->query("SELECT MAX(`id_list_pendidikan`) AS `level` FROM `riwayat_pendidikan` WHERE `nik` = $nik ")->row_array();
    $lev = $data['level'];
    return $this->db->query("SELECT `jenisKelamin`,`id_list_pendidikan` FROM `pencaker`
                      JOIN `riwayat_pendidikan` USING (`nik`)
                      WHERE `nik` = $nik AND `id_list_pendidikan` = '$lev'");
    // $this->db->select('jenisKelamin','id_list_pendidikan');
    // $this->db->from('pencaker')->join('riwayat_pendidikan', 'pencaker.nik = riwayat_pendidikan.nik');
    // $this->db->where('pencaker.nik',$where['nik']);
    // $query = $this->db->get();
    // return $query;
  }
  public function dataPendidikanLowongan($where)
  {
    $this->db->select('level, jenis_kelamin');
    $this->db->from('lowongan');
    $this->db->where('id_lowongan',$where['id_lowongan']);
    $query = $this->db->get();
    return $query;
  }
    //pengecekan lamaran end

    //notifikasi Start
  public function jumlah_notifikasi($where)
  {
    $this->db->select('COUNT(*) as total');
    $this->db->from('melamar');
    $this->db->where($where);
    return $this->db->get();
  }

  public function notifikasi($where)
  {
    $this->db->select('lowongan.id_lowongan, nama_lowongan, perusahaan.nama_perusahaan, status_lamaran');
    $this->db->from('perusahaan');
    $this->db->join('lowongan','perusahaan.no_siup = lowongan.no_siup');
    $this->db->join('melamar','lowongan.id_lowongan = melamar.id_lowongan');
    $this->db->where($where);
    return $this->db->get();
  }

  public function update_notifikasi($table,$where)
  {
    $data = array('status_notifikasi' => 1);
    $this->db->where($where);
		return $this->db->update($table,$data);
  }

  public function jumlah_notifikasi_perusahaan($whereB)
  {
    $this->db->select('COUNT(*) as total');
    $this->db->from('melamar');
    $this->db->where('id_lowongan',$whereB['id_lowongan']);
    return $this->db->get();
  }

  public function notifikasi_perusahaan1($whereB)
  {
    $this->db->select('lowongan.id_lowongan, nama_lowongan, perusahaan.nama_perusahaan, status_lamaran');
    $this->db->from('perusahaan');
    $this->db->join('lowongan','perusahaan.no_siup = lowongan.no_siup');
    $this->db->join('melamar','lowongan.id_lowongan = melamar.id_lowongan');
    $this->db->where($whereB);
    return $this->db->get();
  }

  public function notifikasi_perusahaan($whereB)
  {
    $this->db->select('lowongan.id_lowongan, nama_lowongan, perusahaan.nama_perusahaan, status_lamaran');
    $this->db->from('perusahaan');
    $this->db->join('lowongan','perusahaan.no_siup = lowongan.no_siup');
    $this->db->join('melamar','lowongan.id_lowongan = melamar.id_lowongan');
    $this->db->where($whereB);
    return $this->db->get();
  }

  public function get_cekLowongan($whereA)
  {
    $this->db->select('id_lowongan');
    $this->db->from('lowongan');
    $this->db->where($whereA);
    $query = $this->db->get();
    return $query;
  }
    //notifikasi end
  //melamar pekerjaan ends

  //Bagian Perusahaan Mulai
  //Registrasi Perusahaan Start
  function reg_perushaan($table,$data){
    return $this->db->insert($table,$data);
  }
  //Registrasi perusahaan ends

  //Input Lowongan Start
  function input_lowongan($table,$data){
    $this->db->insert($table,$data);
    return $this->db->insert_id();
  }
  function edit_lowongan($where,$table){
    return $this->db->get_where($table,$where);
  }
  function update_lowongan($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  public function ins_kualifikasi($table,$dataA)
  {
    $this->db->insert($table,$dataA);
    return $this->db->insert_id();
  }
  public function update_status($table,$where){
    $data = array('status' => 'Selesai');
    $this->db->where($where);
		return $this->db->update($table,$data);
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
    return $this->db->get_where('perusahaan',$where);
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
  //total lamaran masuk start
  function lamaranPerusahaan($where){
    $this->db->select('lowongan.id_lowongan,nama_lowongan,status, count(pencaker.nik) as total');
    $this->db->from('pencaker');
    $this->db->join('melamar','pencaker.nik = melamar.nik');
    $this->db->join('lowongan','melamar.id_lowongan = lowongan.id_lowongan');
    $this->db->join('perusahaan','lowongan.no_siup = perusahaan.no_siup');
    $this->db->where('perusahaan.no_siup',$where['no_siup']);
    $this->db->group_by('melamar.id_lowongan');
    $query = $this->db->get();
    return $query;
  }
  //total lamaran masuk end
  public function detailPelamar($where)
  {
    $this->db->select('lowongan.id_lowongan, perusahaan.no_siup, foto, pencaker.nik, namaLengkap, tglLahir, jenisKelamin, pencaker.email, pencaker.noTel');
    $this->db->from('pencaker');
    $this->db->join('melamar','pencaker.nik = melamar.nik');
    $this->db->join('lowongan','melamar.id_lowongan = lowongan.id_lowongan');
    $this->db->join('perusahaan','lowongan.no_siup = perusahaan.no_siup');
    $this->db->where($where);
    $query = $this->db->get();
    return $query;
  }
    //total lamaran masuk end
    //Status Lamaran Start
    public function get_statusLamaran($where)
    {
      $this->db->select('id_lowongan, nik');
      $this->db->from('melamar');
      $this->db->where($where);
      $query = $this->db->get();
      return $query;
    }

    public function updateStatusLamaran($where,$data,$table)
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }
    //Status lamaran ends
  //Bagian Perusahaan selesai

  //pencarian lowongan Start
  // public function search($nama_lowongan)
  // {
  //   $hasil=$this->db->query("SELECT * FROM lowongan WHERE nama_lowongan LIKE '%$nama_lowongan%'");
  //   return $hasil->result();
  //   // $hsl=$this->db->query("SELECT * FROM lowongan WHERE nama_lowongan LIKE'%$nama_lowongan%'");
  //   //     if($hsl->num_rows()>0){
  //   //       foreach ($hsl->result() as $data) {
  //   //           $hasil=array(
  //   //               'no_siup' => $data->no_siup,
  //   //               'nama_lowongan' => $data->nama_lowongan,
  //   //               'nama_perusahaan' => $data->nama_perusahaan,
  //   //               'jabatan' => $data->jabatan,
  //   //               'gaji' => $data->gaji
  //   //               );
  //   //       }
  //   //     }
  //   //     return $hasil;
  // }
  //pencarian lowongan End

  //Bagian Admin Mulai
  function rekaplowongan(){
    $query=$this->db->query("SELECT nama_perusahaan, nama_lowongan, tanggal_pendaftaran, batas_waktu, jabatan, COUNT(nik) as total
    FROM lowongan JOIN melamar USING (id_lowongan)
    GROUP BY id_lowongan ");
    return $query;
  }function rekaplowongan2(){
    $query=$this->db->query("SELECT nama_perusahaan, nama_lowongan, tanggal_pendaftaran, batas_waktu, jabatan, COUNT(nik) as total
    FROM lowongan JOIN melamar USING (id_lowongan)
    GROUP BY id_lowongan ");
    return $query;
  }
  function rekapPerusahaan(){
    $query=$this->db->query("SELECT * FROM perusahaan JOIN akun USING (username)
    WHERE status = 'perusahaan' and active ='1'");
    return $query;
  }
  function rekapTglLowongan(){
    $query=$this->db->query("SELECT *, DATE_ADD(tanggal_pendaftaran, INTERVAL 90 DAY) AS Selesai,
    DATEDIFF(DATE_ADD(tanggal_pendaftaran, INTERVAL 90 DAY), CURRENT_DATE) as Selisih FROM lowongan") ;
    return $query;
  }
  //Bagian Admin Selesai
}





 ?>
