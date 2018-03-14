<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recommendation extends CI_Controller {

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
		$data['title'] = "Recommendation | Liver-O";
		$r = $this->results_tab->getResult();
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['sf36'] = json_decode($r[0]['qresults'], TRUE);
		$data['blq'] = ($r[1]['qresults']/34)*100;
		$data['cldq'] = json_decode($r[2]['qresults'], TRUE);
		$data['sf36_eval']=$this->evaluate_sf36($data['sf36']);
		$data['blq_eval']=$this->evaluate_blq($data['blq']);
		$data['cldq_eval']=$this->evaluate_cldq($data['cldq']);
		$data['cldq_recom']=$this->cldq_recom($data['cldq']);
		$bmi = $this->assessments_tab->getbmi()[0];
		$w = $bmi['weight'];
		$h = $bmi['height'];
		$data['bmi'] = round($w/(pow(($h/100),2)),2);
		$this->load->view('Recommendations/recommendation_view', $data);
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
				$recom[1]=("11 - 12 glasses[92 ounces] per day");
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

		$eval = array(
			$interprete => "",
			$recom => "",
		);

		if ($score>=29.69) {
			$interprete = "Highest chance to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '29.69 – 34.00');
		}elseif ($score>=25.46 && $score<=29.68){
			$interprete = "Higher chance to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '25.46 – 29.68');
		}elseif ($score>=21.23 && $score<=25.45){
			$interprete = "High chance to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '21.23 – 25.45');
		}elseif ($score>=17.00 && $score<=21.22){
			$interprete = "Reasonable chance to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '17.00 – 21.22');
		}elseif ($score>=12.77 && $score<=16.99){
			print_r("expression");
			$interprete = "Marginal chance to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '12.77 – 16.99');
		}elseif ($score>=9.57 && $score<=12.76){
			$interprete = "Reasonable chance not to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '9.57 – 12.76');
		}elseif ($score>=5.31 && $score<=9.56){
			$interprete = "High chance not to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '5.31 – 9.56');
		}elseif ($score>=1.18 && $score<=5.31){
			$interprete = "Higher chance not to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '1.18 – 5.30');
		}elseif ($score>=0 && $score<=1.17){
			$interprete = "Highest chance not to have a liver disease";
			$recom = $this->results_tab->getRecommendation('blq', '0.00 – 1.17');
		}
		return $eval;
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
			'ave' =>"",
			'as' => "",
			'f' => "",
			'ss' => "",
			'a' => "",
			'emf' => "",
			'w' => "",
		);

		if ($$score_mean['as'] >= 50) {
			$eval['as']=$this->results_tab->getDomainResults("cldq", "as", "Severe");
		}else{
			$eval['as']=$this->results_tab->getDomainResults("cldq", "as", "Mild");
		}

		if ($score_mean['f']>=50) {
	 		$eval['f']=$this->results_tab->getDomainResults("cldq", "f", "Severe");
	 	} else {
	 		$eval['f']=$this->results_tab->getDomainResults("cldq", "f", "Mild");
	 	}


	 	if ($score_mean['ss']>=50) {
			$eval['ss']=$this->results_tab->getDomainResults("cldq", "ss", "Severe");
			
		} else {
			$eval['ss']=$this->results_tab->getDomainResults("cldq", "ss", "Mild");
			
		}
		
		if ($score_mean['a']>=50) {
			$eval['a']=$this->results_tab->getDomainResults("cldq", "a", "Severe");
			
		} else {
			$eval['a']=$this->results_tab->getDomainResults("cldq", "a", "Mild");
			
		}

		if ($score_mean['emf']>=50) {
			$eval['emf']=$this->results_tab->getDomainResults("cldq", "emf", "Severe");
			
		} else {
			$eval['emf']=$this->results_tab->getDomainResults("cldq", "emf", "Mild");
			
		}

		if ($score_mean['w']>=50) {
			$eval['w']=$this->results_tab->getDomainResults("cldq", "w", "Severe");
			
		} else {
			$eval['w']=$this->results_tab->getDomainResults("cldq", "w", "Mild");
			
		}

		if ($score_mean['ave']<=50) {
			
			$eval['ave']=("Probability to have Chronic Liver Disease is <span style='font-weight: bold'>Low</span>");
			
		} else {

			$eval['ave']=("Probability to have Chronic Liver Disease is <span style='font-weight: bold'>High</span>");
			
		}

		return $eval;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */