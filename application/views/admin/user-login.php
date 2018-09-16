<?php $this->load->view('admin/components/page_head'); ?>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form action="login" id="login" class="login-form" method="post">
           <div class="row">
                <div class="input-field col s12 center">
                  <img src="<?php echo site_url('images/logo/login-logo.png'); ?>" alt="" class="circle responsive-img valign profile-image-login">
                  <p class="center login-form-text">Material Design Admin Template</p>
                </div>
          </div>
          <div class="row" style="cursor: default !important;">
           <div class="col s12 center-align red-text text-accent-4" id="error" style=""></div>
           <div class="col s12 center-align green-text text-accent-4" id="success" style=""></div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">person_outline</i>
              <input id="email" type="email" name="email" required="1" autocomplete="off">
              <label for="email" class="center-align">User email</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5">lock_outline</i>
              <input id="password" type="password" name="password" required="1" autocomplete="off">
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
                <input type="submit" name="submit" class="btn waves-effect waves-light col s12" value="Login">
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
    <!-- activation modal -->
    <div id="resend_mail_modal" class="modal">
        <div class="modal-content center">
          <div class="content">
            <h4>Re-send Email</h4>
            <div class="divider"></div>
            <div class="row">
              <div>
                <div class="row" style="cursor: default !important;">
                  <div class="col s12 center-align red-text text-accent-4" id="resend_email_error" style="margin-top: 19px;"></div>
                </div>
                <form id="re_send_email" class="" action="re_send_email" method="post">
                    <div class="row margin" style="margin-top: -7px !important;">
                      <div class="input-field col s12">
                            <i class="material-icons prefix pt-5">email</i>
                            <input type="email" name="email" required="1">
                            <label for="email" class="center-align">Email</label>
                        </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 style="position:relative; overflow:hidden;" >
                        <button type="submit" class="btn waves-effect waves-light col s12" id="re_send_email_button" name="register">
                          <div class="spinner" id="re_send_mail_loader">
                              <div class="rect1"></div>
                              <div class="rect2"></div>
                              <div class="rect3"></div>
                              <div class="rect4"></div>
                              <div class="rect5"></div>
                              <div class="rect6"></div>
                              <div class="rect7"></div>
                              <div class="rect8"></div>
                              <div class="rect9"></div>
                              <div class="rect10"></div>
                          </div>
                          <span id="re_send_email_label" class="center">Submit</span>
                        </button> 
                      </div>
                        <!-- <div class="input-field col s12">
                            <input type="submit" class="btn waves-effect waves-light col s12" value="Submit">
                        </div> -->
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('admin/components/page_tail'); ?>
