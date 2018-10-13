<?php

class Payment_m extends MY_Model{
   public $rules = array(
        'guest_name' => array(
            'field' => 'full_name', 
            'label' => 'Full name', 
            'rules' => 'trim|required|xss_clean'
        ),
        'guest_email' => array(
            'field' => 'email', 
            'label' => 'Email', 
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'amount' => array(
            'field' => 'amount', 
            'label' => 'Amount', 
            'rules' => 'trim|required|xss_clean'
        ),
        'reff' => array(
            'field' => 'reff', 
            'label' => '#Reff', 
            'rules' => 'trim|required|xss_clean'
        )
    );

   public function __construct()
   {
       parent::__construct();
   }
   
   public function add_payment($data)
   {
    $this->_table_name = 'payment';
      return $this->save($data);
   }
   public function get_all_payment()
    {
      $this->_table_name = 'payment';
      $this->_order_by='DESC';
      $this->_primary_key = 'id';
      return $this->get();
    }
    public function payment_status_update($data, $id)
    {
      $this->_table_name = 'payment';
      $this->_primary_key = 'id';
       return $this->save($data, $id);
    }
    public function payment_validate_reservation($reff,$id)
    {
      $sql='select * from  payment p, reservation rs where p.id='.$id.' and rs.resrve_status="Pending" and rs.reff='.$reff;
            $query = $this->db->query($sql);
        return $query->row();
    }
    public function reservation_update($data,$id)
    {
      $this->_table_name = 'reservation';
      $this->_primary_key = 'id';
        return $this->save($data, $id);
    }
}
