<?php
class User_M extends MY_Model
{
	
	protected $_table_name = 'users_log';
	protected $_order_by = 'id';
	public $rules = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);

	function __construct ()
	{
		parent::__construct();
	}

	public function login ()
	{
	   // echo $this->input->post('email');
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password'))
		), TRUE);
		if (count((array)$user)) {
			// Log in user
            $this->db->select(array('F_name','L_name'));
            $this->db->from('profile');
            $this->db->join('users_log', 'users_log.id = profile.l_id');
            $name = $this->db->get()->row();
			$data = array(
				'email' => $user->email,
				'id' => $user->id,
				'name' => $name->F_name ." ". $name->L_name,
				'loggedin' => TRUE
			);
            $this->session->set_userdata($data);
		}
	}

	public function logout ()
	{
        session_destroy();
	}

	public function loggedin ()
	{
	    if($this->session->has_userdata('loggedin'))
        {
            return TRUE;
        }
	    return FALSE;
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}