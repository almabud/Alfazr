<?php
class Admin_Controller extends MY_Controller
{
    public $dd=array(
        'upload_path'=>'',
        'allowed_types'=>'',
        'max_size'=>'100',
        'max_width'=>'1024',
        'max_height'=>'768'
    );
    function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_m');

        $exception_uris = array(
            'admin/user/login',
            'admin/user/logout',
            'admin/user/register',
            rtrim('admin/user/activate/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'//'),
            rtrim('admin/user/re_send_email/'.$this->uri->segment(4),'/')

        );
       // var_dump( rtrim('admin/user/activate/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'//'));
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->user_m->loggedin() == FALSE) {
                //redirect('admin/user/login');
            }
        }
	}
    public function do_upload($config, $input_name)
    {
        $data=array();
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        //extract($input_name);
        $this->load->library('upload', $config);
            //echo $file_name."</br>";
            if ( ! $this->upload->do_upload($input_name))
            {
                $error = array('error' => $this->upload->display_errors());
               // var_dump($input_name);
                    $this->session->set_flashdata('error', $error);
                   // echo $this->upload->display_errors();
            }

            else
            {
                $data[$input_name]=$this->upload->data();
            }
        return $data;
    }

    public function send_mail($email,$message)
    {
        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        //$config['mailpath'] = '/usr/sbin/sendmail';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'chair2180@gmail.com';
        $config['smtp_pass'] = 'bd464258';
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = FALSE;
        $config['bcc_batch_size'] = 200;
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject('Signup Verification Email');
        $this->email->message($message);
        if($this->email->send()){
            $this->session->set_flashdata('success','Activation code sent to email');
            return TRUE;
        }
        else{
            $this->session->set_flashdata('error', 'Sorry Technical problem');
            return FALSE;
            //  $this->email->print_debugger();
        }
    }


}
