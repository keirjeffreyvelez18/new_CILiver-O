<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blq extends CI_Controller {

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
		$this->load->view('Assessment/blq_view', $this->getAllData());
	}

	function getAllData(){
		$data['qcategory'] = "BLQ";
		$data['title']='Assessment | CLiver-O';
		$data['qIndex'] = $this->assessments_tab->get_questionId();
		$data['questiontab'] = $this->assessments_tab->get_all_questions();
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['index']=1;
		$data['btn'] = "";
		$this->session->set_userdata('cur_uAns_blq',$this->checkContent("BLQ"));	
		$ans=$this->session->userdata('cur_uAns_blq');
		$data['curAns'] = json_decode($ans['answers']);
		return $data;
	}

	function checkContent($qcategory="BLQ"){
		$assessCount = $this->db->query('select count(*) as norow from assessment where userid = ? AND category = ?',array($this->session->userdata('userid'),$qcategory))->row_array();
		
		if ($assessCount['norow']<=0) {
			$this->assessments_tab->ins_assessment($qcategory);
		}
		$userid = $this->session->userdata('userid');
		return $this->assessments_tab->get_assessment($userid, $qcategory)->row_array();
	}

	public function show_blq($qcategory="BLQ"){
		$data = $this->getAllData();
		$a = $this->input->post('i');
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


		$this->session->set_userdata('cur_uAns_blq',$this->checkContent($qcategory));	
		$ans=$this->session->userdata('cur_uAns_blq');
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

		$data['result'] = ($this->get_score()/34)*100;
		$data['evaluate'] = $this->evaluate($this->get_score());

		//print_r($data['result']);

		$this->load->view('Assessment/blq_view', $data);
	}
	
	public function show_result(){
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['qTaken']['blq']=1;
		$data['qTaken']['prs']=0.5;
		$this->assessments_tab->updateTaken($data);
		$this->load->view('Assessment/assessment_view', $data);
	}

	public function blq_result(){
		$r = json_decode($this->assessments_tab->getResult()[0]['qresults'],true);

		$data = $this->getAllData();
		$save['qTaken']['blq']=1;
		$save['qTaken']['prs']=0.5;
		$this->assessments_tab->updateTaken($save);

		if ($r['ave']>=75) {
			$this->load->view('Assessment/blq', $this->getAllData());
		}else{
			$this->load->view('Assessment/assessment_view', $this->getAllData());
		}
	}

	public function get_score( $ansScore="" ){
		if ($_POST) {
			$ans = $_POST['ans'];
			$qIndex = 0;
			$score = 0;
			$qans = 0;
			foreach ($ans as $qIndex => $value) {
				$qans = $ans[$qIndex];
				$curAns[$qIndex] = $qans;
				
			}

			$cur=$this->session->userdata('cur_uAns_blq');
			
			foreach ($ans as $key => $value) {
				$score+=$value;
			}

			$result = $this->assessments_tab->upd_assessment(json_encode($curAns),$cur['refNo'],"", $score);
			return $score;
		}
	}

	function computeScore($score=0){
		//print_r($score);
	}

	function evaluate($score_mean=""){
		$score = ($score_mean/34)*100;
		if ($score_mean>=29.69) {
			return $this->results_tab->getRecommendation('blq', '29.69 – 34.00');
		}elseif ($score_mean>=25.46 && $score_mean<=29.68){
			return "Higher chance to have a liver disease";
		}elseif ($score_mean>=21.23 && $score_mean<=25.45){
			return "High chance to have a liver disease";
		}elseif ($score_mean>=17.00 && $score_mean<=21.22){
			return "Reasonable chance to have a liver disease";
		}elseif ($score_mean>=12.77 && $score_mean<=16.99){
			return "Marginal chance to have a liver disease";
		}elseif ($score_mean>=9.57 && $score_mean<=12.76){
			return "Reasonable chance not to have a liver disease";
		}elseif ($score_mean>=5.31 && $score_mean<=9.56){
			return $this->results_tab->getRecommendation('blq', '5.31 – 9.56');
		}elseif ($score_mean>=1.18 && $score_mean<=5.31){
			return $this->results_tab->getRecommendation('blq', '1.18 – 5.31');
		}elseif ($score_mean>=0 && $score_mean<=1.17){
			return "Highest chance not to have a liver disease";
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
