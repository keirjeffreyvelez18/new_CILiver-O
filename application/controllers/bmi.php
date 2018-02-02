<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bmi extends CI_Controller {

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
       	$this->load->helper(array('form', 'url'));

   	}

	public function index()
	{
		$this->load->view('Assessment/bmi_view');
	}

	/*public function assessment($qIndex=0){
		$data['title']='Assessment | CLiver-O';
		$data['qIndex'] = $this->assessments_tab->get_questionId();
		$data['questiontab'] = $this->assessments_tab->question($data['qIndex']);
		$data['score']=0;
		$data['last']=0;
		$data['index']=1;
		$data['q'] = "";	
		$this->load->view('Assessment/assessment_view', $data);
	}

	public function get_assessment(){
		$data['title']='Assessment | CLiver-O';
		$button = $this->input->post('submit');
		$ans_score = $this->input->post('ans');
		$qIndex = $this->assessments_tab->get_questionId();
		$data['score'] = $ans_score+$this->input->post('score');

		$data['last']=$this->assessments_tab->get_last();

		$data['qIndex'] = $this->input->post('qIndex')+1;

			if ($button	== 'Next') {
				$qIndex=$this->input->post('qIndex')+1;
			}elseif ($button == 'Back') {
				$qIndex=$this->input->post('qIndex')-1;
			}

		$data['questiontab'] = $this->assessments_tab->question($qIndex);
		if ($qIndex<=0) {
			$data['qIndex'] = $this->assessments_tab->get_questionId();
			$data['questiontab'] = $this->assessments_tab->question($data['qIndex']);
		}
		$this->load->view('Assessment/bmi_view', $data);
	}

	public function get_score(){
		print_r($_POST);
	}*/


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */