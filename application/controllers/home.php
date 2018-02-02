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
       	$this->load->library('encrypt');
       	$this->load->library('form_validation');
       	$this->load->model('userstab');
       	$this->load->helper(array('form', 'url'));

   	}
	public function index()
	{
		$title['title']='CILiver-O';
		$data['welcome'] = TRUE;
		$this->load->view('User/welcome_page', $title, $data);
	}

	public function register()
	{	
		$title['title'] = 'Register|CILiver-O';

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('email', 'E-mail', 'is_unique[users.email]');

		// $pass = "mypasss" ; ENCRYPT TEST
		// $enc = $this->encrypt->encode($pass);
		// $dec = $this->encrypt->decode($enc);
		// print_r($enc);
		// print_r($dec);exit();

		if ($this->form_validation->run()) {
				$data['username'] = $this->input->post('name');
				$data['email']= $this->input->post('email');
				$data['password' ]= $this->input->post('password');
				$data['birthday'] = $this->input->post('birthday');
				$data['gender'] = $this->input->post('gender');
				$taken = array(
					'bmi' => 0.5,
					'sf36' => 0,
					'blq' => 0,
					'prs' => 0,
					'cldq' => 0
				);
				$data['qTaken'] = json_encode($taken);
				
				if ($this->isLegalAge()) {
					if($this->userstab->insert_user($data)){
						$msg="Successfully Register, Please Log-in";
						$this->session->set_flashdata('success',$msg);
						redirect('/home/login','refresh');
					}else{
						$msg="Error!";
						$this->session->set_flashdata('error',$msg);
						$this->load->view('User/welcome_page',$title);
					}
				}else{
					$msg="Must be atleast 18 years old";
					$this->session->set_flashdata('error',$msg);
					$this->load->view('User/welcome_page',$title);
				}
		}else{
			$this->load->view('User/welcome_page',$title);
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
		// if ($this->session->userdata('isLoggedIn')) {
			$data['usertab'] = $this->userstab->users();
			$this->load->view('User/usertable', $data);
		// }else{
		// 	redirect('home/login');
		// }
	}


	public function login(){
		$data['title']='Login|CILiver-O';
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');
		

		if($this->form_validation->run()){
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$result = $this->userstab->login_user($email,$password);
			if ($result!=null) {
				$session_data=array(
					'userid'=>$result['userid'],
					'username'=>$result['username'],
					'email'=> $result['email'],
					'password'=>$password,
					'birthday'=>$result['birthday'],
					'gender'=>$result['gender'],
					'isLoggedIn'=> TRUE
					);
				$this->session->set_userdata($session_data);
				redirect('/home/home_page');
			}else{
				$msg="Incorrect username/password";
				$this->session->set_flashdata('error',$msg);
				redirect('/home');
			}
		}else{
			$this->load->view('User/welcome_page',$data);
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout','Successfully Logout');
		redirect('/home/');
	}
	
	public function home_page()
	{
	
		if ($this->session->userdata('isLoggedIn')) {
			$data['title']='Home|CILiver-O';
			$this->load->view('User/home_page',$data);	
		}else{
			redirect('home/');
		}
	}


	public function profile(){
		if ($this->session->userdata('isLoggedIn')) {
			$data['title']='Profile|CILiver-O';
			$this->load->view('User/profile',$data);	
		}else{
			redirect('home/');
		}
	}

	public function update_name(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');

		$data['username']=$this->input->post('username');
		$data['userid']=$this->input->post('userid');
		if ($this->form_validation->run()) {
			$result=$this->userstab->update_username($data);
			if ($result) {
				$msg="Successfully Updated";
				$this->session->set_flashdata('update',$msg);	
				$this->session->set_userdata('username', $data['username']);
				redirect ('/home/Profile');
			}else{
				$msg="Error! Invalid username";
				$this->session->set_flashdata('error',$msg);	
				redirect ('/home/Profile');
			}
		}else{
			$msg="Error! Invalid username";
			$this->session->set_flashdata('error',$msg);	
			redirect ('/home/Profile');
		}
	}

	public function update_pass(){

		$data['password']=$this->input->post('password');
		$data['userid']=$this->input->post('userid');

		
			$result=$this->userstab->update_password($data);
			if ($result) {
				$msg="Successfully Updated";
				$this->session->set_flashdata('update',$msg);	
				$this->session->set_userdata('password', $data['password']);
				redirect ('/home/Profile');
			}else{
				$msg="Error! Invalid Password";
				$this->session->set_flashdata('error',$msg);	
				redirect ('/home/Profile');
			}
	}

	// public function update_email(){

	// 	$this->form_validation->set_rules('email', 'E-mail', 'is_unique[users.email]'); // this is for validation if the e-mail is unique

	// 	$data['email']=$this->input->post('email');
	// 	$data['userid']=$this->input->post('userid');
	// 	if ($this->form_validation->run()) {
	// 		$result=$this->userstab->update_email($data);
	// 		if ($result) {
	// 			$msg="Successfully Updated";
	// 			$this->session->set_flashdata('update',$msg);	
	// 			$this->session->set_userdata('email', $data['email']);
	// 			redirect ('/home/Profile');
	// 		}else{
	// 			$msg="Error! Invalid E-mail";
	// 			$this->session->set_flashdata('error',$msg);	
	// 			redirect ('/home/Profile');
	// 		}
	// 	}else{
	// 		$msg="Error! Invalid E-mail";
	// 		$this->session->set_flashdata('error',$msg);	
	// 		redirect ('/home/Profile');
	// 	}
	// }

	public function isLegalAge(){
		$this->load->helper('date');
		$bd=$this->input->post('birthday');
		$date = date('Y');
		$age = $date-$bd;
		return ($age>=18);
	}

	public function update_dob(){
		$data['birthday']=$this->input->post('birthday');
		$data['userid']=$this->input->post('userid');
		$result=$this->userstab->update_dob($data);
			if ($result && $this->isLegalAge()) {
				$msg="Successfully Updated";
				$this->session->set_flashdata('update',$msg);	
				$this->session->set_userdata('birthday', $data['birthday']);
				redirect ('/home/Profile');
			}else{
				$msg="Error!";
				$this->session->set_flashdata('error','Age must be 18 yrs and above');	
				redirect ('/home/Profile');
			}
	}

	public function update_gender(){
		$data['gender']=$this->input->post('gender');
		$data['userid']=$this->input->post('userid');
		$result=$this->userstab->update_gender($data);
			if ($result) {
				$msg="Successfully Updated";
				$this->session->set_flashdata('update',$msg);	
				$this->session->set_userdata('gender', $data['gender']);
				redirect ('/home/Profile');
			}else{
				$msg="Error!";
				$this->session->set_flashdata('error',$msg);	
				redirect ('/home/Profile');
			}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
