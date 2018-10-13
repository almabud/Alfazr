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
          <div id="breadcrumbs-wrapper">
              <div class="container">
                <div class="row hr_content_header">
                      <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title">List Hotel</h5>
                        <ol class="breadcrumbs">
                          <li><a href="dashboard">Dashboard</a></li>
                          <li>Hotels</li>
                          <li class="active active2"></li>
                        </ol>
                      </div>
                      <div class="col s2 m6 l6 breadcrumbs-btn"></div>
                </div>
              </div>
           </div>
          <div class="container">
            <div class="section" id="midle-content"></div>
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
      </div>
      <!-- END WRAPPER -->
   <!-- //////////////////////////////////////////////////////////////////////////// -->
      </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <?php $this->load->view('admin/components/page_tail'); ?>
    
