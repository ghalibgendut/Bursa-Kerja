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
       <a href="<?php echo base_url('Chome/index'); ?>"  class="logo">Kabupaten <span class="lite">Bandung</span>
         <img align="left" width="30" height="30" src="<?php echo base_url('uploads/logo.png'); ?>" alt=""></img>
       </a>
       <!--logo end-->

       <div class="nav search-row" id="top_menu">
         <!--  search form start -->
         <ul class="nav top-menu">
           <!-- <li>
             <form class="navbar-form" action="<?php echo base_url('Chome/index'); ?>" method="get">
               <input class="form-control" placeholder="Cari Lowongan Pekerjaan" type="search" name="query">
               <button type="submit" class="btn btn-primary" name="cari">Cari Lowongan</button>
             </form>
           </li> -->
         </ul>
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
           <!-- alert notification end-->
           <!-- user login dropdown start-->
           <!-- user login dropdown end -->
           <!-- Button login start -->
           <td><a class="btn btn-primary" href="<?php echo base_url('Chome/masuk'); ?>" title="Bootstrap 3 themes generator">Login</a></td>
           <!-- Button Login Stop -->
           <!-- Button Registrasion Start Here-->
           <td><a class="btn btn-success" href="<?php echo base_url('Cpencaker/daftar'); ?>" title="Bootstrap 3 themes generator">Registrasi Pencari Kerja</a></td>
           <td><a class="btn btn-warning" href="<?php echo base_url('Cperusahaan/registrasi') ?>" title="Bootstrap 3 themes generator">Registrasi Perusahaan</a></td>
           <!-- Button Registrasion Stop Here-->
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
             <a class="" href="<?php echo base_url('Chome/index'); ?>">
                           <i class="icon_house_alt"></i>
                           <span>Dashboard</span>
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
             <h3 class="page-header"><i class="fa fa-laptop"></i> Detail Lowongan</h3>
             <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="<?php echo base_url('Chome/index'); ?>">Home</a></li>
               <li><i class="fa fa-laptop"></i>Lowongan</li>
             </ol>
           </div>
           <div>
             <header class="panel-heading">
               Detail Lowongan
             </header><br>
             <table class="table table-striped">
               <?php echo $this->session->flashdata('msg'); ?>
               <tbody>
                 <tr>
                    <td>Nomor Siup</td>
                    <td>:</td>
                    <td><?php echo $lowongan->no_siup;?></td>
                  </tr>
                 <tr>
                    <td>Nama Perusahaan</td>
                    <td>:</td>
                    <td><?php echo $lowongan->nama_perusahaan;?></td>
                  </tr>
                  <tr>
                     <td>Nama Lowongan</td>
                     <td>:</td>
                     <td><?php echo $lowongan->nama_lowongan;?></td>
                   </tr>
                   <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td><?php echo $lowongan->jabatan;?></td>
                    </tr>
                    <tr>
                       <td>Jenis Kelamin</td>
                       <td>:</td>
                       <td><?php echo $lowongan->jenis_kelamin;?></td>
                     </tr>
                     <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td><?php echo $lowongan->pendidikan;?></td>
                      </tr>
                      <tr>
                         <td>Pengalaman</td>
                         <td>:</td>
                         <td><?php echo $lowongan->pengalaman;?></td>
                       </tr>
                       <tr>
                          <td>Pengupahan</td>
                          <td>:</td>
                          <td><?php echo $lowongan->pengupahan;?></td>
                        </tr>
                        <tr>
                           <td>Gaji</td>
                           <td>:</td>
                           <td><?php echo $lowongan->gaji;?></td>
                         </tr>
                         <tr>
                            <td>Tanggal Pendaftaran</td>
                            <td>:</td>
                            <td><?php echo $lowongan->tanggal_pendaftaran;?></td>
                          </tr>
                          <tr>
                             <td>Batas Waktu</td>
                             <td>:</td>
                             <td><?php echo $lowongan->batas_waktu;?></td>
                           </tr>
                           <tr>
                              <td>Status</td>
                              <td>:</td>
                              <td><?php echo $lowongan->status;?></td>
                            </tr>
                            <tr>
                               <td>Deskripsi</td>
                               <td>:</td>
                               <td><?php echo $lowongan->deskripsi;?></td>
                             </tr>
               </tbody>
             </table>
             <p align = "center">
               <img  width="500" height="650"  src="<?php echo base_url('uploads/'.$lowongan->posterLowongan); ?>"></img>
             </p>
           </div>
             <!-- <p align = "right">
                <a class="btn btn-success" href="<?php echo base_url('Cpencaker/melamarLowongan/'.$lowongan->id_lowongan); ?>" title="Bootstrap 3 themes generator">Lamar Sekarang</a>
             </p> -->
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
