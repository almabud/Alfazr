<?php $this->load->view('admin/components/page_head'); ?>
<!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" action="do_register" id="register_form" method="post">
            <div class="row">
            <div class="input-field col s12 center">
              <h4>Register</h4>
              <p class="center">Join to our community now !</p>
            </div>
          </div>
          <div class="row margin">
              <p class="col s12 center-align red-text text-accent-4 error_reg" id="activation_tecnical_error"></p>
              <div class="input-field col s12">
              <i class="material-icons prefix pt-5">email</i>
              <input id="email" type="email" name="email" required="1">
              <label for="email" class="center-align">Email</label>
              <div class="col s12 center-align red-text text-accent-4 error_reg" id="email_error" style="margin-top:-30px !important; margin-left: 31px !important;">
             </div>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">lock_outline</i>
              <input id="password" type="password" name="password" autocomplete="off" required="1">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">lock_outline</i>
              <input id="password-again" type="password" name="conf_password" required="1" autocomplete="off">
              <label for="password-again">Retype password</label>
              <div class="col s12 center-align red-text text-accent-4 error_reg" id="password_error" style="margin-top:-30px !important; margin-left: 31px !important;"></div>
            </div>
          </div>
          <div class="row">
              <div class="input-field col s12 style="position:relative; overflow:hidden;" >
               <button type="submit" class="btn waves-effect waves-light col s12" id="regi_button" name="register">
                <div class="spinner" id="reg_loader">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
                <span id="reg_label">Register Now</span>
              </button> 
              </div>
            <div class="input-field col s12">
              <p class="margin center medium-small sign-up">Already have an account? <a href="">Login</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
<?php $this->load->view('admin/components/page_tail'); ?>