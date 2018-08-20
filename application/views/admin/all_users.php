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
              <!--DataTables example-->
              <div id="table-datatables">
                <div class="row">
                  <div class="col s12">
                  <div class="row margin">
                    <div class="col s12">
                      <h1>Hotel
                          <span style="font-size:40px">List</span>
                          <div class="right"> <a class="waves-effect waves-light btn modal-trigger" id="add_hotel_btn" data-target="add_modal" >Add New</a></div>
                      </h1>
                      </div>
                    </div>
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th>About</th>
                          <th>Photo</th>
                          <th width="100"><span class="right"> Action</span></th>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                            
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <br>
            </div>
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
      </div>
      <!-- END WRAPPER -->

       <!-- Modal Structure -->
       <div id="add_modal" class="modal">
         <div class="modal-header  grey lighten-4">
            <div class="row margin">
              <div class="col s12">
                <h4> Add <span style="font-size:18px">New Hotel</span></h4>
              </div>
            </div>
            <div class="divider"></div>
          </div>
          <div class="modal-content">
            <form id="add_hotel" action="hotels/add_hotel" method="post" enctype="multipart/form-data">
                <div class="row margin">
                    <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('error')); ?></p>
                    <div class="input-field col s12">
                  <input id="name" type="text" name="name" required="1">
                  <label for="name" class="center-align">Hotel Name</label>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <input id="address" type="text" name="address">
                    <label for="address">Address</label>
                  </div>
                </div>
                
                <div class="row margin">
                  <div class="input-field col s12">
                    <textarea id="about"  class="materialize-textarea" name="about"></textarea>
                    <label for="about">About</label>
                  </div>
                </div>
                <div class="row margin">
                  <div id="file-upload" class="section">
                      <div class="row section">
                          <div class="col s12">
                              <input type="file" name="photo" id="photo" class="dropify" data-max-file-size="2M" data-height="100" data-default-file="" />
                          </div>
                      </div>
                  </div>
               </div>

                <div class="row">
                  <div class="input-field col m3 s4 right">
                      <input type="submit" id="ah_submit" class="btn waves-effect waves-light col s12" value="Add">
                  </div>
                </div>
           </form>
          </div>
         </div>
        </div>
        <!-- ADD modal end -->
        <!--start edit modal -->
        <div id="edit_modal" class="modal">
         <div class="modal-header  grey lighten-4">
            <div class="row margin">
              <div class="col s12">
                <h4> Edit <span style="font-size:18px">Hotel</span></h4>
              </div>
            </div>
            <div class="divider"></div>
          </div>
          <div class="modal-content">
            <form id="edit_hotel" method="post" action="hotels/edit_hotel" enctype="multipart/form-data">
              <input type="text" name="id" style="display:none;">
                <div class="row margin">
                    <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('error')); ?></p>
                    <div class="input-field col s12">
                  <input type="text" name="name" required="1">
                  <label for="name" class="center-align">Hotel Name</label>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <input  type="text" name="address">
                    <label for="address">Address</label>
                  </div>
                </div>
                
                <div class="row margin">
                  <div class="input-field col s12">
                    <textarea  class="materialize-textarea" name="about"></textarea>
                    <label for="about">About</label>
                  </div>
                </div>
                <div class="row margin">
                  <div id="file-upload" class="section">
                      <div class="row section">
                          <div class="col s12">
                              <input type="file"  name="photo" class="eh_dropify" data-max-file-size="2M" data-height="100"/>
                          </div>
                      </div>
                  </div>
               </div>

                <div class="row">
                  <div class="input-field col m3 s4 right">
                      <input type="submit" id="eh_submit" class="btn waves-effect waves-light col s12" value="Edit">
                  </div>
                </div>
           </form>
          </div>
         </div>
        </div>
        <!-- edit modal end -->

        <!-- Start dlt modal -->
<div id="dlt_modal" class="modal">
         <div class="modal-header  grey lighten-4">
            <div class="row margin">
              <div class="col s12">
                <h4> Delete <span style="font-size:18px">Hotel</span></h4>
              </div>
            </div>
            <div class="divider"></div>
          </div>
          <div class="modal-content">
            <form id="dlt_hotel" method="post" action="hotels/dlt_hotel" enctype="multipart/form-data">
              <input type="text" name="id" style="display:none;">
              <div class="row">
                  
                </div>
                <div class="row">
                  <div class="input-field col m3 s4 right">
                      <input type="submit" id="dh_submit" class="btn waves-effect waves-light col s12" value="Edit">
                  </div>
                </div>
           </form>
          </div>
         </div>
        </div>
        <!-- Endt dlt modal -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        
    
    
      </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <?php $this->load->view('admin/components/page_tail'); ?>
