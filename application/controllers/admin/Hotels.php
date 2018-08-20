<?php
class Hotels extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('profile_m');
        $this->load->model('hotel_m');
    }

    public function index() {
        if(!$this->user_m->loggedin())
            redirect('admin/user/login');
        $this->data= $this->profile_m->get_profile_data();
        $this->load->view('admin/all_users', $this->data);
    }
    public function get_hotel_data()
    {
        $data= $this->hotel_m->get_all_hotel_data();
        echo json_encode($data);
    }
    public function add_hotel()
    {
        $path = realpath(".");
        $path .= "/images/hotels_photo"; 
        $config['upload_path'] =$path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width']  = 1920;
        $config['max_height'] = 1080;
        $rules=$this->hotel_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            $photo=($this->do_upload($config,'photo'))['photo']['file_name'];
            $data= $this->hotel_m->add_hotel_m($photo);
            echo json_encode($data);
        }
    }
    public function edit_hotel()
    {
        $path = realpath(".");
        $path .= "/images/hotels_photo"; 
        $config['upload_path'] =$path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width']  = 1920;
        $config['max_height'] = 1080;
        $id = $this->input->post('id');
        $curr_photo = $this->hotel_m->get_all_hotel_data($id,TRUE)->hotel_photo;
         $rules=$this->hotel_m->rules;
         $this->form_validation->set_rules($rules);
          if ($this->form_validation->run() == TRUE)
          {
              
            if($photo=($this->do_upload($config,'photo'))['photo']['file_name'])
            {
                $data=$this->hotel_m->edit_hotel_m($photo,$id);
                unlink($path.'/'.$curr_photo);
            }
            else
            {
                $data=$this->hotel_m->edit_hotel_m($curr_photo,$id);
            }
        }
      echo json_encode($data);
     }
     public function dlt_hotel()
     {
        $path = realpath(".");
        $path .= "/images/hotels_photo"; 
        $id = $this->input->post('id');
        $curr_photo = $this->hotel_m->get_all_hotel_data($id,TRUE)->hotel_photo;
        unlink($path.'/'.$curr_photo);
        if($data = $this->hotel_m->dlt_hotel_m())
        {
            unlink($path.'/'.$curr_photo);
        }
         echo json_encode($data);
     }
  
}
