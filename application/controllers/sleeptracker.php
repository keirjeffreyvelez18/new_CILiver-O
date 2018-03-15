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
       	$this->load->model('waterintaketab');
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

<<<<<<< HEAD
		
		
		//print_r($data['marker']);
=======
		if ($r) {
			$data['sf36'] = json_decode($r[0]['qresults'], TRUE);
			$data['cldq'] = json_decode($r[2]['qresults'], TRUE);
			$data['sf36_recom'] = $this->sf36_recom($data['sf36']);
			$data['cldq_recom']=$this->cldq_recom($data['cldq']);
			
		}
		$data['sleep'] = round($this->sleepingAve(), 2);
>>>>>>> 28286af0307fa6f7d25c00e81760d2e53f117c39
		$this->load->view('Recommendations/sleeptracker_view', $data);
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
			print_r("expression");	
			$t = date("H:i",$a-$b);
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