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
        if($this->user_m->loggedin())
            redirect('admin/dashboard');
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            $this->user_m->login();
            if($this->user_m->loggedin())
                redirect('admin/dashboard');
            else
                $this->session->set_flashdata('error', 'Invalid Email or Password');
        }
          $this->load->view('admin/user-login',$this->data);
    }

    public function logout(){
        $this->user_m->logout();
        redirect('admin/user/login');
    }

}