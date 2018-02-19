<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Controller {

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
       	$this->load->model('userstab');
       	$this->load->library('encrypt');
       	$this->load->helper(array('form', 'url'));

   	}

	public function index()
	{
		$a = "sample";
		$b = $this->encrypt->encode($a);
		$c = $this->encrypt->decode($b);
		print_r($a);
		print_r("<br>");
		print_r($b);
		print_r("<br>");
		print_r($c);


	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
