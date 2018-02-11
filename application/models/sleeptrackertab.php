<?php
	class sleeptrackertab extends CI_Model {


		function insertSleepTracker($data=array()){
			$query = $this->db->insert('sleeptracker', $data);
    	   	return $query;
		}

		
	}

?>