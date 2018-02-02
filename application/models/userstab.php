<?php
	class userstab extends CI_Model {

    	function __construct(){
        	parent::__construct();
    	}

    	function users(){
    		$this->db->select('*');
            $this->db->from('users');
            $query = $this->db->get();
        	return $query->result();
    	}

    	function insert_user($datainsert = array()){
    	   $query = $this->db->insert('users', $datainsert);
    	   return $query;
        }

    	function delete_user($userid = 0){
    		$sql = "DELETE FROM users WHERE userid = ?";
    		$query = $this->db->query($sql, $userid);
    		return $query;
    	}

        function update_username($dataupdate = array()){
                $this->db->set('email', $dataupdate['email']);
                $this->db->where('userid', $dataupdate['userid']);
                $query = $this->db->update('users');
                return $query;
        }

        function update_password($dataupdate = array()){
            if ($dataupdate['password']==$dataupdate['password2']) {
                $this->db->set('password', $dataupdate['password']);
                $this->db->set('password2', $dataupdate['password2']);
                $this->db->where('userid', $dataupdate['userid']);
                $query = $this->db->update('users');
                return $query;            }
        }

        function update_name($dataupdate = array()){
            $this->db->set('username', $dataupdate['name']);
            $this->db->where('userid', $dataupdate['userid']);
            $query = $this->db->update('users');
            return $query;
        }

        function update_dob($dataupdate = array()){
            $this->db->set('birthday', $dataupdate['birthday']);
            $this->db->where('userid', $dataupdate['userid']);
            $query = $this->db->update('users');
            return $query;
        }

        function update_gender($dataupdate = array()){
            $this->db->set('gender', $dataupdate['gender']);
            $this->db->where('userid', $dataupdate['userid']);
            $query = $this->db->update('users');
            return $query;
        }

        function login_user($email, $password){

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email like binary', $email);
            $this->db->where('password like binary', $password);
            $query = $this->db->get('');

            if($query->num_rows()==1){
                $row= $query->row();
                $data=array(
                    'userid'=>$row->userid,
                    'username'=>$row->username,
                    'email'=> $row->email,
                    'password'=>$row->password,
                    'birthday'=>$row->birthday,
                    'gender'=>$row->gender,
                );
                return $data;
            }
        }
    }
?>
