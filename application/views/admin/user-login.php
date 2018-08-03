<?php $this->load->view('admin/components/page_head'); ?>
<body class="cyan">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form action="login" class="login-form" method="post">
           <div class="row">
                <div class="input-field col s12 center">
                  <img src="<?php echo site_url('images/logo/login-logo.png'); ?>" alt="" class="circle responsive-img valign profile-image-login">
                  <p class="center login-form-text">Material Design Admin Template</p>
                </div>
          </div>
            <div class="row margin">
                <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('error')); ?></p>
                <div class="input-field col s12">
                <i class="material-icons prefix pt-5">person_outline</i>
              <input id="email" type="text" name="email" required="1">
              <label for="email" class="center-align">Username</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">lock_outline</i>
              <input id="password" type="password" name="password" required="1">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12 ml-2 mt-3">
              <input type="checkbox" id="remember-me" name="remember-me" />
              <label for="remember-me">Remember me</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
                <input type="submit" class="btn waves-effect waves-light col s12" value="Login">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
            </div>
            <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
            </div>
          </div>
        </form>
    </div>
<?php $this->load->view('admin/components/page_tail'); ?>