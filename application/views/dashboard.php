<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard Absen</title>
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />
	<link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.49.1/maps/maps.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tomtom/assets/ui-library/index.css"/>
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
<body>
	<input type="hidden" id="defaultLat" value="<?php echo $penempatan->latitude; ?>">
    <input type="hidden" id="defaultLng" value="<?php echo $penempatan->longitude; ?>">
    <input type="hidden" id="currentLat" class="currentLat" value="">
    <input type="hidden" id="currentLng" class="currentLng" value="">

    <div id="modal-location" class="uk-modal-full" uk-modal>
	    <div class="uk-modal-dialog">
	        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
	        <div id="wrapperMap">
	        	<div id="map" class="map"></div>
	        </div>
	    </div>
	</div>

	<section class="uk-section uk-section-large uk-section-muted" uk-height-viewport>
		<div class="uk-container">
			<div class="uk-flex uk-flex-center" uk-grid>
				<div class="uk-width-2-5@m">
					<div class="uk-card uk-card-default">
						<div class="uk-card-body">
							<div class="uk-card-badge uk-label uk-light">
								<a href="<?php echo site_url('login/proses_logout'); ?>" class="uk-text-capitalize">Logout</a>
							</div>
						    <h5><?php echo "NIP: " . $this->session->userdata('nip_client'); ?></h5>
						    <p class="uk-margin-medium-bottom uk-text-small">Sebelum melakukan absensi, pastikan terlebih dahulu lokasi dan waktu sudah sesuai.</p>
						    <div uk-grid>
								<div class="uk-width-1-2@m uk-text-center">
									<p class="uk-text-small uk-text-muted uk-margin-small-bottom">Pukul 08:00 AM</p>
									<?php if($masuk == null) { ?>
									<form action="<?php echo site_url('dashboard/absen_masuk'); ?>" method="POST">
										<input type="hidden" name="latitude" class="currentLat" value="">
   	 									<input type="hidden" name="longitude" class="currentLng" value="">
   	 									<input type="hidden" name="ip_address" class="currentIp" value="127.0.0.1">
										<button type="submit" class="uk-button uk-button-small uk-text-capitalize uk-border-pill uk-button-primary">Masuk</button>
									</form>
									<?php } else { ?>
									<button class="uk-button uk-button-small uk-text-capitalize uk-border-pill uk-button-default uk-disabled"><?php echo date('h:i A', strtotime($masuk->waktu_absensi)); ?></button>
									<?php } ?>
								</div>
								<div class="uk-width-1-2@m uk-text-center">
									<p class="uk-text-small uk-text-muted uk-margin-small-bottom">Pukul 05:00 PM</p>
									<?php if($pulang == null) { ?>
									<form action="<?php echo site_url('dashboard/absen_pulang'); ?>" method="POST">
										<input type="hidden" name="latitude" class="currentLat" value="">
   	 									<input type="hidden" name="longitude" class="currentLng" value="">
   	 									<input type="hidden" name="ip_address" class="currentIp" value="127.0.0.1">
										<button type="submit" class="uk-button uk-button-small uk-text-capitalize uk-border-pill uk-button-secondary">Pulang</button>
									</form>
									<?php } else { ?>
									<button class="uk-button uk-button-small uk-text-capitalize uk-border-pill uk-button-default uk-disabled"><?php echo date('h:i A', strtotime($pulang->waktu_absensi)); ?></button>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="uk-card-footer">
					        <a id="toggleModal" href="#" class="uk-button uk-button-text uk-text-small">Cek Lokasi</a>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>
	<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.49.1/maps/maps-web.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>tomtom/assets/js/mobile-or-tablet.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>tomtom/assets/js/formatters.js'></script>

	<script>
		$(document).ready(function() {
			var options = {
            	enableHighAccuracy: true,
              	timeout: 5000,
              	maximumAge: 60000
            };
            
            function success(pos) {
              	var crd = pos.coords;
            
              	$('.currentLat').val(crd.latitude);
              	$('.currentLng').val(crd.longitude);
            }
            
            function error(err) {
              console.warn(`ERROR(${err.code}): ${err.message}`);
            }
            
            navigator.geolocation.getCurrentPosition(success, error, options);

			$('#toggleModal').on('click', (function(e) {
				e.preventDefault();

				UIkit.modal('#modal-location').show();

				var winHeight = $(window).height();

			  	$('#wrapperMap').css({
			    	'min-height': winHeight
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
			}))
		})
	</script>

	<script>
        function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
            //compatibility for firefox and chrome
            var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
            var pc = new myPeerConnection({
                iceServers: []
            }),
            noop = function() {},
            localIPs = {},
            ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
            key;
        
            function iterateIP(ip) {
                if (!localIPs[ip]) onNewIP(ip);
                localIPs[ip] = true;
            }
        
             //create a bogus data channel
            pc.createDataChannel("");
        
            // create offer and set local description
            pc.createOffer().then(function(sdp) {
                sdp.sdp.split('\n').forEach(function(line) {
                    if (line.indexOf('candidate') < 0) return;
                    line.match(ipRegex).forEach(iterateIP);
                });
                
                pc.setLocalDescription(sdp, noop, noop);
            }).catch(function(reason) {
                // An error occurred, so handle the failure to connect
            });
        
            //listen for candidate events
            pc.onicecandidate = function(ice) {
                if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
                ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
            };
        }
        
        // Usage
        
        getUserIP(function(ip){
            $('.currentIp').val(ip);
        });
    </script>
</body>
</html>