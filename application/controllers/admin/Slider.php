<?php
class Slider extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('profile_m');
        $this->load->model('slider_m');
    }

    public function index() {
        if(!$this->user_m->loggedin())
            redirect('admin/user/login');
        $this->data= $this->profile_m->get_profile_data();
        $this->load->view('admin/slider_page',$this->data);
    }
}
