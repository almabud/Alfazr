<?php

class Hotel_m extends MY_Model{
    public $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'Address' => array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'trim|xss_clean'
        ),
        'about' => array(
            'field' => 'about',
            'label' => 'About',
            'rules' => 'trim'
        )
    );

   public function __construct()
   {
       parent::__construct();
   }
   public function get_all_hotel_data($id=null, $single=FALSE)
    {
        if($id == null)
        {
             $this->db->where('status', 'active');
             $this->db->order_by('id', 'DESC');
             return $this->db->get('hotels')->result();
        }
        else
        {
            $this->_table_name='hotels';
            $this->_primary_key='id';
            return $this->get($id,$single);
        }
       
    }

    public function add_hotel_m()
    {
        $data=array(
            'name'=>$this->input->post('name'), 
            'Address'=>$this->input->post('address'), 
            'about'=>$this->input->post('about'),
            'status'=>'active'
        );
        $this->_table_name='hotels';
        return $this->save($data);
    }
    public function edit_hotel_m($id)
    {
        $data=array(
            'name'=>$this->input->post('name'), 
            'Address'=>$this->input->post('address'), 
            'about'=>$this->input->post('about')
        );
        $this->_table_name='hotels';
		return $this->save($data,$id);
    }
    public function dlt_room_photo($id)
    {
       $this->_table_name='room_photo_table';
       return $this->delete($id);
    }
    public function dlt_hotel_m()
    {
        $id=$this->input->post('id');
        $data=array(
            'status' => 'disable'
        );
        $this->_table_name='hotels';
        return $this->save($data,$id);
    }
    public function add_room_photo_m($id,$img)
    {
        $this->_table_name='room_photo_table';
        $data=array(
            'room_photo'=>$img, 
            'hotel_id'=>$id
        );
		return $this->save($data);

    }
    public function get_room_photo_dlt($hotel_id=null)
    {
        $sql="select * from room_photo_table rp where rp.hotel_id='".$hotel_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
