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
                 echo $this->session->flashdata('msg');
                  ?>
                 <form class="form-horizontal" action="<?php echo base_url('Cpencaker/registrasi'); ?>" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Username</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="username" name="uname" required>
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
                     <label class="col-sm-2 control-label">No Telpon</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="No Telepon" name="noTel" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">NIK</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="NIK" name="nik" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Nama Lengkap</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Nama Lengkap" name="nama" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Tempat Lahir</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Tempat Lahir" name="lahir" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Tanggal Lahir</label>
                     <div class="col-sm-2">
                       <input class="form-control" type="date" size="16" name="tglLahir" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Jenis Kelamin</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="jenisK" required>
                                               <option value="Pria">Pria</option>
                                               <option value="Wanita">Wanita</option>
                        </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Status Pernikahan</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="statusP" required>
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
                       <select class="form-control m-bot15" name="agama" required>
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
                       <input type="text" class="form-control round-input" placeholder="Alamat" name="alamat" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Kecamatan</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="kecamatan" id="kecamatan" required>
                         <option value=""disabled diselected>--Pilih Kecamatan--</option>
                         <?php foreach ($listKecamatan as $k) { ?>
                                <option value="<?php echo"$k->id_kecamatan"; ?>"><?php echo "$k->nama_kecamatan" ; ?></option>
                         <?php } ?>
                        </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Kelurahan</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="kelurahan" id="kelurahan" required>
                         <option value=""disabled diselected>--Pilih Kelurahan--</option>

                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                     <div class="col-sm-2">
                       <select class="form-control m-bot15" name="pendidikan_terakhir" required>
                         <option value=""disabled diselected>--Pilih Pendidikan--</option>
                         <?php foreach ($listPendidikan as $k) { ?>
                                <option value="<?php echo"$k->nama_pendidikan"; ?>"><?php echo "$k->nama_pendidikan" ; ?></option>
                         <?php } ?>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Jurusan</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control round-input" placeholder="Jurusan" name="jurusan">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Tanggal Lulus atau Tanggal Ijazah</label>
                     <div class="col-sm-2">
                       <input class="form-control" type="date" size="16" name="tglLulus" required>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label">Foto</label>
                     <div class="col-sm-10">
                       <input type="file" placeholder="Foto" name="foto">
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
   <script type="text/javascript">
  	$(document).ready(function(){
  		$('#kecamatan').change(function(){
  			var id=$(this).val();
  			$.ajax({
  				url : "<?php echo base_url('Cpencaker/get_kelurahan');?>",
  				method : "POST",
  				data : {id: id},
  				async : false,
  		    dataType : "JSON",
  				success: function(data){
  					var html = '';
  		            var i;
  		            for(i=0; i<data.length; i++){
  		                html += '<option value = "'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option>';
  		            }
  		            $('#kelurahan').html(html);

  				}
  			});
  		});
  	});
  </script>
 </body>

 </html>
