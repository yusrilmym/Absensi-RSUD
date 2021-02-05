<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->session->userdata('title'); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?php foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>
  <style>
    .dataTablesContainer {
      overflow-x: auto;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
          AR
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
          ABSENSI
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li>
            <a href="<?php echo site_url('panel/login/proses_logout'); ?>">
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php $this->load->view('sidebar'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $this->session->userdata('sub_title'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
				<div class="col-lg-12">
					<?php echo $output; ?>
				</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <input type="hidden" id="txtEditor" value="<?php echo (strpos($this->uri->segment(1), 'profil') !== false ? $this->uri->segment(1) : 'profil_' . $this->uri->segment(1)); ?>"> 
  <input type="hidden" id="urlEditor" value="<?php echo base_url(); ?>"> 

  <?php $this->load->view('footer.php'); ?>  
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url('assets/theme/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url('assets/theme/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/theme/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url('assets/theme/'); ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/theme/'); ?>dist/js/demo.js"></script>

<?php foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>

<script>
  var idcke = "field-" + document.getElementById('txtEditor').value;

  CKEDITOR.replace(idcke, {
    height: 300,

    // Configure your file manager integration. This example uses CKFinder 3 for PHP.
    filebrowserBrowseUrl: document.getElementById('urlEditor').value + 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: document.getElementById('urlEditor').value + 'ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: document.getElementById('urlEditor').value + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: document.getElementById('urlEditor').value + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
  });
</script>
</body>
</html>