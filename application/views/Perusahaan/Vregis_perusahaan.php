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
   <link href="<?php echo base_url();?>assets/css/daterangepicker.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.css" rel="stylesheet" />
   <!-- date picker -->

   <!-- color picker -->

   <!-- Custom styles -->
   <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
   <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />

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
       <a href="<?php echo base_url('Chome/index'); ?>"  class="logo">Kabupaten <span class="lite">Bandung</span>
         <img align="left" width="30" height="30" src="<?php echo base_url('uploads/logo.png'); ?>" alt=""></img>
       </a>
       <!--logo end-->

       <div class="nav search-row" id="top_menu">
         <!--  search form start -->
         <ul class="nav top-menu">

         </ul>
         <!--  search form end -->
       </div>

       <div class="top-nav notification-row">
         <!-- notificatoin dropdown start-->
         <td><a class="btn btn-primary" href="<?php echo base_url('Chome/masuk'); ?>" title="Bootstrap 3 themes generator">Login</a></td>
         <!-- Button Login Stop -->
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
         <div class="row">
           <div class="col-lg-12">
             <h3 class="page-header"><i class="fa fa-file-text-o"></i> Form elements</h3>
             <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="<?php echo base_url('Chome/index'); ?>">Home</a></li>
               <li><i class="icon_document_alt"></i>Forms</li>
               <li><i class="fa fa-file-text-o"></i>Form Registrasi Perusahaan</li>
             </ol>
           </div>
         </div>
         <div class="row">
           <div class="col-lg-12">
             <section class="panel">
               <header class="panel-heading">
                 Registrasi Perusahaan
               </header>
               <div class="panel-body">
                 <?php
                 if (validation_errors()) {
                   echo validation_errors();
                 }
                  ?>
                 <form class="form-horizontal" action="<?php echo base_url('Cperusahaan/registrasi'); ?>" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Username</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="username" name="username" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Password</label>
                     <div class="col-sm-10">
                       <input type="password" class="form-control round-input" placeholder="Password" name="pass" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">e-mail</label>
                     <div class="col-sm-10">
                       <input type="email" class="form-control round-input" placeholder="e-mail" name="email" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">No Siup</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="No Siup" name="no_siup" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Nama Perusahaan</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Nama Perusahaan" name="nama_perusahaan" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Alamat</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Alamat" name="alamat" required>
                     </div>
                   </div>
                   <p align="left">
                     <input class="btn btn-primary" type="submit" name="daftar" value="Registrasi"></input>
                     <input class="btn btn-danger" type="reset" name="Reset" value="Reset"></input>
                   </p>
                 </form>
               </div>
             </section>

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
   <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
   <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
   <!-- nice scroll -->
   <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>

   <!-- jquery ui -->
   <script src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

   <!--custom checkbox & radio-->
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/ga.js"></script>
   <!--custom switch-->
   <script src="<?php echo base_url();?>assets/js/bootstrap-switch.js"></script>
   <!--custom tagsinput-->
   <script src="<?php echo base_url();?>assets/js/jquery.tagsinput.js"></script>

   <!-- colorpicker -->

   <!-- bootstrap-wysiwyg -->
   <script src="<?php echo base_url();?>assets/js/jquery.hotkeys.js"></script>
   <script src="<?php echo base_url();?>assets/js/bootstrap-wysiwyg.js"></script>
   <script src="<?php echo base_url();?>assets/js/bootstrap-wysiwyg-custom.js"></script>
   <script src="<?php echo base_url();?>assets/js/moment.js"></script>
   <script src="<?php echo base_url();?>assets/js/bootstrap-colorpicker.js"></script>
   <script src="<?php echo base_url();?>assets/js/daterangepicker.js"></script>
   <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
   <!-- ck editor -->
   <script type="text/javascript" src="<?php echo base_url();?>assets//ckeditor/ckeditor.js"></script>
   <!-- custom form component script for this page-->
   <script src="<?php echo base_url();?>assets/js/form-component.js"></script>
   <!-- custome script for all page -->
   <script src="<?php echo base_url();?>assets/js/scripts.js"></script>


 </body>

 </html>
