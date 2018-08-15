<?php $this->load->view('admin/components/page_head'); ?>
<!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" action="register" method="post">
            <div class="row">
            <div class="input-field col s12 center">
              <h4>Register</h4>
              <p class="center">Join to our community now !</p>
            </div>
          </div>
          <div class="row margin">
              <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('error')); ?></p>
              <div class="input-field col s12">
              <i class="material-icons prefix pt-5">email</i>
              <input id="email" type="email" name="email">
              <label for="email" class="center-align">Email</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">lock_outline</i>
              <input id="password" type="password" name="password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">lock_outline</i>
              <input id="password-again" type="password" name="conf_password">
              <label for="password-again"></label>
            </div>
          </div>
          <div class="row">
              <div class="input-field col s12">
                  <input type="submit" class="btn waves-effect waves-light col s12" value="Register Now">
              </div>
            <div class="input-field col s12">
              <p class="margin center medium-small sign-up">Already have an account? <a href="">Login</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
<?php $this->load->view('admin/components/page_tail'); ?>