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

  <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.49.1/maps/maps.css'>
  <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>tomtom/assets/ui-library/index.css'/>
  
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
      <h1><?php echo "Tambah " . $this->session->userdata('sub_title'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
				<div id="leftPanel" class="col-md-4">
					<form method="POST" action="<?php echo site_url('panel/penempatan/proses_tambah'); ?>">
            <div class="form-group">
              <label>Pegawai</label>
              <select name="nip" class="form-control" required>
                <option value="" selected="">-- Pilih pegawai</option>
                <?php foreach($semua_pegawai as $pegawai) { ?>
                <option value="<?php echo $pegawai->nip; ?>"><?php echo $pegawai->nip; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" name="lokasi" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label>Jam Masuk</label>
              <input type="time" name="jam_masuk" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jam Pulang</label>
              <input type="time" name="jam_pulang" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Latitude</label>
              <input id="lat" type="text" name="latitude" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label>Longitude</label>
              <input id="long" type="text" name="longitude" class="form-control" readonly>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </form>
				</div>

        <div id="rightPanel" class="col-md-8">
          <div id='map' class='map'></div>
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

<script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>

<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.49.1/maps/maps-web.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>tomtom/assets/js/mobile-or-tablet.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>tomtom/assets/js/formatters.js'></script>

<script>
  // if(navigator.geolocation) {
  //   navigator.geolocation.getCurrentPosition(function(position) {
  //     var lat = position.coords.latitude;
  //     var lng = position.coords.longitude;

  //     alert(lat + "," + lng);
  //   });
  // }

 var heightLeftPanel = $('#leftPanel').height();

  $('#rightPanel').css({
    'min-height': heightLeftPanel
  })

  setTimeout(function() {
    var defaultLat = "-6.474083";
    var defaultLng = "106.831025";

    $('#lat').val(defaultLat);
    $('#long').val(defaultLng);

    var roundLatLng = Formatters.roundLatLng;
    var center = [defaultLng, defaultLat];
    
    var map = tt.map({
        key: 'dSDJwGBB0sLOHX2uziCJQScSDLJCbgEQ',
        container: 'map',
        style: 'tomtom://raster/1/basic-main',
        dragPan: !isMobileOrTablet(),
        center: center,
        zoom: 14
    });
    map.addControl(new tt.FullscreenControl());
    map.addControl(new tt.NavigationControl());

    var marker = new tt.Marker({
        draggable: true
    }).setLngLat(center).addTo(map);

    function onDragEnd() {
        var lngLat = marker.getLngLat();

        $('#lat').val(roundLatLng(lngLat.lat));
        $('#long').val(roundLatLng(lngLat.lng));
    }

    marker.on('dragend', onDragEnd);
  }, 300)
</script>

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