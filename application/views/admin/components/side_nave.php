<?php
/**
 * Created by PhpStorm.
 * User: Almabud Sohan
 * Date: 04-Aug-18
 * Time: 2:08 AM
 */
?>
<aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
    <div class="brand-sidebar  blue darken-4">
        <h1 class="logo-wrapper">
            <a href="dashboard" class="brand-logo darken-1">
                <img src="<?php echo site_url('images/logo/materialize-logo.png'); ?>" alt="materialize logo">
                <span class="logo-text hide-on-med-and-down">Materialize</span>
            </a>
            <!-- <a href="#" class="navbar-toggler">
                <i class="material-icons">radio_button_checked</i>
            </a> -->
        </h1>
    </div>
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                    <a class="waves-effect waves-cyan active" href="<?php echo site_url('admin/dashboard'); ?>">
                        <i class="material-icons">dashboard</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="app-email.html" class="waves-effect waves-cyan">
                        <i class="material-icons">mail_outline</i>
                        <span class="nav-text">Mailbox</span>
                    </a>
                </li>
                <li class="bold">
                    <a class="collapsible-header  waves-effect waves-cyan">
                        <i class="material-icons">hotel</i>
                        <span class="nav-text">Hotels</span>
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?php echo site_url('admin/hotels'); ?>">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>Hotel list</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/hotels/rooms'); ?>">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>Room list</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold">
                    <a href="<?php echo base_url().'/admin/reservation' ?>" class="waves-effect waves-cyan">
                        <i class="material-icons">label</i>
                        <span class="nav-text">Reservation</span>
                    </a>
                </li>

                <li class="bold">
                    <a class="collapsible-header  waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">User</span>
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?php echo site_url('user/profile'); ?>">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>User Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                
            </ul>
        </li>
        <li>
            <a href="https://pixinvent.ticksy.com" target="_blank">
                <i class="material-icons">help_outline</i>
                <span class="nav-text">Support</span>
            </a>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
        <i class="material-icons">menu</i>
    </a>
</aside>

