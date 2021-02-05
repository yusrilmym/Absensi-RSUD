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
  <style>
    .marker-icon {
        background-position: center;
        background-size: 22px 22px;
        border-radius: 50%;
        height: 22px;
        left: 4px;
        position: absolute;
        text-align: center;
        top: 3px;
        transform: rotate(90deg);
        width: 22px;
    }
    .marker {
        height: 30px;
        width: 30px;
    }
    .marker-content {
        background: #c30b82;
        border-radius: 50% 50% 50% 0;
        height: 30px;
        left: 50%;
        margin: -15px 0 0 -15px;
        position: absolute;
        top: 50%;
        transform: rotate(-45deg);
        width: 30px;
    }
    .marker-content::before {
        background: #ffffff;
        border-radius: 50%;
        content: "";
        height: 24px;
        margin: 3px 0 0 3px;
        position: absolute;
        width: 24px;
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
      <h1><?php echo "Detail " . $this->session->userdata('sub_title'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
				<div id="leftPanel" class="col-md-4">
					<form method="POST" action="<?php echo site_url('panel/absensi/proses_edit'); ?>">
            <input type="hidden" name="id_absensi" value="<?php echo $absensi->id_absensi; ?>">
            <input type="hidden" id="defaultLat" value="<?php echo $penempatan->latitude; ?>">
            <input type="hidden" id="defaultLng" value="<?php echo $penempatan->longitude; ?>">

            <input type="hidden" id="currentLat" value="<?php echo $absensi->latitude; ?>">
            <input type="hidden" id="currentLng" value="<?php echo $absensi->longitude; ?>">
            <div class="form-group">
              <label>Pegawai</label>
              <p><?php echo $absensi->nip; ?></p>
            </div>
            <div class="form-group">
              <label>Status</label>
              <p><?php echo $absensi->status_absensi . " (" . ($absensi->status_absensi == 'Masuk' ? date('h:i A', strtotime($penempatan->jam_masuk)) : date('h:i A', strtotime($penempatan->jam_pulang))) . ")"; ?></p>
            </div>
            
            <div class="form-group">
              <label>Waktu</label>
              <p><?php echo date('h:i A', strtotime($absensi->waktu_absensi)); ?></p>
            </div>
            <div class="form-group">
              <label>IP Address</label>
              <p><?php echo $absensi->ip_address; ?></p>
            </div>

            <div class="form-group">
              <label>Validasi</label>
              <select name="validasi_absensi" class="form-control" required>
                <option value="Belum Divalidasi" selected="selected">Belum Divalidasi</option>
                <option value="Valid" <?php echo ($absensi->validasi_absensi == 'Valid' ? 'selected="selected"' : ''); ?>>Valid</option>
                <option value="Tidak Valid" <?php echo ($absensi->validasi_absensi == 'Tidak Valid' ? 'selected="selected"' : ''); ?>>Tidak Valid</option>
              </select>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-success">Simpan</button>
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
  var heightLeftPanel = $('#leftPanel').height();

  $('#rightPanel').css({
    'min-height': heightLeftPanel
  })

  setTimeout(function() {
    var defaultLat = $('#defaultLat').val();
    var defaultLng = $('#defaultLng').val();
    var currentLat = $('#currentLat').val();
    var currentLng = $('#currentLng').val();

    // Define your product name and version.
    // tt.setProductInfo('<your-product-name>', '<your-product-version>');
    var map = tt.map({
        key: 'dSDJwGBB0sLOHX2uziCJQScSDLJCbgEQ',
        container: 'map',
        style: 'tomtom://raster/1/basic-main',
        dragPan: !isMobileOrTablet(),
        center: [defaultLng, defaultLat],
        zoom: 14
    });
    map.addControl(new tt.FullscreenControl());
    map.addControl(new tt.NavigationControl());

    function createMarker(icon, position, color, popupText) {
        var markerElement = document.createElement('div');
        markerElement.className = 'marker';

        var markerContentElement = document.createElement('div');
        markerContentElement.className = 'marker-content';
        markerContentElement.style.backgroundColor = color;
        markerElement.appendChild(markerContentElement);

        var iconElement = document.createElement('div');
        iconElement.className = 'marker-icon';
        iconElement.style.backgroundImage =
            'url(https://api.tomtom.com/maps-sdk-for-web/5.x/assets/images/' + icon + ')';
        markerContentElement.appendChild(iconElement);

        var popup = new tt.Popup({offset: 30}).setText(popupText);
        // add marker to map
        new tt.Marker({element: markerElement, anchor: 'bottom'})
            .setLngLat(position)
            .setPopup(popup)
            .addTo(map);
    }

    createMarker('', [defaultLng, defaultLat], '#222222', 'PNG icon');
    createMarker('', [currentLng, currentLat], '#e84c3d', 'PNG icon');
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