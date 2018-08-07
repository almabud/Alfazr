<?php if(uri_string()!='admin/user/login') { ?>
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
    <script type="text/javascript" src="../../vendors/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo site_url('js/materialize.min.js'); ?>"></script>
    <!--prism-->
    <script type="text/javascript" src="<?php echo site_url('vendors/prism/prism.js'); ?>"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo site_url('vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <!-- dropify -->
    <script type="text/javascript" src="<?php echo site_url('vendors/dropify/js/dropify.min.js'); ?>"></script>
    <!-- chartjs -->
    <script type="text/javascript" src="<?php echo site_url('vendors/chartjs/chart.min.js'); ?>"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo site_url('js/plugins.js'); ?>"></script>
    <!--form-file-uploads.js - Page Specific JS codes-->
    <script type="text/javascript" src="<?php echo site_url('js/scripts/form-file-uploads.js'); ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo site_url('js/my-script.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('js/scripts/dashboard-ecommerce.js'); ?>"></script>
    </body>
    </html>