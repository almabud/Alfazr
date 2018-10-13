<?php
$check_uri=rtrim('login/'.$this->uri->segment(2).'/'.$this->uri->segment(3),'/');
$check_uri2=rtrim('admin/user/re_send_email/'.$this->uri->segment(4),'/');
if(uri_string()!='login' && uri_string()!='register' && uri_string()!=$check_uri2 && uri_string()!=$check_uri) { ?>
<!-- START FOOTER -->
<footer class="page-footer gradient-45deg-purple-deep-orange">
    <div class="footer-copyright">
        <div class="container">
          <span>Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-4" href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT</a> All rights reserved.</span>
            <span class="right hide-on-small-only"> Design and Developed by <a class="grey-text text-lighten-4" href="https://pixinvent.com/">PIXINVENT</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<?php } ?>
<!--    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo site_url('vendors/jquery-3.2.1.min.js'); ?>"></script>
    <!--angularjs-->
    <script type="text/javascript" src="<?php echo site_url('vendors/angular.min.js'); ?>"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo site_url('js/materialize.min.js'); ?>"></script>
    <!--prism-->
    <script type="text/javascript" src="<?php echo site_url('vendors/prism/prism.js'); ?>"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo site_url('vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>    <link href="<?php echo site_url('vendors/jquery.nestable/nestable.css'); ?>" type="text/css" rel="stylesheet">
    <!-- dropify -->
    <script type="text/javascript" src="<?php echo site_url('vendors/dropify/js/dropify.js'); ?>"></script>
    <!-- chartjs -->
    <script type="text/javascript" src="<?php echo site_url('vendors/chartjs/chart.min.js'); ?>"></script>
    <!--form-file-uploads.js - Page Specific JS codes-->
    <script type="text/javascript" src="<?php echo site_url('js/scripts/form-file-uploads.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('js/scripts/dashboard-ecommerce.js'); ?>"></script>
    <!-- date picker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- data-tables --> 
    <script type="text/javascript" src="<?php echo site_url('vendors/data-tables/js/jquery.dataTables.min.js'); ?>"></script>
    <!--data-tables.js - Page Specific JS codes -->
    <script type="text/javascript" src="<?php echo site_url('vendors/sweetalert/dist/sweetalert.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('js/scripts/extra-components-sweetalert.js'); ?>"></script>
    <!-- masonry -->
    <script src="<?php  echo site_url('vendors/masonry.pkgd.min.js'); ?>"></script>
    <!-- imagesloaded -->
    <script src="<?php echo site_url('vendors/imagesloaded.pkgd.min.js'); ?>"></script>
    <!-- magnific-popup -->
    <script type="text/javascript" src="<?php echo site_url('vendors/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
   
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo site_url('js/custom.js'); ?>"></script>
    <?php  if(uri_string()=='admin/hotels') { ?>
    <script type="text/javascript" src="<?php echo site_url('js/hotel_ajax.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('js/pekeUpload.js'); ?>"></script>
    <?php } ?>
   <?php if(uri_string()=='admin/hotels/rooms'){ ?>
   <script type="text/javascript" src="<?php echo site_url('js/room_ajax.js'); ?>"></script>
    <?php } ?>
    <?php if(uri_string()=='admin/user'|| uri_string()=='register' || uri_string()==$check_uri){ ?>
   <script type="text/javascript" src="<?php echo site_url('js/user.js'); ?>"></script>
    <?php } ?>
    <?php  if(uri_string()=='admin/reservation') { ?>
    <script type="text/javascript" src="<?php echo site_url('js/reservation_ajax.js'); ?>"></script>
    <?php } ?>
    <?php  if(uri_string()=='admin/payment') { ?>
    <script type="text/javascript" src="<?php echo site_url('js/payment.js'); ?>"></script>
    <?php } ?>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url('vendors/froala/js/froala_editor.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('vendors/froala/js/froala_editor.pkgd.min.js'); ?>"></script>
   
    <!-- <script type="text/javascript" src="<?php //echo site_url('vendors/material-summernote/dist/materialnote.js'); ?>"></script> -->
    <script type="text/javascript" src="<?php echo site_url('js/plugins.js'); ?>"></script>
     <!--media-gallary-page.js - Page specific JS-->
     <script type="text/javascript" src="<?php echo site_url('js/scripts/media-gallary-page.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo site_url('vendors/jquery.nestable/jquery.nestable.js'); ?>"></script>


  <script>
      $('.slider').slider({
        indicators:false,
        duration:1000,
        interval:2000
    });
    $('.carousel').carousel({
        duration:500,
        fullWidth:true,
        indicators:true
    });
    var auto_play=true;
    setInterval(function() {
        if(auto_play){
            $('.carousel').carousel('next');
        }
    }, 6000);
    $('.carousel').hover(function(){ auto_play = false; },function(){ auto_play = true; });
 </script>
    </body>
    </html>
