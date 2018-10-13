<?php $this->load->view('admin/components/page_head', $this->data); ?>
    <!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <?php $this->load->view('admin/components/side_nave'); ?>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">
                <div id="profile-page" class="section">
                    <!-- profile-page-header -->
                    <div id="profile-page-header" class="card">
                        <?php
                          $cover_photo_d=base_url().'images/gallary/23.png';
                          $profile_photo_d=base_url().'images/avatar/avatar-7.png';
                                  if($cover_photo != '')
                                          $cover_photo_d=base_url().'images/user_photo/'.$cover_photo;
                                  if($profile_photo !='')
                                      $profile_photo_d=base_url().'images/user_photo/'.$profile_photo;

                        ?>
                        <div class="card-image waves-effect waves-block waves-light" >
                            <div id="dom-target" style="display: none;">
                                <?php echo htmlspecialchars($cover_photo); ?>
                            </div>
                            <img class="responsive-img activator" src="<?php echo $cover_photo_d; ?>" id="preview_cover_photo"  alt="">
                        </div>
                        <figure class="card-profile-image">
                            <div id="profile_photo_data" style="display: none;">
                                <?php echo htmlspecialchars($profile_photo); ?>
                            </div>
                            <img src="<?php echo $profile_photo_d; ?>" id="preview_profile_photo" alt="" class="circle profile_photo z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan gradient-shadow">
                        </figure>
                        <div class="card-content">
                            <div class="row pt-2">
                                <div class="col s12 m4 offset-m2">
                                    <h4 class="card-title grey-text text-darken-4"><?php echo $F_name.' '.$L_name.' <span class="medium-small grey-text">('.$role.')</span>'; ?></h4>
                                </div>
                                <div class="col s12 m1 right-align right">
                                    <a class="btn-floating activator waves-effect waves-light rec accent-2 right">
                                        <i class="material-icons">perm_identity</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <p>
                                <span class="card-title grey-text text-darken-4"><i class="material-icons cyan-text text-darken-2" style="font-size: 30px !important;">perm_identity</i><?php echo $F_name." ".$L_name; ?>
                                  <i class="material-icons right">close</i>
                                </span>
                                <span> <i class="material-icons cyan-text text-darken-2">accessibility</i> <?php echo $this->session->userdata('role'); ?></span>
                            </p>
                            <p>
                                <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> <?php echo $contact_no; ?></p>
                            <p>
                                <i class="material-icons cyan-text text-darken-2">email</i> <?php echo $this->session->userdata('email'); ?></p>
                            <p>
                                <i class="material-icons cyan-text text-darken-2">cake</i> <?php  echo $d_birth; ?></p>
                            <p>
                        </div>
                    </div>
                    <!--/ profile-page-header -->
                    <!-- profile-page-content -->
                    <div id="profile-page-content" class="row">
                        <!-- profile-page-wall -->
                        <div id="profile-page-sidebar" class="col s12">
                            <!-- profile-page-wall-share -->
                            <div id="profile-page-wall-share" class="row">
                                <div class="col s12">
                                    <ul class="tabs tab-profile tabs-fixed-width z-depth-1 deep-orange accent-2">
                                        <li class="tab col s3">
                                            <a class="white-text waves-effect waves-light" id="edit_profile">
                                                <i class="material-icons">border_color</i> Edit Profile</a>
                                        </li>
                                        <li class="tab col s3">
                                            <a class="white-text waves-effect waves-light" id="add_photos_btn" href="">
                                                <i class="material-icons">border_color</i> Add Photos</a>
                                        </li>
                                    </ul>
                                        <!--Edit profile-->
                                    <div id="add_photos" class="row hide">
                                        <div class="col s12">
                                            <div class="card">
                                                <div class="card-profile-title">
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <p class="grey-text text-darken-4 margin">Upload Cover Photo</p>
                                                            <p class="divider"></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <form action="<?php echo site_url('user/profile/update/photo').'/'.$this->session->userdata('id'); ?>" method="post" enctype="multipart/form-data">
                                                                <div class="row margin">
                                                                    <div id="file-upload" class="section">
                                                                        <div class="row section">
                                                                            <div class="col s12">
                                                                                <input type="file" name="cover_photo" id="input_cover_photo" class="dropify" data-max-file-size="2M" data-height="100" data-default-file="" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <p class="grey-text text-darken-4 margin">Upload Profile Photo</p>
                                                                        <P class="divider"></P>
                                                                    </div>
                                                                </div>
                                                                <div class="row margin">
                                                                    <div id="file-upload" class="section">
                                                                        <div class="row section">
                                                                            <div class="col s12">
                                                                                <input type="file" name="profile_photo" id="input_profile_photo" class="dropify" data-max-file-size="2M" data-height="100" data-default-file="" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="submit" id="add_photos">Upload
                                                                            <i class="material-icons right">send</i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ profile-page-wall-share -->
                            <!-- profile-page-wall-posts -->
                            <div id="profile-page-wall-posts" class="row">
                                <div class="col s12">
                                    <!-- medium -->
                                    <div id="profile-page-wall-post" class="card">
                                        <div class="card-profile-title">
                                            <div class="row">
                                                <div class="col s12">
                                                    <p class="grey-text text-darken-4 margin">Basic Info</p>
                                                    <p class="divider"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <form action="profile/update/<?php echo $this->session->userdata('id'); ?>" class="" method="post">
                                                        <div class="row margin">
                                                            <div class="input-field col s12">
                                                                <input id="f_name" type="text" name="f_name" value="<?php echo $F_name; ?>" readonly>
                                                                <label for="f_name" class="center-align">First Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="row margin">
                                                            <div class="input-field col s12">
                                                                <input id="l_name" type="text" name="l_name" value="<?php echo $L_name; ?>" readonly>
                                                                <label for="l_name" class="center-align">Last Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="row margin">
                                                            <div class="input-field col s12">
                                                                <input id="email" type="text" name="email" value="<?php echo $this->session->userdata('email'); ?> " readonly>
                                                                <label for="email" class="center-align">Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="row margin">
                                                            <div class="input-field col s12">
                                                                <input id="contact_no" type="text" name="contact_no" value="<?php echo $contact_no; ?>" readonly>
                                                                <label for="contact_no" class="center-align">Contact No</label>
                                                            </div>
                                                        </div>
                                                         <div class="row margin">
                                                            <div class="input-field col s12">
                                                                <input type="text" name="d_birth" class="d_of_birth black-text text-black" value="<?php echo  $d_birth; ?>" style="border-style:solid !important; border-width: 0px 0px 1px 0px; !important;" readonly>
                                                                <label for="d_birth" class="center-align">Date of birth</label>
                                                            </div>
                                                        </div>
                                                        <div class="row margin">
                                                            <div class="input-field col s12 margin">
                                                                <select name='gender'>
                                                                <?php 
                                                                    if($gender !='')
                                                                    {
                                                                ?>
                                                                <option value="" disabled selected><?php echo $gender; ?></option>
                                                                    <?php }
                                                                    else {
                                                                    ?>
                                                                    <option value="" disabled selected>Choose your gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <?php } ?>
                                                                </select>
                                                                <label>Gender</label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row margin">
                                                            <div class="input-field col s12 margin">
                                                                <input id="country" type="text" name="country" value="<?php echo $country; ?>" readonly>
                                                                <label for="country" class="center-align">Country</label>
                                                            </div>
                                                        </div>
                                                        <div class="row margin">
                                                            <div class="input-field col s12 margin">
                                                                <textarea id="address" class="materialize-textarea" name="address" readonly> <?php echo $Address; ?> </textarea>
                                                                <label for="address">Address</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="btn cyan waves-effect waves-light right hide" type="submit" name="submit" id="submit">Submit
                                                                    <i class="material-icons right">send</i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ profile-page-wall-posts -->
                        </div>
                        <!--/ profile-page-wall -->
                         <!-- profile-page-sidebar-->
                        <div id="profile-page-sidebar" class="col s12 m4">
                            <!-- Profile About  -->
                            <div class="card cyan">
                                <div class="card-content white-text">
                                    <span class="card-title"></span>
                                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                </div>
                            </div>
                            <!-- Profile About  -->
                        </div>
                        <!-- profile-page-sidebar-->

                    </div>
                </div>
            </div>
    </div>
    <!--end container-->
    </section>
    <!-- END CONTENT -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
</div>
<!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START FOOTER -->
<?php $this->load->view('admin/components/page_tail'); ?>
