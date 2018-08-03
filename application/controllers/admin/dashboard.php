<?php
class Dashboard extends Admin_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index() {
      //  $this->user_m->loggedin() == TRUE || redirect('/admin/user/login');
        var_dump($this->session->userdata());
        echo "hello";
    	//$this->load->view('admin/_layout_main',$this->data);
    }

   /* public function modal() {
    	$this->load->view('admin/_layout_modal', $this->data);
    }*/
}