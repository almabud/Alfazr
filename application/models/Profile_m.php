<?php
/**
 * Created by PhpStorm.
 * User: Almabud Sohan
 * Date: 05-Aug-18
 * Time: 11:19 PM
 */

class Profile_m extends MY_Model
{
    protected $_table_name = '';
    protected $_order_by = 'id';
    public $rules = array(
        'F_name' => array(
            'field' => 'f_name',
            'label' => 'First Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'L_name' => array(
            'field' => 'l_name',
            'label' => 'Email',
            'rules' => 'trim|required|xss_clean'
        ),
        'country' => array(
            'field' => 'country',
            'label' => 'Country',
            'rules' => 'trim|required|xss_clean'
        ),
        'contact_no' => array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'trim|required|xss_clean'
        ),
        'Address' => array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'trim|required|xss_clean'
        )
    );
    public function __construct()
    {
        parent::__construct();
    }
    public function get_profile_data()
    {
        $this->_table_name= 'users_log';
        $u_profile = $this->get($this->session->userdata('id'),TRUE);
        return (array) $u_profile;
    }
    public  function do_upload_photo($file_data=array(),$id=null)
    {
        $this->_table_name= 'users_log';
        $this->_primary_key='id';
        return ( $this->save($file_data,$id));

    }
    public  function get_photo_data($id)
    {
        $this->_primary_key='id';
        $this->_table_name='user_log';
        $u_profile = $this->get($id);
        return $u_profile;

    }
    public function  update_profile()
    {
        $this->_table_name='users_log';
        $this->_primary_key='id';
        $data=array(
            'F_name'=>$this->input->post('f_name') != null ? $this->input->post('f_name') : '' ,
            'L_name'=>$this->input->post('l_name') != null ? $this->input->post('l_name') : '',
            'contact_no'=>$this->input->post('contact_no') != null ? $this->input->post('contact_no') : '',
            'country'=>$this->input->post('country') != null ? $this->input->post('country') : '',
            'Address'=>$this->input->post('address') != null ? $this->input->post('address') : '',
            'gender'=>$this->input->post('gender') != null ? $this->input->post('gender') : '',
            'd_birth'=>$this->input->post('d_birth') != null ? $this->input->post('d_birth') : '0000-00-00',
            'contact_no'=>$this->input->post('contact_no') != null ? $this->input->post('contact_no') : ''
        );
       return  $this->save($data,$this->uri->segment(4));
    }

}
