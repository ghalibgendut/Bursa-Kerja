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

   <title>Registrasi Pencari Kerja</title>

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
       <a href="<?php echo base_url('Chome/index'); ?>" class="logo">Bursa Kerja <span class="lite">Online</span></a>
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
             <a class="" href="index.html">
                           <i class="icon_house_alt"></i>
                           <span>Dashboard</span>
                       </a>
           </li>
           <li class="sub-menu">
             <a href="javascript:;" class="">
                           <i class="icon_document_alt"></i>
                           <span>Forms</span>
                           <span class="menu-arrow arrow_carrot-right"></span>
                       </a>
             <ul class="sub">
               <li><a class="" href="form_component.html">Form Elements</a></li>
               <li><a class="" href="form_validation.html">Form Validation</a></li>
             </ul>
           </li>
           <li class="sub-menu">
             <a href="javascript:;" class="">
                           <i class="icon_desktop"></i>
                           <span>UI Fitures</span>
                           <span class="menu-arrow arrow_carrot-right"></span>
                       </a>
             <ul class="sub">
               <li><a class="" href="general.html">Components</a></li>
               <li><a class="" href="buttons.html">Buttons</a></li>
               <li><a class="" href="grids.html">Grids</a></li>
             </ul>
           </li>
           <li>
             <a class="" href="widgets.html">
                           <i class="icon_genius"></i>
                           <span>Widgets</span>
                       </a>
           </li>
           <li>
             <a class="" href="chart-chartjs.html">
                           <i class="icon_piechart"></i>
                           <span>Charts</span>

                       </a>

           </li>

           <li class="sub-menu">
             <a href="javascript:;" class="">
                           <i class="icon_table"></i>
                           <span>Tables</span>
                           <span class="menu-arrow arrow_carrot-right"></span>
                       </a>
             <ul class="sub">
               <li><a class="" href="basic_table.html">Basic Table</a></li>
             </ul>
           </li>

           <li class="sub-menu">
             <a href="javascript:;" class="">
                           <i class="icon_documents_alt"></i>
                           <span>Pages</span>
                           <span class="menu-arrow arrow_carrot-right"></span>
                       </a>
             <ul class="sub">
               <li><a class="" href="profile.html">Profile</a></li>
               <li><a class="" href="login.html"><span>Login Page</span></a></li>
               <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
               <li><a class="" href="blank.html">Blank Page</a></li>
               <li><a class="" href="404.html">404 Error</a></li>
             </ul>
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
               <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
               <li><i class="icon_document_alt"></i>Forms</li>
               <li><i class="fa fa-file-text-o"></i>Form Registrasi Pencari Kerja</li>
             </ol>
           </div>
         </div>
         <div class="row">
           <div class="col-lg-12">
             <section class="panel">
               <header class="panel-heading">
                 Registrasi Pencari Kerja
               </header>
               <div class="panel-body">
                 <?php
                 if (validation_errors()) {
                   echo validation_errors();
                 }
                  ?>
                 <form class="form-horizontal" action="<?php echo base_url('Cpencaker/registrasi'); ?>" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Username</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="username" name="uname">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Password</label>
                     <div class="col-sm-10">
                       <input type="password" class="form-control round-input" placeholder="Password" name="pass">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">e-mail</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="e-mail" name="email">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">No Telpon</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="No Telepon" name="noTel">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">NIK</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="NIK" name="nik">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Nama Lengkap</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Nama Lengkap" name="nama">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Tempat Lahir</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Tempat Lahir" name="lahir">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Tanggal Lahir</label>
                     <div class="col-sm-2">
                       <input class="form-control" type="date" size="16" name="tglLahir">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Jenis Kelamin</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="jenisK">
                                               <option value="Laki-laki">Laki-laki</option>
                                               <option value="Perempuan">Perempuan</option>
                        </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Status Pernikahan</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="statusP">
                                               <option value="Kawin">Kawin</option>
                                               <option value="Lajang">Lajang</option>
                                               <option value="Janda">Janda</option>
                                               <option value="Duda">Duda</option>
                        </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Agama</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="agama">
                                               <option value="Islam">Islam</option>
                                               <option value="Khatolik">Khatolik</option>
                                               <option value="Protestan">Protestan</option>
                                               <option value="Hindu">Hindu</option>
                                               <option value="Budha">Budha</option>
                                               <option value="Kong Hu Cu">Kong Hu Cu</option>
                        </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Alamat</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Alamat" name="alamat">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="pendidikan_terakhir">
                                               <option value="SD">SD / Sederajat</option>
                                               <option value="SMP/Sederajat">SMP / Sederajat</option>
                                               <option value="SMA/Sederajat">SMA / Sederajat</option>
                                               <option value="D2/D3">D2 /D3</option>
                                               <option value="S1/D4">S1/D4</option>
                                               <option value="S2">S2</option>
                                               <option value="S3">S3</option>
                        </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Jurusan</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Jurusan" name="jurusan">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Foto</label>
                     <div class="col-sm-10">
                       <input type="file" placeholder="Foto" name="foto">
                     </div>
                   </div>
                   <input class="btn btn-primary btn-lg btn-block" type="submit" name="daftar" value="Registrasi"></input>
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
