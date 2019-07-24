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

   <title>Beranda Pencari Kerja</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
   <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">
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
   <script>
    var baseurl = "<?php echo base_url("Cpencaker/index"); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
    </script>
    <script src="<?php echo base_url("js/jquery.min.js"); ?>"></script> <!-- Load library jquery -->
    <script src="<?php echo base_url("js/config.js"); ?>"></script> <!-- Load file process.js -->
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
       <a href="<?php echo base_url('Cpencaker/index'); ?>" class="logo">Kabupaten <span class="lite">Bandung</span></a>
       <!--logo end-->

       <div class="nav search-row" id="top_menu">
         <!--  search form start -->
         <ul class="nav top-menu">
           <li>
             <form class="navbar-form" action="<?php echo base_url('Cpencaker/index'); ?>" method="get">
               <input class="form-control" placeholder="Cari Lowongan Pekerjaan" type="search" name="query">
             </form>
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
                             <span class="badge bg-important">7</span>
                         </a>
             <ul class="dropdown-menu extended notification">
               <div class="notify-arrow notify-arrow-blue"></div>
               <li>
                 <p class="blue">You have 4 new notifications</p>
               </li>
               <li>
                 <a href="#">
                                     <span class="label label-primary"><i class="icon_profile"></i></span>
                                     Friend Request
                                     <span class="small italic pull-right">5 mins</span>
                                 </a>
               </li>
               <li>
                 <a href="#">
                                     <span class="label label-warning"><i class="icon_pin"></i></span>
                                     John location.
                                     <span class="small italic pull-right">50 mins</span>
                                 </a>
               </li>
               <li>
                 <a href="#">
                                     <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                     Project 3 Completed.
                                     <span class="small italic pull-right">1 hr</span>
                                 </a>
               </li>
               <li>
                 <a href="#">
                                     <span class="label label-success"><i class="icon_like"></i></span>
                                     Mick appreciated your work.
                                     <span class="small italic pull-right"> Today</span>
                                 </a>
               </li>
               <li>
                 <a href="#">See all notifications</a>
               </li>
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
                 <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
               </li>
               <li>
                 <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
               </li>
               <li>
                 <a href="#"><i class="icon_chat_alt"></i> Chats</a>
               </li>
               <li>
                 <a href="<?php echo base_url('Chome/logout'); ?>"><i class="icon_key_alt"></i> Log Out</a>
               </li>
               <li>
                 <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
               </li>
               <li>
                 <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
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
             <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
             <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
               <li><i class="fa fa-laptop"></i>Dashboard</li>
             </ol>
           </div>
           <div>
              <table class="table table-striped" id="mydata">
                <thead>
                  <th>No Siup</th>
                  <th>Nama Lowongan</th>
                  <th>Tanggal Publis</th>
                  <th>Tanggal Penutupan</th>
                  <th>Status</th>
                 </thead>
                 <tbody id="show_data">
                   <tr>
                     <?php foreach ($lowongan as $key) {?>
                       <td><?php echo $key->no_siup;?></td>
                       <td><?php echo $key->nama_lowongan;?></td>
                       <td><?php echo $key->tanggal_pendaftaran;?></td>
                       <td><?php echo $key->batas_waktu;?></td>
                       <td><?php echo $key->status;?></td>
                       <td><a class="btn btn-success" href="<?php echo base_url ('Chome/melamar/'.$key->id_lowongan); ?>">Lamar Lowongan</a></td>
                   </tr>
                   <?php } ?>
                  </tbody>
                 </table>
                 <?php echo $pagination; ?>
                  <!-- <table class="table">
                    <tbody>
                      <?php foreach ($data as $row): ?>
                     <h1><?= $row->nama_lowongan;?></h1>
                     <p><?= $proyekii=$row->no_siup;?></p>
                     <p><?= $proyekii=$row->tgl_publis;?></p>
                     <p><?= $proyekii=$row->tgl_berlaku;?></p>
                     <p><?= $proyekii=$row->pendidikan;?></p>
                     <p><?= $proyekii=$row->kriteria;?></p>
                     <p><?= $proyekii=$row->deskripsi?></p>
                     <p><?= $proyekii=$row->status;?></p>
                     <a href="<?= base_url();?>">http://localhost/disnaker/Cperusahaan/depan<?=$row->nama_lowongan;?> read more</a>
                   <?php endforeach;?>
                    </tbody>
                  </table> -->

               </div>
           <!-- <div>
              <table class="table">
                <thead>
                  <tr>
                    <th>No Lowongan</th>
                    <th>No Siup</th>
                    <th>Nama Lowongan</th>
                    <th>Tanggal Publis</th>
                    <th>Tanggal Penutupan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lowongan as $key) { ?>
                  <tr>
                      <td><?php echo $key->id_lowongan;?></td>
                      <td><?php echo $key->no_siup;?></td>
                      <td><?php echo $key->nama_lowongan;?></td>
                      <td><?php echo $key->tgl_publis;?></td>
                      <td><?php echo $key->tgl_berlaku;?></td>
                      <td><?php echo $key->status;?></td>
                      <td><a class="btn btn-success" href="#" title="Bootstrap 3 themes generator">Lamar Lowongan</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>

           </div> -->
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
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
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
     <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
     <script src="<?php echo base_url("js/jquery-1.8.3.min.js"); ?>"></script> <!-- Load library jquery -->
     <script src="<?php echo base_url("js/config.js"); ?>"></script> <!-- Load file process.js -->
     <script>
     $(document).ready(function(){
             tampil_data_lowongan();   //pemanggilan fungsi tampil lowongan.

             $('#mydata').dataTable();

             //fungsi tampil barang
             function tampil_data_lowongan(){
                 $.ajax({
                     type  : 'ajax',
                     url   : '<?php echo base_url()?>Cpencaker/index',
                     async : false,
                     dataType : 'json',
                     success : function(data){
                         var html = '';
                         var i;
                         for(i=0; i<data.length; i++){
                             html += '<tr>'+
                                     '<td>'+data[i].no_siup+'</td>'+
                                     '<td>'+data[i].nama_lowongan+'</td>'+
                                     '<td>'+data[i].nama_perusahaan+'</td>'+
                                     '<td>'+data[i].jabatan+'</td>'+
                                     '<td>'+data[i].gaji+'</td>'+
                                     // '<td style="text-align:right;">'+
                                     //     '<a href="javascript:;" class="btn btn-success" data="'+data[i].no_siup+'">Edit</a>'+' '+
                                     //     '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].barang_kode+'">Hapus</a>'+
                                     // '</td>'+
                                     '</tr>';
                         }
                         $('#show_data').html(html);
                     }

                 });
             }
           });
     </script>

 </body>

 </html>
 <script>
</script>
