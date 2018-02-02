<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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

       	$this->load->helper(array('form', 'url'));

   	}

	public function index()
	{
		$data['title'] = 'CILiver-O';
		$this->load->view('header', $data);
	}

	public function register($userid = 0)
	{
		$single['user1'] = $this->db->query('SELECT * FROM users WHERE userid = ?', $userid)->row_array(); 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'xss_clean');

		if (empty($userid)){
			$single['user1']['username'] = '';		//match user1 to each field
			$single['user1']['email'] = '';			//match user1 to each field
			$single['user1']['password'] ='';		//match user1 to each field
			$single['user1']['password2'] = '';		//match user1 to each field
			$single['user1']['birthday'] = '';		//match user1 to each field
			$single['user1']['gender'] = '';		//match user1 to each field
			$single['user1']['userid'] = $userid;	//match user1 to each field

			$this->form_validation->set_rules('password2', 'Password Confirmation', 'matches[password]'); // this is for password validaiton
			$this->form_validation->set_rules('email', 'E-mail', 'is_unique[users.email]'); // this is for validation if the e-mail is unique
		}


		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('User/register',$single);
		}
		else
		{	
			$data['username'] = $_POST['username'];
			$data['email'] = $_POST['email'];
			$data['password'] = $_POST['password'];
			$data['password2'] = $_POST['password2'];
			$data['birthday'] = $_POST['birthday'];
			$data['gender'] = $_POST['gender'];

			if($userid > 0){
					$data['userid'] = $userid;
					$result = $this->userstab->update_user($data);
					if(empty($result)){
						redirect ('/home/register/'.$data['userid'], 'refresh');
					}else{
						$msg="Successfully Register, Please Log-in";
						$this->session->set_flashdata('success',$msg);	
						redirect ('/home/login');
						exit();
					}
			}else{

				$result = $this->userstab->insert_user($data);
				if(empty($result)){
					echo 'error on inserting';
				}else{
					$msg="Successfully Register, Please Log-in";
					$this->session->set_flashdata('success',$msg);
					redirect('/home/login');
					exit();
				}

			}
		}

	}

	public function delete_user($userid = 0){
		$result = $this->userstab->delete_user($userid);
		if(empty($result)){
			echo 'nothing to delete';
		}else{
			redirect('/home/users', 'refresh');
			exit();
		}
	}

	public function users()
	{
		if ($this->session->userdata('username')!='') {
			$data['usertab'] = $this->userstab->users();
			$this->load->view('User/usertable', $data);
		}else{
			redirect('home/login');
		}
	}


	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		

		if($this->form_validation->run()){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$this->load->model('userstab');
			if ($this->userstab->login_user($username,$password)) {
				$session_data=array(
					'username'=>$username
					);
				$this->session->set_userdata($session_data);
				redirect('/home/home_page');
			}else{
				$msg="Incorrect username/password";
				$this->session->set_flashdata('error',$msg);
				redirect('/home/login');
			}
		}else{
			$this->load->view('User/login');
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('logout','Successfully Logout');
		redirect('/home/login');
	}
	
	public function home_page()
	{
		if ($this->session->userdata('username')!='') {
			$this->load->view('User/home_page');	
		}else{
			redirect('home/login');
		}
	}


	public function profile(){
		if ($this->session->userdata('username')!='') {
			$this->load->view('User/profile');
		}else{
			redirect('home/login');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
