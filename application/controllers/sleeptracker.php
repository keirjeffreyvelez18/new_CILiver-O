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
       	$this->load->helper(array('form', 'url'));
   	}

	public function index()
	{
		$data['title'] = "Sleep Tracker | Liver-O";
		$data['sleepTrackerData'] = $this->sleeptrackertab->getSleepingRecords();
		foreach ($data['sleepTrackerData'] as $key => $value) {
			$tStart[ $key ] = explode(":",$data['sleepTrackerData'][ $key ]['timeStart']);
			$tEnd[ $key ] = explode(":",$data['sleepTrackerData'][ $key ]['timeEnd']);
			$dos [$key] = explode("-",$data['sleepTrackerData'][ $key ]['dateofSleep']);
			
		}

		$data['tStart'] = $tStart;
		$data['tEnd'] = $tEnd;
		$data['dos'] = $dos;


		

		$this->load->view('Recommendations/sleeptracker_view', $data);
	}
	public function saveSleepTracker(){
		$data['dateOfSleep'] = $this->input->post('dateOfSleep');
		$data['timeStart'] = $this->input->post('sleeptime');
		$data['timeEnd'] = $this->input->post('wakeuptime');
		$data['userid'] = $this->session->userdata('userid');

		$result = $this->sleeptrackertab->insertSleepTracker($data);
		if ($result) {
			redirect('Sleeptracker', 'refresh');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */