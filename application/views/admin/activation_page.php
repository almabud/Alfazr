<?php $this->load->view('admin/components/page_head'); ?>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" action="re_send_email" method="post">
                <div class="row">
                    <div class="input-field col s12 center">
                        <h4>Register</h4>
                        <p class="center">Join to our community now !</p>
                    </div>
                </div>
                <div class="row margin">
                    <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('not_active_error')); ?></p>
                    <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('already_active_error')); ?></p>
                    <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('active_error')); ?></p>
                    <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('registered_error')); ?></p>
                    <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('error')); ?></p>
                    <p class="col s12 center-align green-text text-accent-4"><?php print_r($this->session->flashdata('success')); ?></p>
                </div>
                <div class="row margin">
                 <?php  if((($this->session->flashdata('success'))==NULL && ($this->session->flashdata('already_active_error'))==NULL) || ($this->session->flashdata('not_active_error'))!=NULL ){ ?>
                   <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">email</i>
                        <input id="email" type="email" name="email">
                        <label for="email" class="center-align">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" class="btn waves-effect waves-light col s12" value="Re-send email">
                    </div>
                 </div>
                 <?php } ?>
                 <div class="row">
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Already have an account? <a href="<?php echo site_url('admin/user/login') ?>">Login</a></p>
                        <p class="margin center medium-small sign-up">Don't have an account? <a href="<?php echo site_url('admin/user/register') ?>">Register</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $this->load->view('admin/components/page_tail'); ?>
