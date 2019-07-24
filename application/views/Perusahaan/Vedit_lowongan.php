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
  <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url()?>assets/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=base_url()?>assets/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/daterangepicker.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

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
      <a href="<?php echo base_url('Cperusahaan/Lamaran'); ?>"  class="logo">Kabupaten <span class="lite">Bandung</span>
        <img align="left" width="30" height="30" src="<?php echo base_url('uploads/logo.png'); ?>" alt=""></img>
      </a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <!-- <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul> -->
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
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
                <p  class="blue">You have <?php echo $jumlah; ?> new notifications</p>
              </li>
              <?php
               foreach ($notif as $k) {
                 ?>

                <li>
                  <a href="<?php echo base_url('Cperusahaan/get_nik/'.$k->id_lowongan); ?>">
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
                <a href="<?php echo base_url('Cperusahaan/Profil'); ?>"><i class="icon_profile"></i> My Profile</a>
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
            <a class="" href="<?php echo base_url('Cperusahaan/lihat_lowongan'); ?>">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="<?php echo base_url('Cperusahaan/index'); ?>">
                          <i class="icon_document_alt"></i>
                          <span>Buka Lowongan</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="<?php echo base_url('Cperusahaan/Lamaran'); ?>">
                          <i class="icon_document_alt"></i>
                          <span>Lihat Lamaran</span>
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
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Lowongan </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url('Cperusahaan/index'); ?>">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-file-text-o"></i>Form elements</li>
            </ol>
          </div>
        </div>
        <!-- Basic Forms & Horizontal Forms-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form Input Lowongan
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?=base_url('Cperusahaan/update_lowongan/'.$datalowongan->id_lowongan)?>" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">No Siup <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="No_Siup" minlength="5" type="text" value="<?php echo $datalowongan->no_siup; ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Nama Perusahaan <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="Nama_Perusahaan" minlength="5" type="text" value="<?php echo $datalowongan->nama_perusahaan; ?>" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Nama Lowongan <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cname" type="text" value="<?= $datalowongan->nama_lowongan ?>" name="Nama_lowongan" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Jabatan</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cname" type="text" value="<?php echo $datalowongan->jabatan; ?>"  name="Jabatan" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Jenis Kelamin <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="Jenis_Kelamin">
                                <option>Pria</option>
                                <option>Wanita</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Pengalaman</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cname" type="text" value="<?php echo $datalowongan->pengalaman; ?>" name="Pengalaman" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2">Pendidikan </label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="Pendidikan">
                          <option value=""disabled diselected>--Pilih Pendidikan--</option>
                          <?php foreach ($listPendidikan as $k) { ?>
                                 <option value="<?php echo $k->level.'-'.$k->nama_pendidikan; ?>"><?php echo "$k->nama_pendidikan" ; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2">Pengupahan</label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="Pengupahan">
                                <option>Bulanan</option>
                                <option>Mingguan</option>
                                <option>Harian</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2">Gaji </label>
                      <div class="col-lg-10">
                        <input class="form-control uang" id="ccomment" value="<?php echo $datalowongan->gaji; ?>" name="Gaji" ></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2"><b>Tanggal Pendaftaran</b></label>
                      <div class="col-lg-10">
                        <div class="input-prepend">
                          <input id="reservation" class=" form-control" value="<?php echo $datalowongan->tanggal_pendaftaran; ?>"name="tgl_pendaftaran" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2">Tipe Ikatan Kerja</label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="Tipe_Ikatan_Kerja">
                                <option>Pegawai Tetap</option>
                                <option>Pegawai Kontrak</option>
                                <option>Magang</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2"><b>Deskripsi</b></label>
                      <div class="col-lg-10">
                        <div class="input-prepend">
                          <textarea id="reservation" class=" form-control" name="deskripsi"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">simpan</button>
                        <button class="btn btn-default" type="reset">Reset</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
        <!-- Inline form-->

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
          Designed by <a href="https://bootstrapmade.com/"></a>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="<?=base_url()?>assets/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="<?=base_url()?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="<?=base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="<?=base_url()?>assets/js/ga.js"></script>
  <!--custom switch-->
  <script src="<?=base_url()?>assets/js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="<?=base_url()?>assets/js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="<?=base_url()?>assets/js/jquery.hotkeys.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-wysiwyg.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-wysiwyg-custom.js"></script>
  <script src="<?=base_url()?>assets/js/moment.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-colorpicker.js"></script>
  <script src="<?=base_url()?>assets/js/daterangepicker.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.mask.min.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="<?=base_url()?>assets/js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="<?=base_url()?>assets/js/scripts.js"></script>
  <script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
  </script>

</body>

</html>
