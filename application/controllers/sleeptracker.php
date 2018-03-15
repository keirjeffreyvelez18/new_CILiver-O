<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sleeptracker extends CI_Controller {

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
       	$this->load->model('sleeptrackertab');
       	$this->load->model('assessments_tab');
       	$this->load->model('results_tab');
       	$this->load->helper(array('form', 'url'));
   	}

	public function index()
	{
		$data['title'] = "Sleep Tracker | Liver-O";
		$data['sleepTrackerData'] = $this->sleeptrackertab->getSleepingRecords();
		if (!$data['sleepTrackerData']) {
			$date['dateStartOfRecom'] = date('Y-m-d');
			$this->session->set_userdata($date);			
		}
		$r = $this->results_tab->getResult();
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		
		if (!$data['waterintakeData']) {
			$date['dateStartOfRecom'] = date('Y-m-d');
			$this->session->set_userdata($date);			
		}


		if ($r) {
			$data['sf36'] = json_decode($r[0]['qresults'], TRUE);
			$data['cldq'] = json_decode($r[2]['qresults'], TRUE);
			$data['sf36_recom'] = $this->sf36_recom($data['sf36']);
			$data['cldq_recom']=$this->cldq_recom($data['cldq']);
			
		}
		$data['sleep'] = round($this->sleepingAve(), 2);
		$this->load->view('Recommendations/sleeptracker_view', $data);
	}

	function sleepingAve(){
		$sleepingRec = $this->sleeptrackertab->getSleepingRecords();
		foreach ($sleepingRec as $key => $value) {
			$s+=($sleepingRec[$key]['hoursOfSleep']);
		}
		return $s/(count($sleepingRec));
	}

	function sf36_recom($score_mean=""){
		if ($score_mean['ave']>75) {
			if ($this->session->userdata('gender')=='Male') {
				$recom[1]=("7-9 hours of sleep per day");
			}else{
				$recom[1]=("7-9 hours of sleep per day");
			}
		}
		return $recom;
	}

	function cldq_recom($score_mean=""){
		if ($score_mean['ave']<50) {
			$recom[1]="7-9 hours of sleep per day";
		} else {
			$recom[1]="≥ 8 hours of sleep per day";
		}
		return $recom;
	}

	public function saveSleepTracker(){
		$data['dateOfSleep'] = $this->input->post('dateOfSleep');
		$data['dateStartOfRecom'] = $this->session->userdata('dateStartOfRecom');
		$data['userid'] = $this->session->userdata('userid');
		$data['hoursOfSleep'] = 8;
		$a = strtotime($this->input->post('sleeptime'));
		$b = strtotime($this->input->post('wakeuptime'));
		
		if ($a>strtotime('12:00') && $b>strtotime('00:00')) {
			$t = date("H:i",(23-$a)+$b);
		}else {
			$t = date("H:i",$b-$a);
		}
		$data['hoursOfSleep'] = str_replace(':', '.', $t);
		// $data['userid'] = $this->session->userdata('userid');
		// $t = $b->diff($a);
		// $t->format("%H:%I:%S");
		$result = $this->sleeptrackertab->insertSleepTracker($data);
		if ($result) {
			redirect('sleeptracker', 'refresh');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */