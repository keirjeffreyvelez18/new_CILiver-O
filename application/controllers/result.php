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
		$r = $this->results_tab->getResult();
		$data['title'] = "Results | CLiver-O";
		$a = $this->assessments_tab->getTaken($this->session->userdata('userid'));
		$data['qTaken'] = json_decode($a[0]['qTaken'], TRUE);
		$data['sf36'] = json_decode($r[0]['qresults'], TRUE)['ave'];
		$data['blq'] = $r[1]['qresults'];
		$data['cldq'] = json_decode($r[2]['qresults'], TRUE)['ave'];

		$this->load->view('Result/result_view', $data);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
