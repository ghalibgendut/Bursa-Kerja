 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
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
    <!-- container section start -->
    <section id="container" class="">


      <header class="header dark-bg">
        <div class="toggle-nav">
          <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="<?php echo base_url('Cpencaker/index'); ?>"  class="logo">Kabupaten <span class="lite">Bandung</span>
          <img align="left" width="30" height="30" src="<?php echo base_url('uploads/logo.png'); ?>" alt=""></img>
        </a>
        <!--logo end-->

        <div class="nav search-row" id="top_menu">
          <!--  search form start -->
          <ul class="nav top-menu">
            <li>
              <!-- <form class="navbar-form">
                <input class="form-control" placeholder="Search" type="text">
              </form> -->
            </li>
          </ul>
          <!--  search form end -->
        </div>

        <div class="top-nav notification-row">
          <!-- notificatoin dropdown start-->
          <ul class="nav pull-right top-menu">

            <!-- task notificatoin start -->
            <!-- inbox notificatoin end -->
            <!-- alert notification start-->
            <li id="alert_notificatoin_bar" class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                              <i class="icon-bell-l"></i>
                              <span class="badge bg-important"><?php echo $jumlah; ?></span>
                          </a>
              <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-blue"></div>
                <li>
                  <p class="blue">You have <?php echo $jumlah; ?> new notifications</p>
                </li>
                <?php
                 foreach ($notif as $k) {
                   ?>

                  <li>
                    <a href="<?php echo base_url('Cpencaker/get_nik/'.$k->id_lowongan); ?>">
                                        <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                        <?php echo $k->nama_lowongan; ?>
                                        <?php echo $k->nama_perusahaan; ?>
                                        <span class="small italic pull-right"><?php echo $k->status_lamaran; ?></span>
                                    </a>
                  </li>
              <?php } ?>
              </ul>
            </li>
            <!-- alert notification end-->
            <!-- user login dropdown start-->
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <span class="profile-ava">
                                  <img alt="" src="img/avatar1_small.jpg">
                              </span>
                              <span class="username"><?php echo $this->session->userdata("username"); ?></span>
                              <b class="caret"></b>
                          </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a href="<?php echo base_url('Cpencaker/profilPencaker'); ?>"><i class="icon_profile"></i> My Profile</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Chome/logout'); ?>"><i class="icon_key_alt"></i> Log Out</a>
                </li>
              </ul>
            </li>
            <!-- user login dropdown end -->
          </ul>
          <!-- notificatoin dropdown end-->
        </div>
      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <li class="active">
              <a class="" href="<?php echo base_url('Cpencaker/index'); ?>">
                            <i class="icon_house_alt"></i>
                            <span>Dashboard</span>
                        </a>
            </li>
            <li class="active">
              <a class="" href="<?php echo base_url('Cpencaker/listLamaran'); ?>">
                            <i class="far fa-file-alt"></i>
                            <span>List Lamaran Anda</span>
                        </a>
            </li>

          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Profil</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="<?php echo base_url('Cpencaker/index'); ?>">Home</a></li>
                <li><i class="fa fa-laptop"></i>Profil</li>
              </ol>
            </div>
            <div>
              <header class="panel-heading">
                Profil Lengkap Anda
              </header><br>
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
                    <td><p><?php echo date('d/m/Y', strtotime($k->tglLahir));?></p></td>
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
                    <td>Status Warga Negara</td>
                    <td><?php echo $k->status_WN; ?></td>
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
                  </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <div>
              <header class="panel-heading">
                Riwayat Pendidikan Anda
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
                  Portofolio
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
                </table>
              <p align = "right">
                <a class="btn btn-primary" href="<?php echo base_url('Chome/editProfilPencaker'); ?>" title="Bootstrap 3 themes generator">Edit Profil</a>
                <a class="btn btn-warning" href="<?php echo base_url('Chome/riwayatPendidikanPencaker'); ?>" title="Bootstrap 3 themes generator">Tambah Riwayat Pendidikan</a>
                <a class="btn btn-success" href="<?php echo base_url('Cetak/pdf'); ?>" title="Bootstrap 3 themes generator">Cetak Kartu AK-1</a>
                <a class="btn btn-primary" href="<?php echo base_url('Chome/portofolioPencaker'); ?>" title="Bootstrap 3 themes generator">Tambah Portofolio</a>
                <a class="btn btn-success" href="<?php echo base_url('Cetak/suratLamaranPencaker'); ?>" title="Bootstrap 3 themes generator">Cetak Surat Lamaran</a>
                <a class="btn btn-warning" href="<?php echo base_url('Chome/kemampuanPencaker'); ?>" title="Bootstrap 3 themes generator">Tambah Kemampuan</a>
              </p>
            </div>
          </div>
        <div class="text-right">
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </section>
      <!--main content end-->
    </section>
    <!-- container section start -->

    <!-- javascripts -->
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
    <<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
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
      </script>

  </body>

  </html>
