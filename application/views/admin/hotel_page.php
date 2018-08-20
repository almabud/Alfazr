<?php $this->load->view('admin/components/page_head', $this->data); ?>

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
              <p class="caption">Tables are a nice way to organize a lot of data. We provide a few utility classes to help you style your table as easily as possible. In addition, to improve mobile experience, all tables on mobile-screen widths are centered automatically.</p>
              <div class="divider"></div>
              <br>
              <div class="divider"></div>
              <!--DataTables example Row grouping-->
              <div id="row-grouping" class="section">
                <h4 class="header">DataTables Row grouping</h4>
                <div class="row">
                  <div class="col s12">
                    <p>Although DataTables doesn't have row grouping built-in (picking one of the many methods available would overly limit the DataTables core), it is most certainly possible to give the look and feel of row grouping.</p>
                  </div>
                  <div class="col s12">
                    <div class="col m12">
                      <h1>Product
                          <small>List</small>
                          <div class="right"> <a class="waves-effect waves-light btn modal-trigger" data-target="modal1" >Add New</a></div>
                      </h1>
                    </div>
                       <table class="striped" id="mydata">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>About</th>
                                <th>Photo</th>
                                <th style="text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content">
             <form action="" class="" method="post">
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
                    <input id="photo" type="text" name="photo">
                    <label for="photo">Photo</label>
                  </div>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <textarea id="about"  class="materialize-textarea" name="about"></textarea>
                    <label for="about">About</label>
                  </div>
                </div>
               
                <div class="row">
                  <div class="input-field col m3 s4 right">
                      <input type="submit" class="btn waves-effect waves-light col s12" value="Login">
                  </div>
                </div>
           </form>
          </div>
         </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
          </div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////// -->
      </div>
      <!-- END WRAPPER -->
    </div>
    
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <?php $this->load->view('admin/components/page_tail'); ?>
    
    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->