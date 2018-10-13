<?php
class Rooms extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('profile_m');
        $this->load->model('hotel_m');
        $this->load->model('room_m');

    }
    public function index() {
        if(!$this->user_m->loggedin())
            redirect('admin/user/login');
       $this->data= $this->profile_m->get_profile_data();
        $this->load->view('admin/room_page', $this->data);
    }
     public function show_room_content()
    {
       $data = $this->load->view('admin/show_rooms_page');
        echo json_encode($data);
    }
    public function get_room_data()
    {
        $id = $this->input->post('id');
        if($id != null)
        {
            $data= $this->room_m->get_all_room_data_m($id,TRUE);
        }
        else
        {
            $data= $this->room_m->get_all_room_data_m();
        }
        echo json_encode($data);
    }
    public function dlt_room()
         {
            $id = $this->input->post('id');
            $data=array(
                'status' => 'disable'
            );
            
             echo json_encode($this->room_m->dlt_room_m($data,$id));
         }
    public function add_room_content()
    {
        $data['hotel_information']= $this->hotel_m->get_all_hotel_data();
        $result = $this->load->view('admin/room_content_page',$data);
        echo json_encode($result);
    }
    public function add_room()
    {
        $response=array();
        $rules=$this->room_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE)
        {
            $data=array(
                'hotel_id'=> $this->input->post('select_hotel'),
                'room_type'=> $this->input->post('select_room_type'),
                'per_night_price'=> $this->input->post('price_p_night'),
                'offer_agent' => $this->input->post('offer_agent'),
                'offer_local_cus' => $this->input->post('offer_cus'),
                'available_rooms' => $this->input->post('total_room'),
                'about' => $this->input->post('about'),
                'status' => 'active'
            );
            if($data=$this->room_m->add_room_m($data))
                $response["success"]= $data;
        }
        else{
            $response["error"]=array(
                'price_p_night'=>form_error('price_p_night'),
                'select_hotel'=>form_error('select_hotel'),
                'select_room_type'=>form_error('select_room_type'),
                'price_p_night'=>form_error('price_p_night'),
                'offer_agent'=>form_error('offer_agent'),
                'offer_cus'=>form_error('offer_cus'),
                'total_room'=>form_error('total_room')
            );
        }
        echo json_encode($response);
    }
    public function edit_room_content()
    {
        $data['hotel_information']= $this->hotel_m->get_all_hotel_data();
        $result = $this->load->view('admin/room_content_page',$data);
        echo json_encode($result);
    }
    public function edit_room()
    {
        $rules=$this->room_m->rules;
        $this->form_validation->set_rules($rules);
        $id = $this->input->post('id');
        if ($this->form_validation->run() == TRUE)
        {
            $data=array(
                'hotel_id'=> $this->input->post('select_hotel'),
                'room_type'=> $this->input->post('select_room_type'),
                'per_night_price'=> $this->input->post('price_p_night'),
                'offer_agent' => $this->input->post('offer_agent'),
                'offer_local_cus' => $this->input->post('offer_cus'),
                'available_rooms' => $this->input->post('total_room'),
                'about' => $this->input->post('about')
            );
            if($data=$this->room_m->edit_room_m($data,$id))
              $response["success"]= $data;
             // echo json_encode($id);
        }
        else{
            $response["error"]=array(
                'price_p_night'=>form_error('price_p_night'),
                'select_hotel'=>form_error('select_hotel'),
                'select_room_type'=>form_error('select_room_type'),
                'price_p_night'=>form_error('price_p_night'),
                'offer_agent'=>form_error('offer_agent'),
                'offer_cus'=>form_error('offer_cus'),
                'total_room'=>form_error('total_room')
            );
        }
        echo json_encode($response);
    }
    
}



//    
//     public function get_hotel_photo()
//     {
//         $id = $this->input->post('id');
//         $data= $this->hotel_m->get_room_photo_dlt($id);
//         echo json_encode($data);
//     }
//     public function edit_hotel()
//     {
//         $path = realpath(".");
//         $path .= "/images/hotels_photo"; 
//         $config['upload_path'] =$path;
//         $config['allowed_types'] = 'gif|jpg|png';
//         $config['max_size'] = 2048;
//         $config['max_width']  = 1920;
//         $config['max_height'] = 1080;
//         $rules=$this->hotel_m->rules;
//         $this->form_validation->set_rules($rules);
//         $id = $this->input->post('id');
//         $dlt_photo_data = json_decode($this->input->post('dlt_photo'), true);
//         if ($this->form_validation->run() == TRUE)
//           {
//             if($id=$this->hotel_m->edit_hotel_m($id))
//             {
//                 if(!empty($dlt_photo_data))
//                 {
//                      foreach($dlt_photo_data as $key => $value)
//                     {
//                         if($this->hotel_m->dlt_room_photo($value['id']))
//                         {
//                            unlink($path."/".$value['photo_name']);
//                         }
//                     }
//                 }
//                 if (!empty($_FILES)) 
//                 {
//                     $file_count = count($_FILES['files']['name']);
//                     for($i=0; $i<$file_count; $i++)
//                     {
//                         $_FILES['file']['name']     = $_FILES['files']['name'][$i];
//                         $_FILES['file']['type']     = $_FILES['files']['type'][$i];
//                         $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
//                         $_FILES['file']['error']     = $_FILES['files']['error'][$i];
//                         $_FILES['file']['size']     = $_FILES['files']['size'][$i];
//                         if($data=($this->do_upload($config,'file'))['file']['file_name'])
//                         {
//                             if(!$this->hotel_m->add_room_photo_m($id,$data))
//                             {
//                                 unlink($path."/".$data);
//                             }
//                         }
//                     }
//                 }
//             }
//           }
//      echo json_encode("success");
//      }
//     
//      public function room_list() {
//         if(!$this->user_m->loggedin())
//             redirect('admin/user/login');
//         $data['hotel_information']= $this->hotel_m->get_all_hotel_data();
//         $this->load->view('admin/room_page', $data);
//     }
//     public function get_room_data()
//     {
//         echo json_encode($this->hotel_m->get_all_room_data_m());
//     }
//     public function add_hotel(){
//         $response=array();
//         $path = realpath(".");
//         $path .= "/images/hotels_photo"; 
//         $config['upload_path'] =$path;
//         $config['allowed_types'] = 'gif|jpg|png';
//         $config['max_size'] = 2048;
//         $config['max_width']  = 1920;
//         $config['max_height'] = 1080;
//         $rules=$this->hotel_m->rules;
//         $this->form_validation->set_rules($rules);
//         if ($this->form_validation->run() == TRUE)
//         {
//             if (!empty($_FILES)) 
//             {
//                 $file_count = count($_FILES['files']['name']);
//                 if($id=$this->hotel_m->add_hotel_m())
//                 {
//                     for($i=0; $i<$file_count; $i++)
//                     {
//                         $_FILES['file']['name']     = $_FILES['files']['name'][$i];
//                         $_FILES['file']['type']     = $_FILES['files']['type'][$i];
//                         $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
//                         $_FILES['file']['error']     = $_FILES['files']['error'][$i];
//                         $_FILES['file']['size']     = $_FILES['files']['size'][$i];
//                         if($data=($this->do_upload($config,'file'))['file']['file_name'])
//                         {
//                         if(!$this->hotel_m->add_room_photo_m($id,$data))
//                             {
//                                 unlink($path."/".$data);
//                             }
//                         }
//                     }
//                 }
//                 else{
//                     //echo json_encode('failed');
//                 }
//             }
//         }
//     }
//     public function get_room_photo()
//     {
//         $id = $this->input->post('id');
//         $room_photo = $this->hotel_m->get_room_photo_dlt(null,$id);
//         echo json_encode($room_photo);
//     }

//     public function edit_room()
//     {
//         if(!$this->user_m->loggedin())
//         redirect('admin/user/login');
//         $this->data= $this->profile_m->get_profile_data();
//         $this->load->view('admin/edit_room_page', $this->data);
//     }

//     public function dlt_rooms()
//     {
//         $path = realpath(".");
//         $path .= "/images/hotels_photo"; 
//         $id = $this->input->post('id');
//         $room_photo = $this->hotel_m->get_room_photo_dlt(null,$id);
//         if($data = $this->hotel_m->dlt_room_m($id))
//         {
//             foreach($room_photo as $value)
//             {
//                 unlink($path.'/'.$value->room_photo);
//             }
//         }
//         echo json_encode($data);
//     }

//     ///Froala image uploader--------------------
//     public function froala_image_upload()
//     {
//         $path = realpath(".");
//         $path .= "/images/froala_image"; 
//         $config['upload_path'] =$path;
//         $config['allowed_types'] = 'gif|jpg|png';
//         $config['max_size'] = 2048;
//         $config['max_width']  = 1920;
//         $config['max_height'] = 1080;
//         $photo=($this->do_upload($config,'file'))['file']['file_name'];
        
//         $response = new StdClass;
//         $response->link = base_url()."images/froala_image/" . $photo;
//         echo stripslashes(json_encode($response));

//     }
//     public function froala_image_dlt()
//     {   
//         $path = realpath(".");
//         $path .= "/images/froala_image/"; 
//         $photo_dir= $this->input->post('src');
//         $photo_dir=explode ('/', $photo_dir);
//         if(unlink($path.$photo_dir[7]))
//             echo stripslashes(json_encode($photo_dir));

//     }

//     //------------------------------------------------------
  
// }
