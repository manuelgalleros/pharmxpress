<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    define('BASE_URL3', '/myproject'); 
	if(isset($_SESSION['SESS_MEMBER_ID'])) {
		header("location: " . BASE_URL3 . "");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title>PharmXpress Admin Login</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href=".<?php echo base_url();?>assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href=".<?php echo base_url();?>assets/images/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme.min.css" data-skin="dark">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/custom.css">
    <script src="<?php echo base_url();?>assets/vendor/toastr/tata.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script>
      var skin = localStorage.getItem('skin') || 'dark';
      var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
      var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      // Disable unused skin immediately
      disabledSkinStylesheet.setAttribute('rel', '');
      disabledSkinStylesheet.setAttribute('disabled', true);
      // add flag class to html immediately
      if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
    </script><!-- END THEME STYLES -->
      <style>
          .recaptcha {
              display: block;
          }
          .logoheader{
              margin-bottom: 25px;
          }
      </style>
  </head>
  <body>
        <?php if ($this->session->flashdata('error')) : ?>
            <script type="text/javascript">
                tata.error("Login Failed", "<?php echo $this->session->flashdata('error'); ?>", {
                    closeButton: !1,
                    duration: 5000
                });
            </script>
        <?php endif; ?>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">
      <header id="auth-header" class="auth-header">
          <div>
              <center>
                  <img src="<?php echo base_url();?>assets/images/pharmxpress_main.png" width="270" height="80" class="logoheader">
              </center>
          </div>
      </header><!-- form -->
      <form class="auth-form" action="<?php echo base_url();?>LoginController/check_login" method="POST"> 
        <!-- .form-group -->
        <div class="form-group">
          <div class="alert alert-danger" role="alert">Notice: To access the admin dashboard, login using your username and password.</div> 
          <div class="form-label-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required> <label for="inputUser">Username</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required> <label for="inputPassword">Password</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" style="background-color: #ec935e; border: none; color: black" type="submit">Sign In</button>
        </div><!-- /.form-group -->
      </form><!-- /.auth-form -->
     
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <script src="<?php echo base_url();?>assets/vendor/popper.js/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="<?php echo base_url();?>assets/vendor/particles.js/particles.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
    </script>
    
    <script>
      /**
       * Keep in mind that your scripts may not always be executed after the theme is completely ready,
       * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
       */
      $(document).on('theme:init', () =>
      {
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('auth-header', '<?php echo base_url();?>assets/javascript/pages/particles.json');
      })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="<?php echo base_url();?>assets/javascript/theme.js"></script> <!-- END THEME JS -->
  </body>
</html>

