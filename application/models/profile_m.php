<?php
/**
 * Created by PhpStorm.
 * User: Almabud Sohan
 * Date: 05-Aug-18
 * Time: 11:19 PM
 */

class Profile_M extends MY_Model
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
        $this->_table_name= 'profile';
        $u_profile = $this->get_by(array(
            'l_id' => $this->session->userdata('id')
        ), TRUE);
        $this->db->select(array('user_photo.id','activity','img','file_type'));
        $this->db->from('user_photo');
        $this->db->join('profile', 'user_photo.pro_id = profile.id');
        $photos = $this->db->get()->result();
        if(count((array)$u_profile))
        {
            $data=array(
                'f_name'=>$u_profile->F_name,
                'l_name'=>$u_profile->L_name,
                'd_birth'=>$u_profile->d_birth,
                'gender'=>$u_profile->gender,
                'country'=>$u_profile->country,
                'role'=>$u_profile->Role,
                'address'=>$u_profile->Address,
                'id'=>$u_profile->id,
                'photos'=>$photos
            );
        }
        return $data;
    }
    public  function do_upload_photo($file_data=array(),$id=null)
    {
        $this->_table_name= 'user_photo';
        $this->_primary_key='id';
        return $this->save($file_data,$id);

    }
    public  function get_photo_data($id)
    {
        $this->_primary_key='pro_id';
        $this->_table_name='user_photo';
        $u_profile = $this->get($id);
        return $u_profile;

    }
    public function  update_profile()
    {
        $this->_table_name='profile';
        $data=array(
            'F_name'=>$this->input->post('f_name'),
            'L_name'=>$this->input->post('l_name'),
            'country'=>$this->input->post('country'),
            'Address'=>$this->input->post('address')
        );
        return $this->save($data,$this->uri->segment(4));
    }

}
