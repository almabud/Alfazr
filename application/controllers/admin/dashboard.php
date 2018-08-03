<?php
class Dashboard extends Admin_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index() {
        if(!$this->user_m->loggedin())
            redirect('admin/user/login');
        $this->load->view('admin/_layout_main', $this->data);
    }

   /* public function modal() {
    	$this->load->view('admin/_layout_modal', $this->data);
    }*/
}