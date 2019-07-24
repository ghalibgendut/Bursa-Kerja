<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
<meta name="author" content="GeeksLabs">
<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
<link rel="shortcut icon" href="img/favicon.png">
<link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo.png'); ?>">

<title>
  Bursa Kerja Online Kab.Bandung
</title>

<!-- Bootstrap CSS -->
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- bootstrap theme -->
<link href="<?php echo base_url();?>assets/css/bootstrap-theme.css" rel="stylesheet">
<!--external css-->
<!-- font icon -->
<link href="<?php echo base_url();?>assets/css/elegant-icons-style.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
<!-- full calendar css-->
<link href="<?php echo base_url();?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
<!-- easy pie chart-->
<link href="<?php echo base_url();?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
<!-- owl carousel -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" type="text/css">
<link href="<?php echo base_url();?>assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
<!-- Custom styles -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css">
<link href="<?php echo base_url();?>assets/css/widgets.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/xcharts.min.css" rel=" stylesheet">
<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
<!-- =======================================================
  Theme Name: NiceAdmin
  Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  Author: BootstrapMade
  Author URL: https://bootstrapmade.com
======================================================= -->
</head>
  <body>
    <div>
      <header class="panel-heading">
          <h1 align="center">
            <img align="left" width="70" height="70"  src="<?php echo base_url('uploads/logo.png'); ?>"></img>
            Dinas Tenaga Kerja Kabupaten Bandung
          </h1>
          <p style="font-size:13px"align="center">Jalan Raya Soreang Km. 17, Pamekaran, Soreang, Pamekaran, Kec. Soreang, Bandung, Jawa Barat 40912</p>
      </header><br>
      <h3>Profil Lengkap Anda</h3><br>
      <table class="table table-striped">
        <tbody>
          <?php foreach ($pencaker as $k) { ?>
          <p align = "center">
            <img  width="100" height="150"  src="<?php echo base_url('uploads/'.$k->foto) ?>"></img>
          </p>
          <tr>
            <td>NIK</td>
            <td><p><?php echo $k->nik; ?></p></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td><p><?php echo $k->namaLengkap; ?></p></td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td><p><?php echo $k->tempatLahir; ?></p></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td><p><?php echo date('d/m/Y', strtotime($k->tglLahir)); ?></p></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td><p><?php echo $k->jenisKelamin; ?></p></td>
          </tr>
          <tr>
            <td>Pendidikan Terakhir</td>
            <td><p><?php echo $pendidikanAkhir['nama_pendidikan'];?></p></td>
          </tr>
          <tr>
            <td>Jurusan</td>
            <td><p><?php echo $pendidikanAkhir['jurusan'] ; ?></p></td>
          </tr>
          <tr>
            <td>Status Pernikahan</td>
            <td><?php echo $k->statusPernikahan; ?></td>
          </tr>
          <tr>
            <td>Agama</td>
            <td><?php echo $k->agama; ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><p><?php echo $k->alamat; ?></p></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td><p><?php echo $kecamatan['nama_kecamatan']; ?></p></td>
          </tr>
          <tr>
            <td>Kelurahan</td>
            <td><p><?php echo $kelurahan['nama_kelurahan']; ?></p></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><p><?php echo $k->email; ?></p></td>
          </tr>
          <tr>
            <td>No Telepon</td>
            <td><p><?php echo $k->noTel; ?></p></td>
          </tr>
      <?php } ?>
        </tbody>
      </table>
    </div>
    <div>
      <header class="panel-heading">
        <h3>Riwayat Pendidikan Anda</h3>
      </header><br>
      <table class="table table-striped">
        <thead>
          <th>Tingkat</th>
          <th>Nama Sekolah</th>
          <th>Jurusan</th>
          <th>Alamat Sekolah</th>
          <th>Tanggal Lulus atau tanggal ijazah</th>
          <th>Foto Ijazah</th>
        </thead>
        <tbody>
          <?php foreach ($pendidikan as $k) { ?>
            <tr>
              <td><p><?php echo $k->tingkat; ?></p></td>
              <td><p><?php echo $k->nama_sekolah; ?></p></td>
              <td><p><?php echo $k->jurusan; ?></p></td>
              <td><p><?php echo $k->alamat_sekolah; ?></p></td>
              <td><p><?php echo $k->tgl_lulus; ?></p></td>
              <td>
                <img  width="200" height="200"  src="<?php echo base_url('uploads/'.$k->fotoIjazah) ?>"></img>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div>
        <header class="panel-heading">
          <h3>Portofolio</h3>
        </header><br>
        <table class="table table-striped">
          <thead>
            <th>Nama Pekerjaan</th>
            <th>Lama Bekerja</th>
            <th>Nama Sertifikat</th>
            <th>Foto Sertifikat</th>
          </thead>
          <tbody>
            <?php foreach ($portofolio as $k) { ?>
              <tr>
                <td><p><?php echo $k->nama_pekerjaan; ?></p></td>
                <td><p><?php echo $k->lama_bekerja; ?></p></td>
                <td><p><?php echo $k->nama_sertifikat; ?></p></td>
                <td>
                  <!-- <p>
                    <img  width="200" height="200"  src="<?php echo base_url('uploads/'.$k->foto_sertifikat) ?>"></img>
                  </p> -->
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <table class="table table-striped">
          <thead>
            <th>Nama Kemampuan</th>
            <th>Level</th>
          </thead>
          <tbody>
            <?php foreach ($kemampuan as $k) { ?>
              <tr>
                <td><p><?php echo $k->nama_kemampuan; ?></p></td>
                <td><p><?php echo $k->level; ?></p></td>
              </tr>
            <?php } ?>
          </tbody>
        </table><br>
        <?php foreach ($pencaker as $k) {?>
        <p align = "right">
          <img  width="200" height="200"  src="<?php echo base_url('assets/qrcode/'.$k->qr_code) ?>"></img>
        </p>
        <?php } ?>
  </body>
  <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="<?php echo base_url();?>assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="<?php echo base_url();?>assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="<?php echo base_url();?>assets/js/calendar-custom.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?php echo base_url();?>assets/js/jquery.customSelect.min.js"></script>
    <script src="<?php echo base_url();?>assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="<?php echo base_url();?>assets/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/easy-pie-chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url();?>assets/js/xcharts.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.autosize.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.placeholder.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/gdp-data.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/sparklines.js"></script>
    <script src="<?php echo base_url();?>assets/js/charts.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
    <script>
      window.print();
    </script>
</html>
