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
            'rules' => 'trim|xss_clean'
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

    public function add_hotel_m($photo)
    {
        $this->_table_name='hotels';
        $data=array(
            'name'=>$this->input->post('name'), 
            'Address'=>$this->input->post('address'), 
            'about'=>$this->input->post('about'),
            'hotel_photo'=>$photo
        );
		return $this->save($data);

    }
    public function edit_hotel_m($photo,$id)
    {
        $this->_table_name='hotels';
        $data=array(
            'name'=>$this->input->post('name'), 
            'Address'=>$this->input->post('address'), 
            'about'=>$this->input->post('about'),
            'hotel_photo'=>$photo
        );
		return $this->save($data,$id);
    }
    public function dlt_hotel_m()
    {
        $this->_table_name='hotels';
       $id=$this->input->post('id');
       return  $this->delete($id);
    }
}
