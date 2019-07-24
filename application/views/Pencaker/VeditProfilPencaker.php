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
                 <p  class="blue">You have <?php echo $jumlah; ?> new notifications</p>
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
               Edit Profil
             </header><br>
             <?php
             if (validation_errors()) {
               echo validation_errors();
             }
             echo $this->session->flashdata('msg');
              ?>
             <form class="form-horizontal" action="<?php echo base_url('Cpencaker/editProfil'); ?>" method="post" enctype="multipart/form-data">
               <?php foreach ($pencaker as $k) { ?>
                 <div class="form-group">
                   <label class="col-sm-2 control-label">NIK</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control round-input" name="nik" value="<?php echo $k->nik; ?>" readonly>
                   </div>
                 </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Nama Lengkap</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control round-input" placeholder="Nama Lengkap" name="nama" value="<?php echo $k->namaLengkap; ?>" required>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Alamat</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control round-input" placeholder="Alamat" name="alamat" value="<?php echo $k->alamat; ?>" required>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Kecamatan</label>
                 <div class="col-sm-2">
                   <select class="form-control m-bot15" name="kecamatan" id="kecamatan" required>
                     <option value=""disabled diselected>--Pilih Kecamatan--</option>
                     <?php foreach ($listKecamatan as $key) { ?>
                            <option value="<?php echo"$key->id_kecamatan"; ?>"><?php echo "$key->nama_kecamatan" ; ?></option>
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
                 <label class="col-sm-2 control-label">No Telepon</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control round-input" placeholder="No Telepon" name="noTel" value="<?php echo $k->noTel; ?>" required>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Email</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control round-input" placeholder="Email" name="email" value="<?php echo $k->email; ?>" required>
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
               <?php } ?>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Foto</label>
                 <div class="col-sm-10">
                   <input type="file" placeholder="Foto" name="foto">
                 </div>
               </div>
               <p align="right">
                 <input class="btn btn-primary" type="submit" name="edit" value="Simpan"></input>
                 <input class="btn btn-danger" type="reset" name="Reset" value="Reset"></input>
               </p>
             </form>
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
          console.log(id)
    			$.ajax({
    				url : "<?php echo base_url('Chome/get_kelurahan');?>",
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
