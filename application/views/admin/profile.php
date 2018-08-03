<?php $this->load->view('admin/components/page_head'); ?>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-purple-deep-orange gradient-shadow">
          <div class="nav-wrapper">
            <div class="header-search-wrapper hide-on-med-and-down sideNav-lock">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" />
            </div>
            <ul class="right hide-on-med-and-down">
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                  <span class="flag-icon flag-icon-gb"></span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge">5</small>
                  </i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="../../images/avatar/avatar-7.png" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                  <i class="material-icons">format_indent_increase</i>
                </a>
              </li>
            </ul>
            <!-- translation-button -->
            <ul id="translation-dropdown" class="dropdown-content">
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-gb"></i> English</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-fr"></i> French</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-cn"></i> Chinese</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-de"></i> German</a>
              </li>
            </ul>
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICATIONS
                  <span class="new badge">5</span>
                </h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Profile</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Settings</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">live_help</i> Help</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">lock_outline</i> Lock</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
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
            <div id="profile-page" class="section">
              <!-- profile-page-header -->
              <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../../images/gallary/23.png" alt="user background">
                </div>
                <figure class="card-profile-image">
                  <img src="../../images/avatar/avatar-7.png" alt="profile image" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan gradient-shadow">
                </figure>
                <div class="card-content">
                  <div class="row pt-2">
                    <div class="col s12 m3 offset-m2">
                      <h4 class="card-title grey-text text-darken-4">Roger Waters</h4>
                      <p class="medium-small grey-text">Project Manager</p>
                    </div>
                    <div class="col s12 m2 center-align">
                      <h4 class="card-title grey-text text-darken-4">10+</h4>
                      <p class="medium-small grey-text">Work Experience</p>
                    </div>
                    <div class="col s12 m2 center-align">
                      <h4 class="card-title grey-text text-darken-4">6</h4>
                      <p class="medium-small grey-text">Completed Projects</p>
                    </div>
                    <div class="col s12 m2 center-align">
                      <h4 class="card-title grey-text text-darken-4">$ 1,253,000</h4>
                      <p class="medium-small grey-text">Busness Profit</p>
                    </div>
                    <div class="col s12 m1 right-align">
                      <a class="btn-floating activator waves-effect waves-light rec accent-2 right">
                        <i class="material-icons">perm_identity</i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-reveal">
                  <p>
                    <span class="card-title grey-text text-darken-4">Roger Waters
                      <i class="material-icons right">close</i>
                    </span>
                    <span>
                      <i class="material-icons cyan-text text-darken-2">perm_identity</i> Project Manager</span>
                  </p>
                  <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                  <p>
                    <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> +1 (612) 222 8989</p>
                  <p>
                    <i class="material-icons cyan-text text-darken-2">email</i> mail@domain.com</p>
                  <p>
                    <i class="material-icons cyan-text text-darken-2">cake</i> 18th June 1990</p>
                  <p>
                    <i class="material-icons cyan-text text-darken-2">airplanemode_active</i> BAR - AUS</p>
                </div>
              </div>
              <!--/ profile-page-header -->
              <!-- profile-page-content -->
              <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m4">
                  <!-- Profile About  -->
                  <div class="card cyan">
                    <div class="card-content white-text">
                      <span class="card-title">About Me!</span>
                      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                  </div>
                  <!-- Profile About  -->
                  <!-- Profile About Details  -->
                  <ul id="profile-page-about-details" class="collection z-depth-1">
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s5">
                          <i class="material-icons left">card_travel</i> Project</div>
                        <div class="col s7 right-align">ABC Name</div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s5">
                          <i class="material-icons left">poll</i> Skills</div>
                        <div class="col s7 right-align">HTML, CSS</div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s5">
                          <i class="material-icons left">domain</i> Lives in</div>
                        <div class="col s7 right-align">NY, USA</div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s5">
                          <i class="material-icons left">cake</i> Birth date</div>
                        <div class="col s7 right-align">18th June, 1991</div>
                      </div>
                    </li>
                  </ul>
                  <!--/ Profile About Details  -->
                  <!-- Profile About  -->
                  <div class="card red accent-2">
                    <div class="card-content white-text center-align">
                      <p class="card-title">
                        <i class="material-icons">group_add</i> 3685</p>
                      <p>Followers</p>
                    </div>
                  </div>
                  <!-- Profile About  -->
                  <!-- Profile feed  -->
                  <ul id="profile-page-about-feed" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <img src="../../images/avatar/avatar-2.png" alt="" class="circle deep-orange accent-2">
                      <span class="title">Project Title</span>
                      <p>Task assigned to new changes.
                        <br>
                        <span class="ultra-small">Second Line</span>
                      </p>
                    </li>
                    <li class="collection-item avatar">
                      <i class="material-icons circle teal accent-4">folder</i>
                      <span class="title">New Project</span>
                      <p>First Line of Project Work
                        <br>
                        <span class="ultra-small">Second Line</span>
                      </p>
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">domain</i>
                      </a>
                    </li>
                    <li class="collection-item avatar">
                      <i class="material-icons circle cyan">assessment</i>
                      <span class="title">New Payment</span>
                      <p>Last UK Project Payment
                        <br>
                        <span class="ultra-small">$ 3,684.00</span>
                      </p>
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">attach_money</i>
                      </a>
                    </li>
                    <li class="collection-item avatar">
                      <i class="material-icons circle red accent-2">play_arrow</i>
                      <span class="title">Latest News</span>
                      <p>company management news
                        <br>
                        <span class="ultra-small">Second Line</span>
                      </p>
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">track_changes</i>
                      </a>
                    </li>
                  </ul>
                  <!-- Profile feed  -->
                  <!-- task-card -->
                  <ul id="task-card" class="collection with-header">
                    <li class="collection-header gradient-45deg-light-blue-cyan">
                      <h4 class="task-card-title">My Task</h4>
                      <p class="task-card-date">March 26, 2015</p>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task1" />
                      <label for="task1">Create Mobile App UI.
                        <a href="#" class="secondary-content">
                          <span class="ultra-small">Today</span>
                        </a>
                      </label>
                      <span class="task-cat teal accent-4">Mobile App</span>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task2" />
                      <label for="task2">Check the new API standerds.
                        <a href="#" class="secondary-content">
                          <span class="ultra-small">Monday</span>
                        </a>
                      </label>
                      <span class="task-cat red accent-2">Web API</span>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task3" checked="checked" />
                      <label for="task3">Check the new Mockup of ABC.
                        <a href="#" class="secondary-content">
                          <span class="ultra-small">Wednesday</span>
                        </a>
                      </label>
                      <span class="task-cat deep-orange accent-2">Mockup</span>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task4" checked="checked" disabled="disabled" />
                      <label for="task4">I did it !</label>
                      <span class="task-cat cyan">Mobile App</span>
                    </li>
                  </ul>
                  <!-- task-card -->
                  <!-- Profile Total sell -->
                  <div class="card center-align">
                    <div class="card-content teal accent-4 white-text">
                      <p class="card-stats-title">
                        <i class="material-icons">attach_money</i>Your Profit</p>
                      <h4 class="card-stats-number">$8990.63</h4>
                      <p class="card-stats-compare">
                        <i class="material-icons">keyboard_arrow_up</i> 70%
                        <span class="teal-text text-lighten-5">last month</span>
                      </p>
                    </div>
                    <div class="card-action teal darken-1">
                      <div id="sales-compositebar"></div>
                    </div>
                  </div>
                  <!-- flight-card -->
                  <div id="flight-card" class="card">
                    <div class="card-header pink darken-4">
                      <div class="card-title">
                        <h4 class="flight-card-title">Your Next Flight</h4>
                        <p class="flight-card-date">June 18, Thu 04:50</p>
                      </div>
                    </div>
                    <div class="card-content-bg white-text">
                      <div class="card-content">
                        <div class="row flight-state-wrapper">
                          <div class="col s5 m5 l5 center-align">
                            <div class="flight-state">
                              <h4 class="margin">LDN</h4>
                              <p class="ultra-small">London</p>
                            </div>
                          </div>
                          <div class="col s2 m2 l2 center-align">
                            <i class="material-icons flight-icon">local_airport</i>
                          </div>
                          <div class="col s5 m5 l5 center-align">
                            <div class="flight-state">
                              <h4 class="margin">SFO</h4>
                              <p class="ultra-small">San Francisco</p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6 m6 l6 center-align">
                            <div class="flight-info">
                              <p class="small">
                                <span class="grey-text text-lighten-4">Depart:</span> 04.50</p>
                              <p class="small">
                                <span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                              <p class="small">
                                <span class="grey-text text-lighten-4">Terminal:</span> B</p>
                            </div>
                          </div>
                          <div class="col s6 m6 l6 center-align flight-state-two">
                            <div class="flight-info">
                              <p class="small">
                                <span class="grey-text text-lighten-4">Arrive:</span> 08.50</p>
                              <p class="small">
                                <span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                              <p class="small">
                                <span class="grey-text text-lighten-4">Terminal:</span> C</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- flight-card -->
                  <!-- Map Card -->
                  <div class="map-card">
                    <div class="card">
                      <div class="card-image waves-effect waves-block waves-light">
                        <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
                      </div>
                      <div class="card-content">
                        <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                          <i class="material-icons">pin_drop</i>
                        </a>
                        <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Company Name LLC</a>
                        </h4>
                        <p class="blog-post-content">Some more information about this company.</p>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Company Name LLC
                          <i class="material-icons right">close</i>
                        </span>
                        <p>Here is some more information about this company. As a creative studio we believe no client is too big nor too small to work with us to obtain good advantage.By combining the creativity of artists with the precision of engineers we develop custom solutions that achieve results.Some more information about this company.</p>
                        <p>
                          <i class="material-icons cyan-text text-darken-2">perm_identity</i> Manager Name</p>
                        <p>
                          <i class="material-icons cyan-text text-darken-2">business</i> 125, ABC Street, New Yourk, USA</p>
                        <p>
                          <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> +1 (612) 222 8989</p>
                        <p>
                          <i class="material-icons cyan-text text-darken-2">email</i> support@pixinvent.com</p>
                      </div>
                    </div>
                  </div>
                  <!-- Map Card -->
                </div>
                <!-- profile-page-sidebar-->
                <!-- profile-page-wall -->
                <div id="profile-page-wall" class="col s12 m8">
                  <!-- profile-page-wall-share -->
                  <div id="profile-page-wall-share" class="row">
                    <div class="col s12">
                      <ul class="tabs tab-profile z-depth-1 deep-orange accent-2">
                        <li class="tab col s3">
                          <a class="white-text waves-effect waves-light active" href="#UpdateStatus">
                            <i class="material-icons">border_color</i> Update Status</a>
                        </li>
                        <li class="tab col s3">
                          <a class="white-text waves-effect waves-light" href="#AddPhotos">
                            <i class="material-icons">camera_alt</i> Add Photos</a>
                        </li>
                        <li class="tab col s3">
                          <a class="white-text waves-effect waves-light" href="#CreateAlbum">
                            <i class="material-icons">photo_album</i> Create Album</a>
                        </li>
                      </ul>
                      <!-- UpdateStatus-->
                      <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
                        <div class="row">
                          <div class="col s2">
                            <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                          </div>
                          <div class="input-field col s10">
                            <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                            <label for="textarea" class="">What's on your mind?</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s12 m6 share-icons">
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">camera_alt</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">account_circle</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">keyboard</i>
                              <a href="#">
                                <i class="material-icons grey-text text-darken-1">location_on</i>
                          </div>
                          <div class="col s12 m6 right-align">
                            <!-- Dropdown Trigger -->
                            <a class='dropdown-button btn' href='#' data-activates='profliePost'>
                              <i class="material-icons left">language</i> Public</a>
                            <!-- Dropdown Structure -->
                            <ul id='profliePost' class='dropdown-content'>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">language</i> Public</a>
                              </li>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">face</i> Friends</a>
                              </li>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">lock_outline</i> Only Me</a>
                              </li>
                            </ul>
                            <a class="waves-effect waves-light btn">
                              <i class="material-icons left">rate_review</i> Post</a>
                          </div>
                        </div>
                      </div>
                      <!-- AddPhotos -->
                      <div id="AddPhotos" class="tab-content col s12  grey lighten-4">
                        <div class="row">
                          <div class="col s2">
                            <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                          </div>
                          <div class="input-field col s10">
                            <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                            <label for="textarea" class="">Share your favorites photos!</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s12 m6 share-icons">
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">camera_alt</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">account_circle</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">keyboard</i>
                              <a href="#">
                                <i class="material-icons grey-text text-darken-1">location_on</i>
                          </div>
                          <div class="col s12 m6 right-align">
                            <!-- Dropdown Trigger -->
                            <a class='dropdown-button btn' href='#' data-activates='profliePost2'>
                              <i class="material-icons">language</i> Public</a>
                            <!-- Dropdown Structure -->
                            <ul id='profliePost2' class='dropdown-content'>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">language</i> Public</a>
                              </li>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">face</i> Friends</a>
                              </li>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">lock_outline</i> Only Me</a>
                              </li>
                            </ul>
                            <a class="waves-effect waves-light btn">
                              <i class="material-icons left">rate_review</i> Post</a>
                          </div>
                        </div>
                      </div>
                      <!-- CreateAlbum -->
                      <div id="CreateAlbum" class="tab-content col s12  grey lighten-4">
                        <div class="row">
                          <div class="col s2">
                            <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                          </div>
                          <div class="input-field col s10">
                            <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                            <label for="textarea" class="">Create awesome album.</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s12 m6 share-icons">
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">camera_alt</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">account_circle</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">keyboard</i>
                              <a href="#">
                                <i class="material-icons grey-text text-darken-1">location_on</i>
                          </div>
                          <div class="col s12 m6 right-align">
                            <!-- Dropdown Trigger -->
                            <a class='dropdown-button btn' href='#' data-activates='profliePost3'>
                              <i class="material-icons">language</i> Public</a>
                            <!-- Dropdown Structure -->
                            <ul id='profliePost3' class='dropdown-content'>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">language</i> Public</a>
                              </li>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">face</i> Friends</a>
                              </li>
                              <li>
                                <a href="#!">
                                  <i class="material-icons">lock_outline</i> Only Me</a>
                              </li>
                            </ul>
                            <a class="waves-effect waves-light btn">
                              <i class="material-icons left">rate_review</i> Post</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/ profile-page-wall-share -->
                  <!-- profile-page-wall-posts -->
                  <div id="profile-page-wall-posts" class="row">
                    <div class="col s12">
                      <!-- medium -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <div class="col s1">
                              <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                            </div>
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin">John Doe</p>
                              <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                            </div>
                            <div class="col s1 right-align">
                              <i class="material-icons">expand_more</i>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col s12">
                              <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                            </div>
                          </div>
                        </div>
                        <div class="card-image profile-medium">
                          <img src="../../images/gallary/26.png" alt="sample" class="responsive-img profile-post-image profile-medium">
                          <span class="card-title text-shadow">Card Title</span>
                        </div>
                        <div class="card-content">
                          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action row">
                          <div class="col s4 card-action-share">
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">thumb_up</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">share</i>
                            </a>
                          </div>
                          <div class="input-field col s8 margin">
                            <input id="profile-comments" type="text" class="validate margin">
                            <label for="profile-comments" class="">Comments</label>
                          </div>
                        </div>
                      </div>
                      <!-- medium video -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <div class="col s1">
                              <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                            </div>
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin">John Doe</p>
                              <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                            </div>
                            <div class="col s1 right-align">
                              <i class="material-icons">expand_more</i>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col s12">
                              <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                            </div>
                          </div>
                        </div>
                        <div class="card-image profile-medium">
                          <div class="video-container no-controls">
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/10r9ozshGVE" frameborder="0" allowfullscreen></iframe>
                          </div>
                          <span class="card-title text-shadow">Card Title</span>
                        </div>
                        <div class="card-content">
                          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action row">
                          <div class="col s4 card-action-share">
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">thumb_up</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">share</i>
                            </a>
                          </div>
                          <div class="input-field col s8 margin">
                            <input id="profile-comments" type="text" class="validate margin">
                            <label for="profile-comments" class="">Comments</label>
                          </div>
                        </div>
                      </div>
                      <!-- small -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <div class="col s1">
                              <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                            </div>
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin">John Doe</p>
                              <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                            </div>
                            <div class="col s1 right-align">
                              <i class="material-icons">expand_more</i>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col s12">
                              <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                            </div>
                          </div>
                        </div>
                        <div class="card-image profile-small">
                          <img src="../../images/gallary/20.png" alt="sample" class="responsive-img profile-post-image">
                          <span class="card-title text-shadow">Card Title</span>
                        </div>
                        <div class="card-content">
                          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action row">
                          <div class="col s4 card-action-share">
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">thumb_up</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">share</i>
                            </a>
                          </div>
                          <div class="input-field col s8 margin">
                            <input id="profile-comments" type="text" class="validate">
                            <label for="profile-comments" class="">Comments</label>
                          </div>
                        </div>
                      </div>
                      <!-- small -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <div class="col s1">
                              <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                            </div>
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin">John Doe</p>
                              <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                            </div>
                            <div class="col s1 right-align">
                              <i class="material-icons">expand_more</i>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col s12">
                              <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                            </div>
                          </div>
                        </div>
                        <div class="card-image profile-large">
                          <img src="../../images/gallary/3.png" alt="sample" class="responsive-img profile-post-image">
                          <span class="card-title text-shadow">Card Title</span>
                        </div>
                        <div class="card-content">
                          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action row">
                          <div class="col s4 card-action-share">
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">thumb_up</i>
                            </a>
                            <a href="#">
                              <i class="material-icons grey-text text-darken-1">share</i>
                            </a>
                          </div>
                          <div class="input-field col s8 margin">
                            <input id="profile-comments" type="text" class="validate">
                            <label for="profile-comments" class="">Comments</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/ profile-page-wall-posts -->
                </div>
                <!--/ profile-page-wall -->
              </div>
            </div>
          </div>
      </div>
      <!--end container-->
      </section>
      <!-- END CONTENT -->
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START RIGHT SIDEBAR NAV-->
      <aside id="right-sidebar-nav">
        <ul id="chat-out" class="side-nav rightside-navigation">
          <li class="li-hover">
            <div class="row">
              <div class="col s12 border-bottom-1 mt-5">
                <ul class="tabs">
                  <li class="tab col s4">
                    <a href="#activity" class="active">
                      <span class="material-icons">graphic_eq</span>
                    </a>
                  </li>
                  <li class="tab col s4">
                    <a href="#chatapp">
                      <span class="material-icons">face</span>
                    </a>
                  </li>
                  <li class="tab col s4">
                    <a href="#settings">
                      <span class="material-icons">settings</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div id="settings" class="col s12">
                <h6 class="mt-5 mb-3 ml-3">GENERAL SETTINGS</h6>
                <ul class="collection border-none">
                  <li class="collection-item border-none">
                    <div class="m-0">
                      <span class="font-weight-600">Notifications</span>
                      <div class="switch right">
                        <label>
                          <input checked type="checkbox">
                          <span class="lever"></span>
                        </label>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li class="collection-item border-none">
                    <div class="m-0">
                      <span class="font-weight-600">Show recent activity</span>
                      <div class="switch right">
                        <label>
                          <input checked type="checkbox">
                          <span class="lever"></span>
                        </label>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                  <li class="collection-item border-none">
                    <div class="m-0">
                      <span class="font-weight-600">Notifications</span>
                      <div class="switch right">
                        <label>
                          <input type="checkbox">
                          <span class="lever"></span>
                        </label>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li class="collection-item border-none">
                    <div class="m-0">
                      <span class="font-weight-600">Show recent activity</span>
                      <div class="switch right">
                        <label>
                          <input type="checkbox">
                          <span class="lever"></span>
                        </label>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                  <li class="collection-item border-none">
                    <div class="m-0">
                      <span class="font-weight-600">Show your emails</span>
                      <div class="switch right">
                        <label>
                          <input type="checkbox">
                          <span class="lever"></span>
                        </label>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li class="collection-item border-none">
                    <div class="m-0">
                      <span class="font-weight-600">Show Task statistics</span>
                      <div class="switch right">
                        <label>
                          <input type="checkbox">
                          <span class="lever"></span>
                        </label>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                </ul>
              </div>
              <div id="chatapp" class="col s12">
                <div class="collection border-none">
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-1.png" alt="" class="circle cyan">
                    <span class="line-height-0">Elizabeth Elliott </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">5.00 AM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Thank you </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-2.png" alt="" class="circle deep-orange accent-2">
                    <span class="line-height-0">Mary Adams </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">4.14 AM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Hello Boo </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-3.png" alt="" class="circle teal accent-4">
                    <span class="line-height-0">Caleb Richards </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">9.00 PM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Keny ! </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-4.png" alt="" class="circle cyan">
                    <span class="line-height-0">June Lane </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">4.14 AM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Ohh God </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-5.png" alt="" class="circle red accent-2">
                    <span class="line-height-0">Edward Fletcher </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">5.15 PM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Love you </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-6.png" alt="" class="circle deep-orange accent-2">
                    <span class="line-height-0">Crystal Bates </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">8.00 AM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Can we </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-7.png" alt="" class="circle cyan">
                    <span class="line-height-0">Nathan Watts </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">9.53 PM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Great! </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-8.png" alt="" class="circle red accent-2">
                    <span class="line-height-0">Willard Wood </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">4.20 AM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Do it </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-9.png" alt="" class="circle teal accent-4">
                    <span class="line-height-0">Ronnie Ellis </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">5.30 PM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Got that </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-1.png" alt="" class="circle cyan">
                    <span class="line-height-0">Gwendolyn Wood </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">4.34 AM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Like you </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-2.png" alt="" class="circle red accent-2">
                    <span class="line-height-0">Daniel Russell </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">12.00 AM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Thank you </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-3.png" alt="" class="circle teal accent-4">
                    <span class="line-height-0">Sarah Graves </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">11.14 PM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Okay you </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-4.png" alt="" class="circle red accent-2">
                    <span class="line-height-0">Andrew Hoffman </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">7.30 PM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Can do </p>
                  </a>
                  <a href="#!" class="collection-item avatar border-none">
                    <img src="../../images/avatar/avatar-5.png" alt="" class="circle cyan">
                    <span class="line-height-0">Camila Lynch </span>
                    <span class="medium-small right blue-grey-text text-lighten-3">2.00 PM</span>
                    <p class="medium-small blue-grey-text text-lighten-3">Leave it </p>
                  </a>
                </div>
              </div>
              <div id="activity" class="col s12">
                <h6 class="mt-5 mb-3 ml-3">RECENT ACTIVITY</h6>
                <div class="activity">
                  <div class="col s3 mt-2 center-align recent-activity-list-icon">
                    <i class="material-icons white-text icon-bg-color deep-purple lighten-2">add_shopping_cart</i>
                  </div>
                  <div class="col s9 recent-activity-list-text">
                    <a href="#" class="deep-purple-text medium-small">just now</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                  </div>
                  <div class="recent-activity-list chat-out-list row mb-0">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color cyan lighten-2">airplanemode_active</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="cyan-text medium-small">Yesterday</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                    </div>
                  </div>
                  <div class="recent-activity-list chat-out-list row mb-0">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                      <i class="material-icons white-text icon-bg-color green lighten-2">settings_voice</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="green-text medium-small">5 Days Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                    </div>
                  </div>
                  <div class="recent-activity-list chat-out-list row mb-0">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color amber lighten-2">store</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="amber-text medium-small">1 Week Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                    </div>
                  </div>
                  <div class="recent-activity-list row">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color deep-orange lighten-2">settings_voice</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                    </div>
                  </div>
                  <div class="recent-activity-list chat-out-list row mb-0">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                      <i class="material-icons white-text icon-bg-color brown lighten-2">settings_voice</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="brown-text medium-small">1 Month Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                    </div>
                  </div>
                  <div class="recent-activity-list chat-out-list row mb-0">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color deep-purple lighten-2">store</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                    </div>
                  </div>
                  <div class="recent-activity-list row">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color grey lighten-2">settings_voice</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="grey-text medium-small">1 Year Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </aside>
      <!-- END RIGHT SIDEBAR NAV-->
    </div>
    <!-- END WRAPPER -->

    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
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
<?php $this->load->view('admin/components/page_tail'); ?>