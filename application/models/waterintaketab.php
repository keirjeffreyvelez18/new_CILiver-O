<?php
	class userstab extends CI_Model {
		function insertWaterIntake($data=array()){
			$query = $this->db->insert('waterintake', $data);
    	   	return $query;
		}
	}
?>