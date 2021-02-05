
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="eNomORlhY4snyX4AEKLlNYDRPAEoWLLnS2qZDALT">
  
  <link rel="icon" type="image/png" href='http://sikujang.rsudcibinong.com/public/img/favicon.png'>
  <title>Login &mdash; SI G-MES</title>
  <link rel="stylesheet" href="http://sikujang.rsudcibinong.com/public/css/app.css">
</head>

<body>
    <div id="app">
        <section class="section">
        <div class="d-flex flex-wrap align-items-stretch" style="margin-top: 0 !important">
            <div class="row" >
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 order-lg-1 order-1 bg-white" style="height: auto">
                <div class="p-4 m-3">
                    <img src="http://sikujang.rsudcibinong.com/public/img/logo-rsud.png" alt="logo" width="110" class="mb-2 mt-3">
                    <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">SI G-MES</span></h4>
                    <p class="text-muted">Before you get started, you must login to continue.</p>
                    
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <form action="<?php echo base_url() ?>index.php/Login/kuis" method="post">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input aria-describedby="emailHelpBlock" id="nik" type="text" class="form-control" name="nik" placeholder="Input NIK" tabindex="1" value="" autofocus>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Started
                                </button>
                            </div>
                          </form>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="<?php echo base_url() ?>index.php/Login/kuis" method="post">
                            <div class="form-group">
                                <label for="nik">NIP</label>
                                <input aria-describedby="emailHelpBlock" id="nik" type="text" class="form-control" name="nip" placeholder="Input NIP" tabindex="1" value="" autofocus>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Started
                                </button>
                            </div>
                        </form>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <form method="POST" action="<?php echo base_url() ?>index.php/Login/auth" class="needs-validation" novalidate="">
                            <input type="hidden" name="_token" value="eNomORlhY4snyX4AEKLlNYDRPAEoWLLnS2qZDALT">
                            <div class="form-group">
                                <label for="email">Email / NIP</label>
                                <input aria-describedby="emailHelpBlock" id="nip" type="text" class="form-control" name="nip" placeholder="Input NIP atau Email" tabindex="1" value="" autofocus>
                                <div class="invalid-feedback">
                                
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                                </div>
                                <input aria-describedby="passwordHelpBlock" id="password" type="password" placeholder="Your account password" class="form-control" name="password" tabindex="2">
                                <div class="invalid-feedback">
                                
                                </div>
                            </div>

                            <div class="form-group" >
                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember">
                                <label class="custom-control-label" for="remember" style="color: black">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Started
                                </button>
                            </div>
                        </form>
                      </div>
                    </div>

                    <div class="text-center mt-3 mb-3 text-small">
                    Copyright &copy; IT - RSUD Cibinong, 2020
                    
                    </div>
                </div>
            </div>
                <div class="col-lg-8 col-md-12 col-sm-12 order-lg-2 order-2 background-walk-x position-relative overlay-gradient-bottom" data-background="http://sikujang.rsudcibinong.com/public/img/login-bg.jpg" style="height: 100vh; background-size: cover">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                        <greeting-comp></greeting-comp>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>

    <script src="http://sikujang.rsudcibinong.com/public/js/manifest.js"></script>
    <script src="http://sikujang.rsudcibinong.com/public/js/vendor.js"></script>
    <script src="http://sikujang.rsudcibinong.com/public/js/app.js"></script>
    <script>
        // $(function() {
        //     $("html").getNiceScroll().resize();
        //     $("html").niceScroll();
        // });
    </script>
</body>
</html>
<style>
  html{
      overflow-y: auto;
      overflow-x: hidden
  }
  /* body, html{
      height: 100vh !important;
  } */
</style>
