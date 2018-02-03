<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Controller {

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
       	$this->load->model('results_tab');
       	$this->load->model('assessments_tab');
       	$this->load->helper(array('form', 'url'));

   	}

	public function index()
	{
		$data_result = $this->getAllData();
		$data_result['sf36_col'] = 1;
		$data_result['blq_col'] = 1;
		$data_result['cldq_col'] = 1;
		$data_result['sf36_eval'] = $this->evaluate_sf36($data_result['sf36']);
		$this->load->view('Result/result_view', $data_result);

	}

	function getAllData(){
		$r = $this->results_tab->getResult();
		$data_result['title'] = "Results | CLiver-O";
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data_result['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data_result['sf36'] = json_decode($r[0]['qresults'], TRUE)['ave'];
		$data_result['blq'] = $r[1]['qresults'];
		$data_result['cldq'] = json_decode($r[2]['qresults'], TRUE)['ave'];
		return $data_result;
	}

	public function show_result(){
		$qCat = $this->input->post('qCat');
		$data_result = $this->getAllData();
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		
		if ($qCat=="SF36") {
			$data_result['sf36_eval'] = $this->evaluate_sf36($data_result['sf36']);
			$data_result['sf36_col'] = 1;
			$data_result['blq_col'] = 0;
			$data_result['cldq_col'] = 0;
		}elseif ($qCat=="BLQ") {
			$data_result['blq_eval'] = $this->evaluate_blq($data_result['blq']);
			$data_result['sf36_col'] = 0;
			$data_result['blq_col'] = 1;
			$data_result['cldq_col'] = 0;
		}elseif ($qCat=="CLDQ") {
			$data_result['sf36_col'] = 0;
			$data_result['blq_col'] = 0;
			$data_result['cldq_col'] = 1;
		}

		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$this->load->view('Result/result_view', $data_result);
	}

	function evaluate_blq($score=0){
		if ($score<=50) {
			return "high chance";
		}else{
			return "low chance";
		}
	}

	public function evaluate_sf36($score_mean=""){

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

		return $eval;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
