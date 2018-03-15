<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assessment extends CI_Controller {

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
       	$this->load->model('results_tab');
       	$this->load->helper(array('form', 'url'));

   	}

	public function index(){
		$data['title']='Assessment | CLiver-O';
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		if ($data['qTaken']['result']==0) {
			$d = array(
				'isComplete' => FALSE
			);
			$this->session->set_userdata($d);
		}else{
			$d = array(
				'isComplete' => TRUE
			);
			$this->session->set_userdata($d);
		}
		$this->load->view('Assessment/assessment_view', $data);
	}

	public function bmi(){
		$data['title']='Assessment | CLiver-O';
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['bmi'] = $this->assessments_tab->getbmi()[0];
		$data['weight'] = $data['bmi']['weight'];
		$data['height'] = $data['bmi']['height'];


		if ($this->input->post('weightType')=="lb") {
			$data['weight'] = ($data['weight']/2.2);
		}

		
		if ($this->input->post('heightType')=="ft") {
			$data['height'] = ($data['height']/30.48);
		}

		// print_r($data['height']);

		$data['result_bmi'] = $data['weight']/(pow(($data['height']/100), 2)); /*Formula for BMI*/

		$data['bmi_eval'] = $this->bmiEvaluation($data['result_bmi']);

		$this->load->view('Assessment/bmi_view', $data);
	}

	public function nextAssessment(){
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		if ($data['qTaken']['bmi']==0.5) {
			$this->bmi();
		}elseif ($data['qTaken']['sf36']==0.5) {
			$this->sf36();
		}elseif ($data['qTaken']['blq']==0.5) {
			redirect("blq", 'refresh');
		}elseif ($data['qTaken']['prs']==0.5) {
			$this->prs();
		}elseif ($data['qTaken']['cldq']==0.5) {
			redirect("cldq", 'refresh');
		}else{
			redirect("result", 'refresh');
		}
	}

	public function bmiEvaluation($result=0){
		if ($result<18.5) {
			return array("#12e5d6","Below normal Body Mass Index");
		}elseif ($result>=18.5 && $result<=24.9) {
			return array("#12e551", "Normal Body Mass Index");
		}elseif ($result>=25 && $result<=29.9) {
			return array("#e0dd3c","Above normal Body Mass Index");
		}elseif ($result>=30) {
			return array("#f71616","Far above from a normal Body Mass Index");
		}
	}

	public function post_bmi(){
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['title']='Assessment | CLiver-O';
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['weight']  = $this->input->post('weight');
		$data['height']  = $this->input->post('height');

		if ($data['qTaken']['bmi']==0.5) {
			$data['qTaken']['bmi']=1;
			$data['qTaken']['sf36']=0.5;
		}


		if ($this->input->post('weightType')=="lb") {
			$data['weight'] = round(($data['weight']*0.45359237),2);
		}


		if ($this->input->post('heightType')=="ft") {
			$data['height'] = round(($data['height']*30.48),2);
		}

		
		$data['result_bmi'] = $data['weight']/(pow(($data['height']/100), 2)); /*Formula for BMI*/

		$data['bmi_eval'] = $this->bmiEvaluation($data['result_bmi']);

		$this->assessments_tab->updateTaken($data);
		$this->assessments_tab->updatebmi($data);
		$this->load->view('Assessment/bmi_view', $data);
	}

	public function sf36($qcategory="SF36"){
		$data['title']='Assessment | CLiver-O';
		$data['qIndex'] = $this->assessments_tab->get_questionId();
		$data['questiontab'] = $this->assessments_tab->get_all_questions();
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['score']=0;
		$data['last']=0;
		$data['index']=1;
		$data['btn'] = "";
		$a = $this->input->post('i');
		$data['qcategory'] = $qcategory;
		$btn = $this->input->post('submit');

		if ($btn=="Next") {
			$data['index']+=$a;
			$this->get_score();
			// $data['btn'] = "animated fadeInRight";
		} elseif ($btn=="Back") {
			$data['index']=$a-1;
			$this->get_score();
			// $data['btn'] = "animated fadeInLeft";
		}

		$this->session->set_userdata('cur_uAns',$this->checkContent($qcategory));
		$ans=$this->session->userdata('cur_uAns');
		$data['curAns'] = json_decode($ans['answers']);

		if (json_decode($ans['answers'],TRUE)[$a]=="") {
			$msg="Please select one.";
			$this->session->set_flashdata('error',$msg);
			$data['index']=$a;
		}
		
		$data['progress'] =1;
		if ($a=="") {
			$data['index']=1;
		}
		if($this->input->post('qIndex')!=0){
			$data['progress'] = ($data['index']/$this->input->post('qIndex'))*100;
		}	

		$data['result'] = $this->get_score();
		$data['sf36_eval'] = $this->evaluate();
		$data['sf36_inter'] = $this->interprete($this->get_score()['ave']);

		$this->load->view('Assessment/sf36_view', $data);
	}

	public function sf36_result(){
		$r = json_decode($this->assessments_tab->getResult()[0]['qresults'],true);
		$data['sf36_eval'] = $this->evaluate($r);
		if ($r['ave']>=75) {
			$this->load->view('Assessment/assessment_view', $data);
		}else{
			$this->load->view('Assessment/assessment_view', $data);
		}
	}

	function checkContent($qcategory=""){
		$assessCount = $this->db->query('select count(*) as norow from assessment where userid = ? AND category = ?',array($this->session->userdata('userid'),$qcategory))->row_array();
		
		if ($assessCount['norow']<=0) {
			$this->assessments_tab->ins_assessment($qcategory);
			
		}
		$userid = $this->session->userdata('userid');
		return $this->assessments_tab->get_assessment($userid, $qcategory)->row_array();
	}

	function sf36_save(){
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['qTaken']['sf36']=1;
		if ($data['qTaken']['blq']==0) {
			$data['qTaken']['blq']=0.5;
		}
		$this->assessments_tab->updateTaken($data);
		$this->index();
	}

	public function prs(){
		// ============================================================================================================(important)
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['title']='Assessment | CLiver-O';
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$btn = $this->input->post('prs_button');
		$blq_ans = json_decode($this->results_tab->getBlqResults(), TRUE);

		$symptoms = array();

		foreach ($blq_ans as $key => $value) {
			if ($blq_ans[$key]==2) {
				$symptoms[$key] = $this->results_tab->getSymptoms($key);
			}
		}
		$data['symptoms'] = array_unique($symptoms);
		if ($btn == "Yes") {
			$data['qTaken']['prs']=1;
			if ($data['qTaken']['cldq']==0) {
				$data['qTaken']['cldq']=0.5;
			}
			$this->assessments_tab->updateTaken($data);
			$this->index();
		} else if ($btn == "No"){
			$data['qTaken']['prs']=1;
			$data['qTaken']['cldq']=0;
			$data['qTaken']['result']=1;
			$this->assessments_tab->updateTaken($data);
			redirect('result', 'refresh');
		}else{
			$this->load->view('Assessment/persistence_view',$data);	
		}
	}

	public function get_score($domain="", $ansScore="" ){

			if ($_POST) {
				$domain = $_POST['domain'];
				
				$ans= $_POST['ans'];

				$cur_ans = $this->session->userdata('cur_uAns');

				$domainScores = array(
					'pf' => 0,
					'lph' => 0,
					'leh' => 0,
					'ef' => 0,
					'ewb' => 0,
					'sf' => 0,
					'p' => 0,
					'gh' => 0
				);

				$qIndex = 0;
				$qDomain = "";
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
							case 'pf':
								$domainScores['pf'] += $qAnsVal;
								break;
							case 'lph':
								$domainScores['lph'] += $qAnsVal;
								break;
							case 'leh':
								$domainScores['leh'] += $qAnsVal;
								break;
							case 'ef':
								$domainScores['ef'] += $qAnsVal; 
								break;
							case 'ewb':
								$domainScores['ewb'] += $qAnsVal;
								break;
							case 'sf':
								$domainScores['sf'] += $qAnsVal;
								break;
							case 'p':
								$domainScores['p'] += $qAnsVal;	
								break;
							case 'gh':
								$domainScores['gh'] += $qAnsVal;
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
			'pf' => 0,
			'lph' => 0,
			'leh' => 0,
			'ef' => 0,
			'ewb' => 0,
			'sf' => 0,
			'p' => 0,
			'gh' => 0,
			'ave' =>0 
		);

		foreach ($domainScores as $key => $value) {
			$percentage['ave']+=$value;
		}

		$percentage['pf'] = round(($domainScores['pf']/1000)*100, 2);
		$percentage['lph'] = round(($domainScores['lph']/400)*100, 2);
		$percentage['leh'] = round(($domainScores['leh']/300)*100, 2);
		$percentage['ef'] = round(($domainScores['ef']/400)*100, 2);
		$percentage['ewb'] = round(($domainScores['ewb']/500)*100, 2);
		$percentage['sf'] = round(($domainScores['sf']/200)*100, 2);
		$percentage['p'] = round(($domainScores['p']/200)*100, 2);
		$percentage['gh'] = round(($domainScores['gh']/500)*100, 2);
		$percentage['ave'] = round(($percentage['ave']/3600)*100, 2);

		return $percentage;		
	}

	public function evaluate($score_mean=""){
		$eval = array(
			'ave' =>"",
			'pf' => "",
			'lph' => "",
			'leh' => "",
			'ef' => "",
			'ewb' => "",
			'sf' => "",
			'p' => "",
			'gh' => ""
			 
		);

		if ($score_mean['pf']<=75) {
			$eval['pf']=$this->results_tab->getDomainResults("sf36", "pf", "Unhealthy");
		} else {
			$eval['pf']=$this->results_tab->getDomainResults("sf36", "pf", "Healthy");
		}

		if ($score_mean['lph']<=75) {
			$eval['lph']=$this->results_tab->getDomainResults("sf36", "lph", "Unhealthy");
			
		} else {
			$eval['lph']=$this->results_tab->getDomainResults("sf36", "lph", "Healthy");
			
		}

		if ($score_mean['leh']<=75) {
			$eval['leh']=$this->results_tab->getDomainResults("sf36", "leh", "Unhealthy");
			
		} else {
			$eval['leh']=$this->results_tab->getDomainResults("sf36", "leh", "Healthy");
			
		}
		
		if ($score_mean['ef']<=75) {
			$eval['ef']=$this->results_tab->getDomainResults("sf36", "ef", "Unhealthy");
			
		} else {
			$eval['ef']=$this->results_tab->getDomainResults("sf36", "ef", "Healthy");
			
		}

		if ($score_mean['ewb']<=75) {
			$eval['ewb']=$this->results_tab->getDomainResults("sf36", "ewb", "Unhealthy");
			
		} else {
			$eval['ewb']=$this->results_tab->getDomainResults("sf36", "ewb", "Healthy");
			
		}

		if ($score_mean['sf']<=75) {
			$eval['sf']=$this->results_tab->getDomainResults("sf36", "sf", "Unhealthy");
			
		} else {
			$eval['sf']=$this->results_tab->getDomainResults("sf36", "sf", "Healthy");
			
		}

		if ($score_mean['p']<=75) {
			$eval['p']=$this->results_tab->getDomainResults("sf36", "p", "Unhealthy");
			
		} else {
			$eval['p']=$this->results_tab->getDomainResults("sf36", "p", "Healthy");
			
		}

		if ($score_mean['gh']<=75) {
			$eval['gh']=$this->results_tab->getDomainResults("sf36", "gh", "Unhealthy");
			
		} else {
			$eval['gh']=$this->results_tab->getDomainResults("sf36", "gh", "Healthy");
			
		}

		if ($score_mean['ave']>=75) { /*Why is this happening?*/
			
			$eval['ave']=("Average Health is <span style='font-weight: bold'>Unhealthy</span");
			
		} else {

			$eval['ave']=("Average Health is <span style='font-weight: bold'>Healthy</span>");
			
		}

		return $eval;
	}

	function interprete($score=0){

		if ($score<=50) {
			$recom = $this->results_tab->getRecommendation('sf36', '50 - 0')[0];
		}elseif($score>=51 && $score<=74){
			$recom = $this->results_tab->getRecommendation('sf36', '51 - 74')[0];
		}elseif($score>=75 && $score<=80){
			$recom = $this->results_tab->getRecommendation('sf36', '75 - 80')[0];
		}elseif($score>=81){
			$recom = $this->results_tab->getRecommendation('sf36', '81 - 100')[0];
		}

		return $recom;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
