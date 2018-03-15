<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Watertracker extends CI_Controller {

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
       	$this->load->model('waterintaketab');
       	$this->load->model('assessments_tab');
       	$this->load->model('results_tab');
       	$this->load->helper(array('form', 'url'));
   	}

	public function index()
	{	
		$data['title'] = "Water Tracker | Liver-O";
		$r = $this->results_tab->getResult();
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['waterintakeData'] = $this->waterintaketab->getwaterintake('asc');
		if (!$data['waterintakeData']) {
			$date['dateStartOfRecom'] = date('Y-m-d');
			$this->session->set_userdata($date);			
		}

		if ($r) {
			$data['sf36'] = json_decode($r[0]['qresults'], TRUE);
			$data['sf36_recom'] = $this->sf36_recom($data['sf36']);
			$data['cldq'] = json_decode($r[2]['qresults'], TRUE);
			$data['cldq_recom']=$this->cldq_recom($data['cldq']);
			

		}

		$data['waterAve'] = $this->interpretWaterIntake();
		//print_r($data['waterAve']);
		$this->load->view('Recommendations/watertracker_view', $data);
	}

	public function saveWaterIntake(){
		$data['dateStartOfRecom'] = $this->session->userdata('dateStartOfRecom');
		$data['dateOfIntake'] = $this->input->post('dOfIntake');
		$data['numberOfWaterIntake'] = $this->input->post('numOfIntake');
		$data['userid'] = $this->session->userdata('userid');
		$result = $this->waterintaketab->insertWaterIntake($data);

		//$this->getNotification();
		if ($result) {
			redirect('watertracker', 'refresh');
		}
	}


	function interpretWaterIntake(){
		$waterintakeData = $this->waterintaketab->getwaterintake('asc');
		foreach ($waterintakeData as $key => $value) {
			$w+=$waterintakeData[$key]['numberOfWaterIntake'];
		}
		$a = $w/(count($waterintakeData));
		return $a;
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */