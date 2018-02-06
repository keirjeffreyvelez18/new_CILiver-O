<?php
	class results_tab extends CI_Model {

    	function __construct(){
        	parent::__construct();
    	}

    	function getResult(){
            $this->db->select('qresults');
            $this->db->from('assessment');
            $this->db->where('userid', $this->session->userdata('userid'));
            $query = $this->db->get();
            return $query->result_array();
        }

    }

?>