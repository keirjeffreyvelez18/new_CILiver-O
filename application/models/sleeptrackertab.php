<?php
	class sleeptrackertab extends CI_Model {


		function insertSleepTracker($data=array()){
			$query = $this->db->insert('sleeptracker', $data);
    	   	return $query;
		}

		function getSleepingRecords(){
			$this->db->select('*');
			$this->db->from('sleeptracker');
			$this->db->where('userid', $this->session->userdata('userid'));
			$this->db->order_by('dateOfSleep', 'asc');
			$query = $this->db->get();
        	return $query->result_array();
		}
	}

?>