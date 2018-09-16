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
            <div class="section midle-content"></div>
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
    
