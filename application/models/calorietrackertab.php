<?php
	class calorietrackertab extends CI_Model {


		function insertCalorieIntake($data=array()){
			$query = $this->db->insert('calorietracker', $data);
    	   	return $query;
		}

		function getCalorieIntake(){
			$this->db->select('*');
			$this->db->from('calorietracker');
			$this->db->where('userid', $this->session->userdata('userid'));
			$this->db->order_by('dateOfIntake', 'asc');
			$query = $this->db->get();
        	return $query->result_array();
		}
	}

?>