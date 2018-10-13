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
    public function login()
    {
        $data='';
        if($this->user_m->loggedin())
            {
                redirect('admin/dashboard');
                $data['success']='admin/dashboard';
            }
            if(!$this->input->is_ajax_request())
                $this->load->view('admin/user-login');
            else
            {
                $rules = $this->user_m->rules;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == TRUE)
                {
                    $data=$this->user_m->login();
                    if($this->user_m->loggedin())
                        $data['success']='admin/dashboard';
                }
                if($this->uri->segment(2)!=null && $this->uri->segment(3) != null)
                 $data=$this->user_m->activate_m();
                echo json_encode($data);
            }

    }
    public function logout(){
        $this->user_m->logout();
        redirect('login');
    }
    public  function register()
    {  if($this->user_m->loggedin())
          redirect('admin/dashboard');
          $this->load->view('admin/user-register');
    }
    public function do_register()
    {
        $response=array();
        $rules = array(
            'email' => array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|xss_clean'
            ),
            'password' => array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ),
            'conf_password'=> array(
                'field'   => 'conf_password',
                'label'   => 'Password again',
                'rules'   => 'trim|required|matches[password]',
                'errors' => array('matches' => "Password doesn't match.")
            )
        );
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            $id=$this->user_m->register_m($code);
            if(!array_key_exists('error', $id))
            {
                $email=$this->input->post('email');
                $filename=site_url('images/logo/alfazr.jpg');
                $this->email->to($email);
                $this->email->subject('Signup Verification Email');
                $active_url= base_url().'login/'.urlencode($email).'/'.$code;
                $this->email->attach($filename);
                $cid = $this->email->attachment_cid($filename);
                $message= $this->load->view('admin/activation_email',['cid'=>$cid, 'url'=>$active_url], TRUE);
                $this->email->message($message);
                if($this->email->send())
                 $response['success']='Account has been created successfully.Check your mail to activate your account.';
                 else
                 $response['error']['error']='Check your internet connection.';
            }
            else
             $response=$id;
        }
        else
         $response['error']['password']=form_error('conf_password');
        echo json_encode($response);
    }
    public  function re_send_email()
    {
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
            if($this->user_m->re_send_email_m($code))
            {
                $email=$this->input->post('email');
                $filename=site_url('images/logo/alfazr.jpg');
                $this->email->to($email);
                $this->email->subject('Signup Verification Email');
                $active_url= base_url().'login/'.urlencode($email).'/'.$code;
                $this->email->attach($filename);
                $cid = $this->email->attachment_cid($filename);
                $message= $this->load->view('admin/activation_email',['cid'=>$cid, 'url'=>$active_url], TRUE);
                $this->email->message($message);
                if($this->email->send())
                 $response['success']='Account has been created successfully.Check your mail to activate your account.';
                else
                 $response['error']='Check your internet connection.';
            }
            else
                $response['error']='Email could not be found.';
        }
        else
        $response['error']='Invalid email.';
        echo json_encode($response);
    }
}
