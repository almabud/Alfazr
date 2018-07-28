<?php
/**
 * Created by PhpStorm.
 * User: Almabud Sohan
 * Date: 26-Jul-18
 * Time: 2:35 AM
 */

class user extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login(){

      /*  $dashboard = 'admin/dashboard';
        $this->user_m->loggedin() == FALSE || redirect($dashboard);

        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
            if ($this->user_m->login() == TRUE) {
                redirect($dashboard);
            }
            else {
                $this->session->set_flashdata('error', 'That email/password combination does not exist');
                redirect('admin/user/login', 'refresh');
            }
        }
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);*/
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
        }

      $this->load->view('admin/user-login',$this->data);
    }

    public function logout(){
        $this->user_m->logout();
        redirect('admin/user/login');
    }

}