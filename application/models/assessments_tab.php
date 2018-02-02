<?php
    class assessments_tab extends CI_Model {

        function __construct(){
            parent::__construct();
        }

        function updateTaken($data = array()){
            $this->db->set('qTaken', json_encode($data['qTaken']));
            $this->db->where('userid', $this->session->userdata('userid'));
            $query = $this->db->update('users');
            return $query;
        }
        
        function ins_assessment($category=""){
            $qAns = array(
                0 => 0
            );
            $qresults = array(
                '' => 0
            );
            $assess = array(
                'answers' => json_encode($qAns),
                'qresults' => json_encode($qresults),
                'dateTaken' => date('Y-m-d'),
                'dtStart' => date('Y-m-d H:i:s'),
                'userid' => $this->session->userdata('userid'),
                'refNo' =>  $this->session->userdata('userid').date('mdY').trim($category),
                'category' => $category
            );
            return $this->db->insert('Assessment',$assess);

        }

        function upd_assessment($qAns="", $refNo="",$dtFinal="", $qresults=""){
            $this->db->set('answers', $qAns);
            $this->db->set('qresults',$qresults);
            $this->db->set('dtFinal', $dtFinal);
            $this->db->where('refNo', $refNo);
            $query = $this->db->update('Assessment');
            return $query;
        }

        function get_assessment($userid=0, $category=""){
            $this->db->select('*');
            $this->db->from('Assessment');
            $this->db->where('userid', $userid);
            $this->db->where('category', $category);
            $this->db->order_by('dtStart','DESC');
            $this->db->limit(1);
            $query = $this->db->get();
            return $query;
        }

        function updatebmi($data = array()){
            $this->db->set('height', $data['height']);
            $this->db->set('weight', $data['weight']);
            $this->db->where('userid', $this->session->userdata('userid'));
            $query = $this->db->update('users');
            return $query;
        }

        function getbmi(){
            $this->db->select('weight');
            $this->db->select('height');
            $this->db->from('users');
            $this->db->where('userid', $this->session->userdata('userid'));
            $query = $this->db->get();
            return $query->result_array();
        }

        function getTaken($userid=0){
            $this->db->select('qTaken');
            $this->db->from('users');
            $this->db->where('userid', $userid);
            $query = $this->db->get();
            return $query->result_array();
        }

        function question($qIndex = 0){
            $this->db->select('*');
            $this->db->from('questions');
            $this->db->where('qIndex', $qIndex);
            $query = $this->db->get();
            return $query->result();
        }

        function get_questions_by($num1 = 4, $num2 = 0){
            $this->db->select('*');
            $this->db->from('questions');
            if ($num1 <= 4) {
                $this->db->where('qIndex <=', $num1);
            }elseif ($num1 > 4) {
               $this->db->where('qIndex >=', $num1);
               $this->db->where('qIndex <=', $num2);
            }
            $this->db->order_by('qIndex');
            $query = $this->db->get();
            if($query){
                return $query->result();
            }
            
        }

        function get_all_questions(){
            $this->db->select('*');
            $this->db->from('questions');
            $this->db->order_by('qIndex');
            $query = $this->db->get();
            return $query->result();
        }

        function get_questionId(){
            $this->db->select('qIndex');
            $this->db->from('questions');
            $query = $this->db->get();
            if ($query!=""){
                return $query->row()->qIndex;
            }
        }

        function get_last(){
            $this->db->select('qIndex');
            $this->db->from('questions');
            $query = $this->db->get();
            if ($query!=""){
                return $query->num_rows();
            }
        }
    }

?>