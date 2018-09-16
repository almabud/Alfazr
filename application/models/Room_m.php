<?php

class Room_m extends MY_Model{
    public $rules = array(
        'hotel_id' => array(
            'field' => 'select_hotel',
            'label' => 'Hotel',
            'rules' => 'trim|required|xss_clean'
        ),
        'room_type' => array(
            'field' => 'select_room_type',
            'label' => 'Room type',
            'rules' => 'trim|required|xss_clean'
        ),
        'price_p_night' => array(
            'field' => 'price_p_night',
            'label' => 'Price per night',
            'rules' => 'trim|required|numeric|xss_clean',
            'errors' => array('numeric' => "This field must contain numeric value. ")
        ),
        'offer_agent' => array(
            'field' => 'offer_agent',
            'label' => 'Offer for Agent',
            'rules' => 'trim|numeric|xss_clean',
            'errors' => array('numeric' => "This field must contain numeric value. ")
        ),
        'offer_cus' => array(
            'field' => 'offer_cus',
            'label' => 'Offer for Customer',
            'rules' => 'trim|numeric|xss_clean',
            'errors' => array('numeric' => "This field must contain numeric value. ")
        ),
        'total_room' => array(
            'field' => 'total_room',
            'label' => 'Available Rooms',
            'rules' => 'trim|required|integer|xss_clean',
            'errors' => array('numeric' => "This field must contain integer value. ")
        ),
        'about' => array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'trim|xss_clean'
        )
    );

   public function __construct()
   {
       parent::__construct();
   }
   public function get_all_room_data_m($id=null, $single=FALSE)
    {
        if($id != null)
        {
            $sql="select * from hotels h, rooms r where(h.id=r.hotel_id and r.id='$id') order by r.id DESC";
            $query = $this->db->query($sql);
            return $query->row();
        }
        else
        {
        $sql="select * from hotels h, rooms r where(h.id=r.hotel_id) order by r.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
        }
       
    }
    public function dlt_room_m()
    {
       $this->_table_name='rooms';
       $id=$this->input->post('id');
       return  $this->delete($id);
    }
    public function add_room_m($data)
    {
        $this->_table_name='backup_rooms';
        $this->save($data);
        $this->_table_name='rooms';
		return $this->save($data);
    }
    public function edit_room_m($data,$id)
    {
        $this->_table_name='backup_rooms';
        $this->save($data,$id);
        $this->_table_name='rooms';
		return $this->save($data,$id);
    }

  }
