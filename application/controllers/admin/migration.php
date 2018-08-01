<?php
class Migration extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
	}

	public function index ()
	{
		$this->load->library('migration');
		if (! $this->migration->current()) {
			show_error($this->migration->error_string());
		}
		else {
			echo 'Migration worked!';
		}
       /* $this->db = $this->load->database('default',TRUE);

        if(!empty($this->db))
            echo "Connected!"."\n";
        else
            echo "Closed"."\n";*/
	
	}

}