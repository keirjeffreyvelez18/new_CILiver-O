<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

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
       	$this->load->library('form_validation');
       	$this->load->model('questab');
       	$this->load->helper(array('form', 'url'));

   	}

	public function index()
	{
		
	}

	public function questions_view(){
		$data['title'] = 'Questions';
		$data['questiontab'] = $this->questab->questions();
		$this->load->view('Questions/questions_view',$data);
	}

	public function add_question_view(){
		$title['title'] = 'Add Questions';
		$this->load->view('Questions/add_question',$title);
	}

	public function add_question(){
		$this->questab->insert_question($_POST["qIndex"],json_encode($_POST));
		redirect("quiz/questions_view");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
