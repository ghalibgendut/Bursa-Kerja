<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo.png'); ?>">

  <title>
    Bursa Kerja Online Kab.Bandung
  </title>

  <!-- Bootstrap CSS -->
  <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url()?>assets/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=base_url()?>assets/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

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
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="<?php echo base_url('Cpencaker/index'); ?>"  class="logo">Kabupaten <span class="lite">Bandung</span>
        <img align="left" width="30" height="30" src="<?php echo base_url('uploads/logo.png'); ?>" alt=""></img>
      </a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

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

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url('Cpencaker/index'); ?>">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table id="table_id" class="display">
                  <thead>
                      <tr>
                        <th>No Siup</th>
                        <th>Nama Lowongan</th>
                        <th>Tanggal Publis</th>
                        <th>Tanggal Penutupan</th>
                        <th>Nama Perusahaan</th>
                        <th>Gaji</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lowong as $key): ?>
                      <tr>
                        <td><?=$key->no_siup?></td>
                        <td><?=$key->nama_lowongan?></td>
                        <td><?=$key->tanggal_pendaftaran?></td>
                        <td><?=$key->batas_waktu?></td>
                        <td><?=$key->nama_perusahaan?></td>
                        <td><?=$key->gaji?></td>
                        <td><?=$key->jabatan?></td>
                        <td><?=$key->status?></td>
                        <td><a class="btn btn-success" href="<?php echo base_url ('Chome/melamar/'.$key->id_lowongan); ?>">Lamar Lowongan</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
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
  <!-- container section end -->
  <!-- javascripts -->
  <script src="<?=base_url()?>assets/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="<?=base_url()?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="<?=base_url()?>assets/js/scripts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
  </script>


</body>

</html>
