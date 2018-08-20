<?php
class Dashboard extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('profile_m');
    }

    public function index() {
        if(!$this->user_m->loggedin())
            redirect('admin/user/login');
        $this->data= $this->profile_m->get_profile_data();
        $this->load->view('admin/_layout_main', $this->data);
    }
    public function profile()
    {
        if(!$this->user_m->loggedin())
            redirect('admin/user/login');
        $this->data = $this->profile_m->get_profile_data();
        $this->load->view('admin/profile', $this->data);
    }
    public  function  add_photos()
    {
        $path = realpath(".");
        $path .= "/images/user_photo"; 
        $config['upload_path'] =$path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width']  = 1920;
        $config['max_height'] = 1080;
        $cover_photo=($this->do_upload($config,'cover_photo'))['cover_photo']['file_name'];
        $profile_photo= ($this->do_upload($config,'profile_photo'))['profile_photo']['file_name'];
         if($profile_photo!=NULL && $cover_photo!=NULL)
         {
            $file_data=array(
                'cover_photo'=>$cover_photo,
                 'profile_photo'=>$profile_photo
             );
         }
        if($cover_photo!=NULL && $profile_photo==NULL)
        {
            $file_data=array(
                 'cover_photo'=>$cover_photo
           );
        }
        if($cover_photo==NULL && $profile_photo!=NULL)
        {
            $file_data=array(
                 'profile_photo'=>$profile_photo
           );
        }
        $current_photo=$this->profile_m->get_profile_data();
        if(!$this->profile_m->do_upload_photo($file_data,$this->uri->segment(4)))
        {
            unlink($path.'/'.$file_data['cover_photo']);
            unlink($path.'/'.$file_data['profile_photo']);
        }
        else
        {
            if($cover_photo!= NULL)
             unlink($path.'/'.$current_photo['cover_photo']);
             if($profile_photo != NULL)
               unlink($path.'/'.$current_photo['profile_photo']);
        }
        redirect('admin/dashboard/profile');
    }
    function  update_profile_c()
    {
        $rules=$this->profile_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            $this->profile_m->update_profile();

            // if(!$this->profile_m->update_profile())
            // {
            //     $this->session->set_flashdata('error', 'Updated unsuccessful');
            // }
        }
        redirect('admin/dashboard/profile');

    }


}
