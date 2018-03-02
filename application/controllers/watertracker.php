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
       	$this->load->helper(array('form', 'url'));
   	}

	public function index()
	{	
		$data['title'] = "Water Tracker | Liver-O";
		$data['waterintakeData'] = $this->waterintaketab->getwaterintake();
		if (!$data['waterintakeData']) {
			$date = array($dateStartOfRecom => date('Y-m-d')."");
			$this->session->set_userdata($date);			
		}
		$date = array($dateStartOfRecom => date('Y-m-d'));
		$this->session->set_userdata($date);
		print_r($this->session->userdata('dateStartOfRecom').$date);
 		$this->load->view('Recommendations/watertracker_view', $data);
	}

	public function saveWaterIntake(){
		//$data['dateStartOfRecom'] = $this->session->userdata('dateStartOfRecom');
		$data['dateOfIntake'] = $this->input->post('dOfIntake');
		$data['numberOfWaterIntake'] = $this->input->post('numOfIntake');
		$data['userid'] = $this->session->userdata('userid');
		$result = $this->waterintaketab->insertWaterIntake($data);
		if ($result) {
			$this->index();
		}else{
			print_r("failed");
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */