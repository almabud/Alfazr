<?php $this->load->view('admin/components/page_head', $this->data=$user_info); ?>

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
                        <h5 class="breadcrumbs-title">Pyement List</h5>
                        <ol class="breadcrumbs">
                          <li><a href="dashboard">Dashboard</a></li>
                          <li>Payement</li>
                        </ol>
                      </div>
                      <div class="col s2 m6 l6 breadcrumbs-btn">
                         <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow modal-trigger" href="#payment" id="add_payment_btn">
                          <i class="material-icons hide-on-med-and-up">add</i>
                          <span class="hide-on-small-onl">New</span>
                        </a>
                      </div>
                </div>
              </div>
           </div>
          <div class="container">
            <div class="section" id="midle-content">
              <div id="table-datatables">
    <div class="row margin">
        <div class="col s12">
            <table id="data-table-simple" class="bordered striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Guest name</th>
                        <th>Guest email</th>
                        <th>Reff</th>
                        <th>Reciept</th>
                        <th>Status</th>
                        <th>Payment date</th>
                        <!-- <th>Photo</th> -->
                    </tr>
                </thead>
                <tbody id="show_data"></tbody>
            </table>
        </div>
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
   <!-- //////////////////////////////////////////////////////////////////////////// -->
      </div>
    <!-- END MAIN -->
     <!-- activation modal -->
    <div id="payment" class="modal">
       <div id="breadcrumbs-wrapper">
          <div class="container" style="height: 65px;">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">New payment</h5>
              </div>
            </div>
            <hr>
          </div>
        </div>
        <div class="modal-content">
          <div class="">
            <div class="row">
              <div>
                <div class="row" style="cursor: default !important;">
                  <div class="col s12 center-align red-text text-accent-4" id="resend_email_error" style="margin-top: 19px;"></div>
                </div>
                <form id="add_payment" action="payment/add_payment" method="post" enctype="multipart/form-data">
                  <div class="row" style="cursor: default !important;">
                   <div class="col s12 center-align red-text text-accent-4" id="error" style=""></div>
                  </div>
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="text" name="full_name" id="full_name" class="reservation-input" required="1" value='<?php echo $user_info['F_name'].' '.$user_info['L_name']; ?>'>
                        <label for="full_name" class="center-align">Full name</label>
                      </div>
                    </div>
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="email" name="email" class="reservation-input" value='<?php echo $user_info['email']; ?>' required="1">
                        <label for="email" class="center-align">Email</label>
                      </div>
                    </div>
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="text" name="reff" class="reservation-input" required="1">
                        <label for="reff" class="center-align">#Reff</label>
                      </div>
                    </div>
                     <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="text" name="amount" class="reservation-input" required="1">
                        <label for="amount" class="center-align">Amount</label>
                      </div>
                    </div>
                    <div class="row margin">
                       <div id="file-upload" class="section">
                          <div class="row section">
                              <div class="col s12">
                                 <label for="payment_reciept" class="center-align">Payment reciept</label>
                                  <input type="file" name="payment_reciept" id="payment_reciept" class="dropify" data-max-file-size="2M" data-height="100" data-default-file=""/>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s7 m3 right" style="position:relative; overflow:hidden;" >
                        <button type="submit" class="btn waves-effect waves-light col s12" id="payment_button" name="reserved" disabled>
                          <div class="spinner" id="payment_loader">
                              <div class="rect1"></div>
                              <div class="rect2"></div>
                              <div class="rect3"></div>
                              <div class="rect4"></div>
                          </div>
                          <span  class="center" id="payment_label" >Pay</span>
                        </button> 
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <?php $this->load->view('admin/components/page_tail'); ?>
    
