<?php

class Reservation_m extends MY_Model{
   public $rules = array(
        'guest_name' => array(
            'field' => 'guest_name', 
            'label' => 'Geust Name', 
            'rules' => 'trim|required|xss_clean'
        ),
        'guest_email' => array(
            'field' => 'guest_email', 
            'label' => 'Guest Email', 
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'guest_contact' => array(
            'field' => 'guest_phone', 
            'label' => 'Guest Contact No', 
            'rules' => 'trim|required|xss_clean'
        ),
        'check_in' => array(
            'field' => 'check_in_date', 
            'label' => 'Check in date', 
            'rules' => 'trim|required|xss_clean'
        ),
         'check_out' => array(
            'field' => 'check_out_date', 
            'label' => 'Check out date', 
            'rules' => 'trim|required|xss_clean'
        ),
        'hotel_id' => array(
            'field' => 'select_hotel', 
            'label' => 'Select Hotel', 
            'rules' => 'trim|required|xss_clean'
        ),
        'quantity' => array(
            'field' => 'select_quantity', 
            'label' => 'Select Quantity', 
            'rules' => 'trim|required|xss_clean'
        )
    );

   public function __construct()
   {
       parent::__construct();
   }
   
   public function get_hotel_room($data=null,$id=null)
   {
      if($id == null && $data=='hotel')
        {
            $sql="select * from hotels h, rooms r where h.id = r.hotel_id and h.status='active' and r.available_rooms>0 and r.status='active'";
            $query = $this->db->query($sql);
        }
        else if($id != null && $data == 'room')
        {
            $sql="select * from rooms r where r.hotel_id='".$id."' and r.available_rooms>0 and r.status='active'";
            $query = $this->db->query($sql);
        }
         else if($id != null && $data == 'roomById')
        {
            $sql="select * from rooms r where r.id='".$id."'";
            $query = $this->db->query($sql);
        }
        return $query->result();
   }
    public function get_reservation_data()
   {
      //$sql="select * from rooms r, hotels h, user_log u, reservation rs where u.id = rs.profile_id and h.id = rs.hotel_id and r.id = rs.room_id";
     $sql="select * from reservation rs left join users_log u on rs.profile_id = u.id
          left join hotels h on rs.hotel_id = h.id
          left join rooms r on rs.room_id = r.id";
            $query = $this->db->query($sql);
        return $query->result();
   }
   public function add_reservation($data)
   {
    $this->_table_name = 'reservation';
      return $this->save($data);
   }
   public function account_balance($id=null,$single=false)
   {
    $this->_table_name = 'account_balance';
    $this->_primary_key = 'profile_id';
    return $this->get($id,$single);
   }
}
