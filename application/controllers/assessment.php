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
       	$this->load->helper(array('form', 'url'));

   	}

	public function index(){
		$data['title']='Assessment | CLiver-O';
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$this->load->view('Assessment/assessment_view', $data);
	}



	public function bmi(){
		$data['title']='Assessment | CLiver-O';
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['bmi'] = $this->assessments_tab->getbmi()[0];
		$data['weight'] = $data['bmi']['weight'];
		$data['height'] = $data['bmi']['height'];

		$data['result_bmi'] = $data['weight']/(pow(($data['height']/100), 2)); /*Formula for BMI*/

		$data['bmi_eval'] = $this->bmiEvaluation($data['result_bmi']);

		$this->load->view('Assessment/bmi_view', $data);
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
		}else{
			
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

		$this->load->view('Assessment/sf36_view', $data);
	}

	public function sf36_result(){
		$r = json_decode($this->assessments_tab->getResult()[0]['qresults'],true);

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
		print_r("Persistence");
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

	function evaluate($score_mean=""){

		$eval = array(
			'pf' => "",
			'lph' => "",
			'leh' => "",
			'ef' => "",
			'ewb' => "",
			'sf' => "",
			'p' => "",
			'gh' => "",
			'ave' =>"" 
		);

		if ($score_mean['pf']<=75) {
			$eval['pf']=("Physical Functioning is Unhealthy");
			
		} else {
			$eval['pf']=("Physical Functioning is Healthy");
			
		}

		if ($score_mean['lph']<=75) {
			$eval['lph']=("Limitation due Physical Health is Unhealthy");
			
		} else {
			$eval['lph']=("Limitation due Physical Health is Healthy");
			
		}

		if ($score_mean['leh']<=75) {
			$eval['leh']=("Limitation due Emotional Health is Unhealthy");
			
		} else {
			$eval['leh']=("Limitation due Emotional Health is Healthy");
			
		}
		
		if ($score_mean['ef']<=75) {
			$eval['ef']=("Emotional/Fatigue is Unhealthy");
			
		} else {
			$eval['ef']=("Emotional/Fatigue is Healthy");
			
		}

		if ($score_mean['ewb']<=75) {
			$eval['ewb']=("Emotional Well-being is Unhealthy");
			
		} else {
			$eval['ewb']=("Emotional Well-being is Healthy");
			
		}

		if ($score_mean['sf']<=75) {
			$eval['sf']=("Social Functioning is Unhealthy");
			
		} else {
			$eval['sf']=("Social Functioning is Healthy");
			
		}

		if ($score_mean['p']<=75) {
			$eval['p']=("Pain is Unhealthy");
			
		} else {
			$eval['p']=("Pain is Healthy");
			
		}

		if ($score_mean['gh']<=75) {
			$eval['gh']=("General Health is Unhealthy");
			
		} else {
			$eval['gh']=("General Health is Healthy");
			
		}

		if ($score_mean['ave']<=75) {
			$eval['ave']=("Average Health is Unhealthy");
			
		} else {
			$eval['ave']=("Average Health is Healthy");
			
		}
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
