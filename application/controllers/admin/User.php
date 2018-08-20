<?php
/**
 * Created by PhpStorm.
 * User: Almabud Sohan
 * Date: 26-Jul-18
 * Time: 2:35 AM
 */

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }
    public function login(){
        if($this->user_m->loggedin())
            redirect('admin/dashboard');
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            $result=$this->user_m->login();
             if($this->user_m->loggedin())
                 redirect('admin/dashboard');
             if($result=='activate_needed')
                 redirect('admin/user/re_send_email/activate_needed');

        }
         $this->load->view('admin/user-login',$this->data);
    }

    public function logout(){
        $this->user_m->logout();
        redirect('admin/user/login');
    }
    public  function register()
    {     
        $rules = array(
            'email' => array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|xss_clean'
            ),
            'conf_password'=> array(
                'field'   => 'conf_password',
                'label'   => 'Password again',
                'rules'   => 'trim|required|matches[password]'
            ),
            'password' => array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            )
        );
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);
        if($this->user_m->loggedin())
          redirect('admin/dashboard');
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
           
            if($id=$this->user_m->register_m($code))
            {
                $message = 	"
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
						  <div style='margin:5px !important; padding:5px !important;'>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."admin/user/activate/".$id."/".$code."'>Activate My Account</a></h4>
							</div>
						</body>
						</html>
						";

                if($this->send_mail($this->input->post('email'),$message))
                 $this->load->view('admin/activation_page');
            }
                //sending email
        }
         $this->load->view('admin/user-register');
    }
    public  function activate()
    {
        if($this->user_m->loggedin())
            redirect('admin/dashboard');
        $this->user_m->activate_m();
                 $this->load->view('admin/activation_page');
    }
    public  function re_send_email()
    {

        if($this->user_m->loggedin())
            redirect('admin/dashboard');
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);
        $rules = array(
            'email' => array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|xss_clean'
            )
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            if($id=$this->user_m->re_send_email_m($code))
            {
                $message = 	"
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
						  <div style='margin:5px !important; padding:5px !important;'>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."admin/user/activate/".$id."/".$code."'>Activate My Account</a></h4>
							</div>
						</body>
						</html>
						";
                if($this->send_mail($this->input->post('email'),$message))
                {
                    $this->session->set_flashdata('success', 'Activation link has been sent.Please check your email.');
                    //redirect('admin/user/activate/resend');
                }
            }
            else
                $this->session->set_flashdata('error','Invalid email.');
        }
        else

        {
            if($this->session->flashdata('success')==NULL)
            {
                if($this->uri->segment(4)=='activate_needed')
                    $this->session->set_flashdata('error','Your account need to be activated.');
                else
                    $this->session->set_flashdata('error','Activation link appears to be invalid.');
            }
        }
        $this->load->view('admin/activation_page');
    }
}
