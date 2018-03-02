<?php
	class waterintaketab extends CI_Model {


		function insertWaterIntake($data=array()){
			$this->db->where('userid', $this->session->userdata('userid'));
			// $this->db->where('dateStartOfRecom', $this->session->userdata('dateStartOfRecom'));
			$query = $this->db->insert('waterintake', $data);
    	   	return $query;
		}

		function getWaterIntake(){
			$this->db->select('*');
			$this->db->from('waterintake');
			$this->db->where('userid', $this->session->userdata('userid'));
			$this->db->order_by('dateOfIntake', 'asc');
			$query = $this->db->get();
        	return $query->result_array();
		}
		
	}

?>