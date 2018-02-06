<?php
	class questionstab extends CI_Model {

    	function __construct(){
        	parent::__construct();
    	}

    	function questions(){
    		$sql = 'SELECT * FROM questions ORDER BY questionId';
    		$query = $this->db->query($sql);
        	return $query->result();
    	}

    	function insert_question($qIndex, $datainsert = ""){
    		$sql = "INSERT INTO questions (qIndex,qAndA) VALUES (?,?)";
    		$query = $this->db->query($sql,array($qIndex, $datainsert));
        	return $query;
    	}

    	function delete_question($questionId = 0){
    		$sql = "DELETE FROM questions WHERE questionId = ?";
    		$query = $this->db->query($sql, $questionId);
    		return $query;
    	}

        function question($questionId = 0){
            $sql = 'SELECT * FROM questions WHERE questionId = ? ORDER BY questionId';
            $query = $this->db->query($sql, $questionId);
            return $query->result();
        }

        

        /*function update_user($dataupdate = array()){
             
            if ($dataupdate[2]==$dataupdate[3]) {
                $sql = "UPDATE users SET username = ?,email = ?,password = ?,password2 = ?,birthday = ?,gender = ? WHERE userid = ?";
                $query = $this->db->query($sql, $dataupdate);
                return $query;
            }else{
                echo "string";
            }
        }*/
    }

?>