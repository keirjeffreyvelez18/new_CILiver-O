<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cldq extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
       	parent::__construct();
       	$this->load->model('assessments_tab');
       	$this->load->helper(array('form', 'url'));

   	}

	public function index(){
		$this->load->view('Assessment/cldq_view', $this->getAllData());
	}


	function getAllData(){
		$data['qcategory'] = "CLDQ";
		$data['title']='Assessment | CLiver-O';
		$data['qIndex'] = $this->assessments_tab->get_questionId();
		$data['questiontab'] = $this->assessments_tab->get_all_questions();
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['index']=1;
		$data['btn'] = "";
		$this->session->set_userdata('cur_uAns',$this->checkContent("CLDQ"));	
		$ans=$this->session->userdata('cur_uAns');
		$data['curAns'] = json_decode($ans['answers']);
		return $data;
	}
	
	function checkContent($qcategory=""){
		$assessCount = $this->db->query('select count(*) as norow from assessment where userid = ? AND category = ?',array($this->session->userdata('userid'),$qcategory))->row_array();
		
		if ($assessCount['norow']<=0) {
			$this->assessments_tab->ins_assessment($qcategory);
		}
		$userid = $this->session->userdata('userid');
		return $this->assessments_tab->get_assessment($userid, $qcategory)->row_array();
	}

	public function cldq_result(){
		$r = json_decode($this->assessments_tab->getResult()[0]['qresults'],true);

		$data = $this->getAllData();
		$data['qTaken']['sf36']=1;
		$data['qTaken']['blq']=0.5;

		$this->assessments_tab->updateTaken($data);

		if ($r['ave']>=75) {
			$this->load->view('Assessment/assessment_view', $this->getAllData());
		}else{
			$this->load->view('Assessment/assessment_view', $this->getAllData());
		}
	}

	public function show_cldq($qcategory="CLDQ"){

		$data= $this->getAllData();
		$a = $this->input->post('i');
		$data['qcategory'] = $qcategory;
		$btn = $this->input->post('submit');

		if ($btn=="Next") {
			$data['index']+=$a;
			$this->get_score();
			$data['btn'] = "animated fadeInRight";
		} elseif ($btn=="Back") {
			$data['index']=$a-1;
			$this->get_score();
			$data['btn'] = "animated fadeInLeft";
		}

		$this->session->set_userdata('cur_uAns',$this->checkContent($qcategory));	
		$ans=$this->session->userdata('cur_uAns');
		$data['curAns'] = json_decode($ans['answers']);
		
		$data['progress'] =1;
		if ($a=="") {
			$data['index']=1;
		}
		if($this->input->post('qIndex')!=0){
			$data['progress'] = ($data['index']/$this->input->post('qIndex'))*100;
		}	

		$data['result'] = $this->get_score();

		$this->load->view('Assessment/cldq_view', $data);
	}
	
	public function get_score($domain="", $ansScore="" ){

			if ($_POST) {
				$domain = $_POST['domain'];
				
				$ans= $_POST['ans'];
				
				$cur_ans = $this->session->userdata('cur_uAns');

				$domainScores = array(
					'as' => 0,
					'f' => 0,
					'ss' => 0,
					'a' => 0,
					'emf' => 0,
					'w' => 0
				);

				$qIndex = 0;
				$qAnsVal  = 0;

				foreach ($domain as $qIndex => $value) {
					if (isset($ans[$qIndex])) {
						$qAnsVal=$ans[$qIndex];
						$curAns[$qIndex]=$qAnsVal;
					}else{
						$qAnsVal = 0;
					}

					if ($qAnsVal>0) {
						switch ($domain[$qIndex]) {
							case 'as':
								$domainScores['as'] += $qAnsVal;
								break;
							case 'f':
								$domainScores['f'] += $qAnsVal;
								break;
							case 'ss':
								$domainScores['ss'] += $qAnsVal;
								break;
							case 'a':
								$domainScores['a'] += $qAnsVal; 
								break;
							case 'emf':
								$domainScores['emf'] += $qAnsVal;
								break;
							case 'w':
								$domainScores['w'] += $qAnsVal;
								break;
						}
				
					}
					
				}
				
				$ans=$this->session->userdata('cur_uAns');
				$result = $this->assessments_tab->upd_assessment(json_encode($curAns),$ans['refNo'],"",json_encode($this->computeScore($domainScores)));


				return $this->computeScore($domainScores);
			}
	}

	function computeScore($domainScores){

		$percentage = array(
			'as' => 0,
			'f' => 0,
			'ss' => 0,
			'a' => 0,
			'emf' => 0,
			'w' => 0,
			'ave' =>0 
		);

		foreach ($domainScores as $key => $value) {
			$percentage['ave']+=$value;
		}

		$percentage['as'] = round(($domainScores['as']/21)*100, 2);
		$percentage['f'] = round(($domainScores['f']/35)*100, 2);
		$percentage['ss'] = round(($domainScores['ss']/35)*100, 2);
		$percentage['a'] = round(($domainScores['a']/21)*100, 2);
		$percentage['emf'] = round(($domainScores['emf']/56)*100, 2);
		$percentage['w'] = round(($domainScores['w']/35)*100, 2);
		$percentage['ave'] = round(($percentage['ave']/203)*100, 2);

		return $percentage;		
	}

	function evaluate($score_mean=""){

		$eval = array(
			'as' => 0,
			'f' => 0,
			'ss' => 0,
			'a' => 0,
			'emf' => 0,
			'w' => 0,
			'ave' =>0 
		);

		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
