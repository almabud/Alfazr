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
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">jsGrid</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                    <li><a href="#">Tables</a>
                    </li>
                    <li class="active">jsGrid</li>
                  </ol>
                </div>
                <div class="col s2 m6 l6">
                  <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" href="#!" data-activates="dropdown1">
                    <i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Settings</span>
                    <i class="material-icons right">arrow_drop_down</i>
                  </a>
                  <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!" class="grey-text text-darken-2">Access<span class="badge">1</span></a>
                    </li>
                    <li><a href="#!" class="grey-text text-darken-2">Profile<span class="new badge">2</span></a>
                    </li>
                    <li><a href="#!" class="grey-text text-darken-2">Notifications</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            <p class="caption"><a href="http://js-grid.com/" target="_blank">jsGrid</a> Lightweight Grid jQuery Plugin</p>
            <div class="divider"></div>
            <!--jsgrid-->
            <div id="jsgrid" class="section">
              <div class="row">
                <div class="col s12">
                  <h4 class="header">jsGrid</h4>
                </div>
                <div class="col s12">
                  <p>lightweight client-side data grid control based on jQuery. It supports basic grid operations like inserting, filtering, editing, deleting, paging and sorting. jsGrid is flexible and allows to customize appearance and components.</p>
                </div>
              </div>
              <!--Static Data-->
              <div class="row">
                <div class="col s12">
                  <p>Static Data</p>
                </div>
                <div class="col s12">
                  <p>Simple grid with static data. Provide an array to option data in config.</p>
                  <div id="jsGrid-static"></div>
                </div>
              </div>
              <div class="divider"></div>
              <!--Basic Scenario-->
              <div class="row">
                <div class="col s12">
                  <p>Basic Scenario</p>
                </div>
                <div class="col s12">
                  <p>Grid with filtering, editing, inserting, deleting, sorting and paging. Data provided by controller. Read about controller interface in the docs.</p>
                  <div id="jsGrid-basic"></div>
                </div>
              </div>
              <div class="divider"></div>
              <!--OData Service-->
              <div class="row">
                <div class="col s12">
                  <p>OData Service</p>
                </div>
                <div class="col s12">
                  <p>Controller loadData method requests data from OData service with ajax. Any asynchronous source could be used instead. Just return jQuery.promise from controller method. Field option itemTemplate allows to render any custom cell content, just return your markup as string, DOM Node or jQuery Element.</p>
                  <div id="jsGrid-odata"></div>
                </div>
              </div>
              <div class="divider"></div>
              <!--Sorting-->
              <div class="row">
                <div class="col s12">
                  <p>Sorting</p>
                </div>
                <div class="col s12">
                  <p>Sorting can be done not only with column header interaction, but also with sort method.</p>
                  <div class="row">
                    <div class="sort-panel col s4 offset-s8">
                      <label>Sorting Field:
                        <select id="sortingField" class="browser-default">
                          <option>Name</option>
                          <option>Age</option>
                          <option>Address</option>
                          <option>Country</option>
                          <option>Married</option>
                        </select>
                      </label>
                    </div>
                  </div>
                  <br/>
                  <div id="jsGrid-sorting"></div>
                </div>
              </div>
              <div class="divider"></div>
              <!--Loading Data by Page-->
              <div class="row">
                <div class="col s12">
                  <p>Loading Data by Page</p>
                </div>
                <div class="col s12">
                  <p>Grid allows to load data by pages. It helps to reduce data loading time and of course necessary for large data sources.</p>
                  <div class="row">
                    <div class="pager-panel col s4 offset-s8">
                      <label>Page:
                        <select id="pager" class="browser-default">
                          <option>1</option>
                          <option selected>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                        </select>
                      </label>
                    </div>
                  </div>
                  <br/>
                  <div id="jsGrid-page"></div>
                </div>
              </div>
              <div class="divider"></div>
              <!--Custom View-->
              <div class="row">
                <div class="col s12">
                  <p>Custom View</p>
                </div>
                <div class="col s12">
                  <p>All components of the grid can be easily configured. Heading, filtering, inserting, editing, sorting, paging and row selection could be switched with a single corresponding boolean option.</p>
                  <div class="row">
                    <div class="config-panel  col s12">
                      <label>
                        <input id="heading" type="checkbox" checked /> Heading</label>
                      <label>
                        <input id="filtering" type="checkbox" checked /> Filtering</label>
                      <label>
                        <input id="inserting" type="checkbox" /> Inserting</label>
                      <label>
                        <input id="editing" type="checkbox" checked /> Editing</label>
                      <label>
                        <input id="paging" type="checkbox" checked /> Paging</label>
                      <label>
                        <input id="sorting" type="checkbox" checked /> Sorting</label>
                      <label>
                        <input id="selecting" type="checkbox" checked /> Selecting</label>
                    </div>
                  </div>
                  <br/>
                  <div id="jsGrid-custom"></div>
                </div>
              </div>
            </div>
            <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
              <a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow">
                <i class="material-icons">add</i>
              </a>
              <ul>
                <li>
                  <a href="css-helpers.html" class="btn-floating blue">
                    <i class="material-icons">help_outline</i>
                  </a>
                </li>
                <li>
                  <a href="cards-extended.html" class="btn-floating green">
                    <i class="material-icons">widgets</i>
                  </a>
                </li>
                <li>
                  <a href="app-calendar.html" class="btn-floating amber">
                    <i class="material-icons">today</i>
                  </a>
                </li>
                <li>
                  <a href="app-email.html" class="btn-floating red">
                    <i class="material-icons">mail_outline</i>
                  </a>
                </li>
              </ul>
            </div>
            <!-- Floating Action Button -->
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
