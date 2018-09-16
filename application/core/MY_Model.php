<?php
class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_order_by_what='id';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    public function get($id = NULL, $single = FALSE){

        if ($id != NULL) {
            /*$filter = $this->_primary_filter;
            $id = $filter($id);*/
            $this->db->where($this->_primary_key, $id);
        }
        if($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }

        if($this->_order_by!='') {
            $this->db->order_by($this->_order_by_what, $this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE){
        $this->db->where($where);
        return $this->get(NULL, 'TRUE');
    }

    public function save($data=array(), $id = NULL){

        // Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            if($id==NULL)
                $data['created'] = $now;
            else
                $data['modified'] = $now;
        }
        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            //var_dump($this->_table_name);
            $id = $this->db->insert_id();
            // $error = $this->db->error();
            // var_dump($error);
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name,$data);
          // var_dump($data);
        }
        return $id;
    }

    public function delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
        return TRUE;
    }
}
