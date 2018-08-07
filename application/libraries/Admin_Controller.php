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
            'admin/user/logout'
        );
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->user_m->loggedin() == FALSE) {
                redirect('admin/user/login');
            }
        }
	}
    public function do_upload($config, $input_name=array())
    {
        $data=array();
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        //extract($input_name);
        $this->load->library('upload', $config);
        $i=0;
        foreach ($input_name as $file_name)
        {

            //echo $file_name."</br>";
            if ( ! $this->upload->do_upload($file_name))
            {
                $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error);
                // $this->load->view('upload_form', $error);
            }

            else
            {

                $data[$file_name]=$this->upload->data();
            }

        }
        return $data;
    }


}