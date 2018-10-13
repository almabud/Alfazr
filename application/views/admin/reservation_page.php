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
                        <h5 class="breadcrumbs-title">Reserved Hotel List</h5>
                        <ol class="breadcrumbs">
                          <li><a href="dashboard">Dashboard</a></li>
                          <li>Reservation</li>
                        </ol>
                      </div>
                      <div class="col s2 m6 l6 breadcrumbs-btn">
                         <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow modal-trigger" href="#new_reservation" id="add_reservation_btn">
                          <i class="material-icons hide-on-med-and-up">add</i>
                          <span class="hide-on-small-onl">New</span>
                        </a>
                      </div>
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
     <!-- activation modal -->
    <div id="new_reservation" class="modal">
       <div id="breadcrumbs-wrapper">
          <div class="container" style="height: 65px;">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">New Reservation</h5>
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
                <form id="add_reservation" action="reservation/add_reservation" method="post">
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="text" name="guest_name" id="guest_name" class="reservation-input" required="1">
                        <label for="guest_name" class="center-align">Geust Name</label>
                      </div>
                    </div>
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="email" name="guest_email" class="reservation-input" required="1">
                        <label for="guest_email" class="center-align">Guest Email</label>
                      </div>
                    </div>
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="text" name="guest_phone" class="reservation-input" required="1">
                        <label for="guest_phone" class="center-align">Guest Contact No</label>
                      </div>
                    </div>
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="text" name="check_in_date" class="check_in_date black-text text-black reservation-input" value="" style="border-style:solid !important; border-width: 0px 0px 1px 0px; !important;">
                        <label for="check_in_date" class="center-align">Check in date</label>
                      </div>
                    </div>
                    <div class="row margin" style="margin-top: -9px !important;">
                      <div class="input-field col s12">
                        <input type="text"  name="check_out_date" class="check_out_date black-text text-black reservation-input" value="" style="border-style:solid !important; border-width: 0px 0px 1px 0px; !important;" disabled>
                        <label for="check_out_date" class="center-align">Check out date</label>
                      </div>
                    </div>
                    <div class="row margin">
                      <div class="input-field col s12">
                          <select name='select_hotel' id="select_hotel" required="1">
                            <option value="" disabled selected>Select Hotel</option>
                            <?php foreach($available_hotels as $value)
                                {
                                    echo '<option value='.$value->hotel_id.'>'.$value->name.'</option>';
                                }
                            ?>
                          </select>
                       <label>Hotel</label>
                      </div>
                    </div>
                     <div class="row margin">
                      <div class="input-field col s12">
                         <select id="select_room_type" name="select_room_type">
                          <option  disabled selected>Select hotel first</option>
                        </select>
                       <label>Selct room type</label>
                      </div>
                    </div>
                     <div class="row margin">
                      <div class="input-field col s12">
                         <select id="select_quantity" name="select_quantity">
                          <option  disabled selected>Select Quantity</option>
                          <?php
                          for($i=1;$i<10;$i++)
                                echo '<option  value="'.$i.'">'.$i.'</option>';
                           ?>
                        </select>
                       <label>Select Quantity</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12">
                        <div class="show-reservation-price">
                          <div class="row">
                            <p class="col left">Price for <span id="night"> </span> night</p>
                            <p class="col right"><span id="price"></span></p>
                          </div>
                          <div class="row">
                            <p class="col left">Offer</p>
                            <p class="col right"><span id="offer"></span></p>
                          </div>
                          <hr>
                          <div class="row">
                            <p class="col left">Total Price</p>
                            <p class="col right"><span id="total_price"></span></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s4 right" style="position:relative; overflow:hidden;" >
                        <button type="submit" class="btn waves-effect waves-light col s12" id="reserved_button" name="reserved" style="display: none;">
                          <div class="spinner" id="reserve_loader">
                              <div class="rect1"></div>
                              <div class="rect2"></div>
                              <div class="rect3"></div>
                              <div class="rect4"></div>
                          </div>
                          <span id="reserved_label" class="center">Reserved</span>
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
    
