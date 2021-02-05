<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Absensi</title>
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />
</head>
<body>
	<section class="uk-section uk-section-large uk-section-muted" uk-height-viewport>
		<div class="uk-container">
			<div class="uk-flex uk-flex-center" uk-grid>
				<div class="uk-width-2-5@m">
					<div class="uk-card uk-card-default uk-card-body">
					    <h3 class="uk-card-title">Login Pegawai</h3>
					    <form id="login" action="<?php echo site_url('login/proses_login'); ?>" class="uk-form-stacked">
						    <div class="uk-margin">
						        <label class="uk-form-label" for="form-stacked-text">Username</label>
						        <div class="uk-form-controls">
						            <input class="uk-input" id="username" type="text" placeholder="" required>
						        </div>
						    </div>
						    <div class="uk-margin">
						        <label class="uk-form-label" for="form-stacked-text">Password</label>
						        <div class="uk-form-controls">
						            <input class="uk-input" id="password" type="password" placeholder="" required>
						        </div>
						    </div>
							<div class="uk-margin">
								<button class="uk-button uk-button-primary" type="submit">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>
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
                        UIkit.notification({
						    message: res.message,
						    status: 'default',
						    pos: 'top-center',
						    timeout: 1000
						});

                        
                        setTimeout(function() {
                            if(res.success) {
                                document.location.href = res.url;
                            }
                        }, 1500)
                    }
                })
            }))
        })
    </script>
</body>
</html>