<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login Absensi</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
</head>
<body>
	<div id="login-success" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login Absen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="login-message"></p>
          </div>
        </div>
      </div>
    </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<?php if($this->session->flashdata('type') && $this->session->flashdata('message')) { ?>
				<div class="alert alert-<?php echo $this->session->flashdata('type'); ?> mb-4">
					<span><?php echo $this->session->flashdata('message'); ?></span>
				</div>
				<?php } ?>
				
				<form id="login" action="<?php echo site_url('panel/login/proses_login'); ?>" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Login Administrator
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username wajib diisi.">
						<input id="username" class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password wajib diisi.">
						<input id="password" class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">Login</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	<script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#login').on('submit', (function(e) {
                e.preventDefault();
                
                var url = $('#login').attr('action');
                var username = $('#username').val();
                var password = $('#password').val();
                
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: 'username=' + username + '&password=' + password,
                    dataType: 'json',
                    processData: false,
                    success: function(res) {
                        $('#login-message').html(res.message);
                        
                        $('#login-success').modal('show');
                        
                        setTimeout(function() {
                            if(res.success) {
                                document.location.href = res.url;
                            }
                        }, 1000)
                    }
                })
            }))
        })
    </script>
</body>
</html>