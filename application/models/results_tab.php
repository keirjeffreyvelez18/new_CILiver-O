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

        function getRecommendation($category="", $scoreRange=""){
            $this->db->select('description');
            $this->db->from('recommendation');
            $this->db->where('scoreRange' , $scoreRange);
            $this->db->where('category' , $category);
            $query = $this->db->get();
            return $query->result_array()[0]['description'];
        }


        function getDomainResults($category="", $domain="" ,$status=""){
            $this->db->select('description');
            $this->db->from('domains');
            $this->db->where('category', $category);
            $this->db->where('domain', $domain);
            $this->db->where('status', $status);
            $query = $this->db->get();

            return $query->result_array()[0]['description'];
        }

        
    }

?>