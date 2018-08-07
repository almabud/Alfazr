<?php
class Dashboard extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('profile_m');
    }

    public function index() {
        $this->data= $this->profile_m->get_profile_data();
        $this->load->view('admin/_layout_main', $this->data);
    }
    public function profile()
    {
        $this->data= $this->profile_m->get_profile_data();
        $this->load->view('admin/profile', $this->data);
    }
    public  function  add_photos()
    {
        $config['upload_path'] = realpath('./images/user_photo');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width']  = 1024;
        $config['max_height'] = 768;
        $file_data=array();
        $input_name=array(
            'cover_photo'=>'cover_photo',
            'profile_photo'=>'profile_photo'
        );
       $data = $this->do_upload($config,$input_name);
        $file_data['pro_id']=$this->uri->segment(4);
       $file_data['activity']='active';
        $data2=$this->profile_m->get_photo_data($this->uri->segment(4));
        $data3=array();
        $data3['profile_photo']=null;
        $data3['cover_photo']=null;
        $data3['cover_photo_id']=null;
        $data3['profile_photo_id']=null;
        foreach ($data2 as $key=>$value)
        {
            $data3[$value->file_type]=$value->img;
            $data3[$value->file_type."_id"]=$value->id;
        }

       foreach ($input_name as $file_name)
       {
           if(isset($data[$file_name]))
           {
               $file_data['img']=$data[$file_name]['file_name'];
               $file_data['file_type']=$file_name;

               //echo $file_data['img'];
               if(!$this->profile_m->do_upload_photo($file_data,$data3[$file_name.'_id']))
               {
                   unlink($config['upload_path'].'/'.$data[$file_name]['file_name']);
                   $this->session->set_flashdata('error', 'File can not be uploaded');
               }
               else
               {
                   /*foreach ($data3 as $key=> $value)
                       echo $key."=>".$value."</br>";*/
                     if($data3[$file_name])
                       unlink($config['upload_path'].'/'.$data3[$file_name]);
               }
           }
       }
        redirect('admin/dashboard/profile');
    }
    function  update_profile_c()
    {
        $rules=$this->profile_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {

            if(!$this->profile_m->update_profile())
            {
                $this->session->set_flashdata('error', 'Updated unsuccessful');
            }
            redirect('admin/dashboard/profile');
        }

    }


}