<?php
class User_m extends MY_Model
{
	protected $_table_name = 'users_log';
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
            if($user->status=='active') {
                $data = array(
                    'email' => $user->email,
                    'id' => $user->id,
                    'f_name' => $usere->F_name,
                    'l_name' => $user->L_name,
                    'loggedin' => TRUE,
                    'role' => $user->role
                );
                $this->session->set_userdata($data);
            }
            else
            {
                $this->session->set_flashdata('error', 'Your account need to be activated.');
                return 'activate_needed';
            }
		}
		else
            $this->session->set_flashdata('error', 'Invalid Email or Password');
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
	public  function register_m($code)
    {
         $result=FALSE;
         $this->_primary_key='email';
         $email=$this->input->post('email');

         $user=(array)$this->get($email,TRUE);
        // var_dump($user);
         $this->_primary_key='id';
       if(count((array) $user))
        {
            if ($user['status']!='active')
                $this->session->set_flashdata('active_error', 'This account isn\'t verified yet.');
            else
                 $this->session->set_flashdata('registered_error', 'This email is already registered');
        }
        else
        {

            $data=array(
                'email'=>$email,
                'password'=>$this->hash($this->input->post('password')),
                'role'=>'user',
                'status'=>'',
                'F_name'=>'',
                'L_name'=>'',
                'd_birth'=>'0000-00-00',
                'gender'=>'',
                'country'=>'',
                'Address'=>'',
                'profile_photo'=>'',
                'cover_photo'=>'',
                'verify'=>$code,
                'contact_no'=>''
            );
            if(!$result = $this->save($data))
            {
                $this->session->set_flashdata('error', 'Failed to create account.');
            }
            else
            $this->session->set_flashdata('success', 'Your account has been created. Please check your email.');
            return $result;
        }
    }
   public function activate_m()
   {
       $code=$this->uri->segment(5);
       $user=(array)$this->get($this->uri->segment(4),TRUE);
       if(count((array) $user))
       {
           if($user['status']!='active' && $user['verify']== $code)
           {
               $data=array(
                   'status'=>'active',
                   'verify'=>''
               );
               if($this->save($data,$this->uri->segment(4)))
               {
                   $this->session->set_flashdata('success', 'Your Account is Activated.');
                   return TRUE;
               }
               else
               $this->session->set_flashdata('not_active_error', 'Your Account cant\'t be activated.');
           }
           else if ($user['status'] == 'active')
           {
               echo $user['status'];
               $this->session->set_flashdata('already_active_error', 'Your Account already active.');
           }
           
       }
       return FALSE;

   }
   public function re_send_email_m($code)
   {
       $this->_primary_key='email';
       $email=$this->input->post('email');
       $user=(array)$this->get($email,TRUE);
       $this->_primary_key='id';
       $data=array(
           'status'=>$code
       );
       $id=NULL;
       if(count((array) $user))
       {
           if($user['status']!='active')
           {
               if($this->save($data,$user['id']))
                   $id = $user['id'];
           }
       }
       return $id;
   }

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}
