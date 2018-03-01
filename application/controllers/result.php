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

	public function index(){
		$r = $this->results_tab->getResult();
		$data_result['title'] = "Results | CLiver-O";
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data_result['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		if ($r) {
			$data_result['sf36'] = json_decode($r[0]['qresults'], TRUE);
			if ($data_result['sf36']['ave']>=75) {
				$data_result['blq'] = 53.125;
				$data_result['cldq']['ave'] = 50;
				$data_result['sf36_eval']=$this->evaluate_sf36($data_result['sf36']);
				$data_result['sf36_recom'] = $this->sf36_recom($data_result['sf36']);
				$data_result['blq_eval']="You are Healthy";
				$data_result['cldq_eval']['ave']="You are Healthy";
			}else{
				$data_result['blq'] = ($r[1]['qresults']/32)*100;
				$data_result['cldq'] = json_decode($r[2]['qresults'], TRUE);
				$data_result['sf36_eval']=$this->evaluate_sf36($data_result['sf36']);
				$data_result['blq_eval']=$this->evaluate_blq($data_result['blq']);
				$data_result['cldq_eval']=$this->evaluate_cldq($data_result['cldq']);
				$data_result['cldq_recom']=$this->cldq_recom($data_result['cldq']);
			}
			

		}
		
		$this->load->view('Result/result_view', $data_result);
	}

	function sf36_recom($score_mean=""){
		if ($score_mean['ave']<75) {
			$recom[1]=("Average Health is Unhealthy");
			$recom[2]="";
		} else {
			if ($this->session->userdata('gender')=='Male') {
				$recom[1]=("15 - 16 glasseses [125 ounces] per day");
				$recom[2]=("7-9 hours of sleep per day");
			}else{
				$recom[1]=("15 - 16 glasseses [125 ounces] per day");
				$recom[2]=("7-9 hours of sleep per day");
			}
		}
		return $recom;
	}

	function cldq_recom($score_mean=""){
		if ($score_mean['ave']<50) {
			$recom[1]=("6 - 7 glasses [51 ounces] per day");
			$recom[2]="7-9 hours of sleep per day";
		} else {
			$recom[1]=("1 liter or 4 glasses [51 ounces] per day");
			$recom[2]="≥ 8 hours of sleep per day";
		}
		return $recom;
	}

	function evaluate_blq($score=0){
		if ($score>=29.69) {
			return "Highest chance to have a liver disease";
		}elseif ($score>=25.46 && $score<=29.68){
			return "Higher chance to have a liver disease";
		}elseif ($score>=21.23 && $score<=25.45){
			return "High chance to have a liver disease";
		}elseif ($score>=17.00 && $score<=21.22){
			return "Reasonable chance to have a liver disease";
		}elseif ($score>=12.77 && $score<=16.99){
			return "Marginal chance to have a liver disease";
		}elseif ($score>=9.57 && $score<=12.76){
			return "Reasonable chance not to have a liver disease";
		}elseif ($score>=5.31 && $score<=9.56){
			return "High chance not to have a liver disease";
		}elseif ($score>=1.18 && $score<=5.31){
			return "Higher chance not to have a liver disease";
		}elseif ($score>=0 && $score<=1.17){
			return "Highest chance not to have a liver disease";
		}
	}

	function evaluate_sf36($score_mean=""){

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

		if ($score_mean['ave']<=75) {
			
			$eval['ave']=("Average Health is Unhealthy");
			
		} else {

			$eval['ave']=("Average Health is Healthy");
			
		}

		return $eval;
	}

	function evaluate_cldq($score_mean=""){
		$eval = array(
			'as' => "",
			'f' => "",
			'ss' => "",
			'a' => "",
			'emf' => "",
			'w' => "",
			'ave' =>"" 
		);

		if ($score_mean['as']>=50) {
			$eval['as']=("is Unhealthy");
		}else{
			$eval['as']=("is Healthy");
		}

		if ($score_mean['f']>=50) {
			$eval['f']=("is Unhealthy");
		}else{
			$eval['f']=("is Healthy");
		}

		if ($score_mean['ss']>=50) {
			$eval['ss']=("is Unhealthy");
		}else{
			$eval['ss']=("is Healthy");
		}

		if ($score_mean['a']>=50) {
			$eval['a']=("is Unhealthy");
		}else{
			$eval['a']=("is Healthy");
		}

		if ($score_mean['emf']>=50) {
			$eval['emf']=("is Unhealthy");
		}else{
			$eval['emf']=("is Healthy");
		}

		if ($score_mean['w']>=50) {
			$eval['w']=("is Unhealthy");
		}else{
			$eval['w']=("is Healthy");
		}

		if ($score_mean['ave']>=50) {
			$eval['ave']=("High Probability to have chronic Liver Disease");
		}else{
			$eval['ave']=("Low Probability to have chronic Liver Disease");
		}



		return $eval;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
