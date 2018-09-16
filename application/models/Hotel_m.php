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
        $this->_table_name='hotels';
        $this->_primary_key='id';
        $this->_order_by='DESC';
        return $this->get($id,$single);
    }

    public function add_hotel_m()
    {
        $data=array(
            'name'=>$this->input->post('name'), 
            'Address'=>$this->input->post('address'), 
            'about'=>$this->input->post('about'),
        );
        $this->_table_name='backup_hotels';
        $this->save($data);
        $this->_table_name='hotels';
        return $this->save($data);
       // var_dump($this->save($data));

    }
    public function edit_hotel_m($id)
    {
        $data=array(
            'name'=>$this->input->post('name'), 
            'Address'=>$this->input->post('address'), 
            'about'=>$this->input->post('about')
        );
        $this->_table_name='backup_hotels';
        $this->save($data,$id);
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
        $this->_table_name='hotels';
       $id=$this->input->post('id');
       return  $this->delete($id);
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
