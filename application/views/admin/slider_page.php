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
                <div class="section">
                <p class="caption">A Simple Blank Page to use it for your custome design and elements.</p>
                <div class="divider"></div>
                    <div class="slider center" style="height: 700px !important; width: 100% !important;">
                        <div class="carousel carousel-slider">
                            <div class="carousel-item">
                            <a  href="#"><img height="300" width="100%" src="<?php echo site_url('images/gallary/8.png'); ?>"></a>
                            </div>
                            <div class="carousel-item">
                            <a  href="#"><img height="300" width="100%" src="<?php echo site_url('images/gallary/6.png'); ?>"></a>
                            </div>
                            <div class="carousel-item">
                            <a  href="#"><img height="300" width="100%" src="<?php echo site_url('images/gallary/2.png'); ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- START FOOTER -->
<?php $this->load->view('admin/components/page_tail'); ?>
