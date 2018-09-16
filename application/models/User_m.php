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
               // $result['success']='admin/dashboard';
            }
            else
             $result['error']='Your account has\'t activate yet.</br>
             <a href="#resend_mail_modal" class="modal-trigger" style="color: red !important;"> haven\'t recieved activation mail?</a>';
		}
        else
         $result['error']='Invalid Email or Password';
         return $result;
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
         $this->_primary_key='email';
         $email=$this->input->post('email');
         $user=(array)$this->get($email,TRUE);
         $this->_primary_key='id';
       if(count((array) $user))
        {
            if ($user['status']!='active')
               $result['error']['active']='This acount isn\'t activate yet.' ;
            else
               $result['error']['register'] ='An account is already registered.';
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
            if(!$id=$this->save($data))
             $result['error']['error']='Technical problem.';
            else
             return $id;
        }
         return $result;
    }
   public function activate_m()
   {
       
       $code=$this->uri->segment(5);
       $this->_primary_key='email';
       $email=$this->uri->segment(4);
       $email=urldecode($email);
       $user=(array)$this->get($email,TRUE);
       $this->_primary_key='id';
       if(count((array) $user))
       {
          
           if($user['status']!='active' && $user['verify']== $code)
           {
               $data=array(
                   'status'=>'active',
                   'verify'=>''
               );
               if($this->save($data,$user['id']))
                   $result['success']='Your account is Activated';
               else
               $result['error']='Technical problem.';
           }
           else
               $result['error']='Invalid activation link';
       }
       else
       $result['error']='Invalid activation link';
       return $result;

   }
   public function re_send_email_m($code)
   {
       $this->_primary_key='email';
       $email=$this->input->post('email');
       $user=(array)$this->get($email,TRUE);
       $this->_primary_key='id';
       $data=array(
           'verify'=>$code
       );
       if(count((array) $user))
       {
           if($user['status']!='active')
           {
               if($this->save($data,$user['id']))
                  return true;
           }
       }
       return false;
   }

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}
