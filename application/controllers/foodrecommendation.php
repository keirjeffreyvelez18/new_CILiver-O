<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foodrecommendation extends CI_Controller {

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
       	$this->load->model('calorietrackertab');
       	$this->load->helper(array('form', 'url'));
   	}

	public function index()
	{	
		$data['title'] = "Calorie Tracker | Liver-O";
		$data['calorieintakeData'] = $this->calorietrackertab->getCalorieIntake();
 		$this->load->view('Recommendations/foodrecommendation_view', $data);
	}

	public function saveCalorieIntake(){
		$data['dateOfIntake'] = $this->input->post('dOfIntake');
		$data['numOfCalorie'] = $this->input->post('numOfIntake');
		$data['userid'] = $this->session->userdata('userid');


		$result = $this->calorietrackertab->insertCalorieIntake($data);
		if ($result) {
			redirect('Foodrecommendation', 'refresh');
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */