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
     /*  // print_r($this->session->userdata());
       // var_dump($this->user_m->loggedin());
       // $this->user_m->loggedin() == FALSE || redirect('/admin/dashboard');
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $this->user_m->login();
            if ($this->user_m->loggedin() == TRUE) {
                redirect('/admin/dashboard');
            }
            else {
                $this->session->set_flashdata('error', 'Invalid Email or Password');
                //redirect('admin/user/login', 'refresh');
            }
        }*/

        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            $this->user_m->login();
            if($this->user_m->loggedin())
            {

                redirect('admin/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid Email or Password');
            }
        }
          $this->load->view('admin/user-login',$this->data);
    }

    public function logout(){
        $this->user_m->logout();
        $this->load->view('admin/user-login',$this->data);
    }

}