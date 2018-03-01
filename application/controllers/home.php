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
        $this->load->library('email');
       	$this->load->library('form_validation');
       	$this->load->model('userstab');
       	$this->load->helper(array('form', 'url', 'date'));

   	}
	public function index(){
		$data['title']='CILiver-O';
		$data['welcome'] = TRUE;
		$this->load->view('User/welcome_page', $data);
	}

	public function register(){	
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('email', 'E-mail', 'is_unique[users.email]');
		
		if ($this->form_validation->run()) {
				$data['username'] = $this->input->post('username');
				$data['email']= $this->input->post('email');
				$data['password' ]= $this->encrypt->encode($this->input->post('password'));
				$data['birthday'] = $this->input->post('birthday');
				$data['gender'] = $this->input->post('gender');
				$data['dateJoin'] = date('Y-m-d');
				$data['firstLogin'] = TRUE;
				$data['confirmCode'] = "letmelogin";
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
						$this->login();
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
			redirect('home/',$title);
		}
	}


	function sendEmail($email=""){	

		$config = array(
			'useragent' => 'Liver-O',
		    'protocol'  => 'quete',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'liveo2018@gmail.com',
		    'smtp_pass' => 'Thesis2018',
		    'mailtype'  => 'text',
		    'charset'   => 'iso-8859-i',
		    'wordwrap'  => TRUE
		);

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('livero2018@gmail.com', 'Liver-0');
		$this->email->to('keirjeffreyvelez18@gmail.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		

		if ($this->email->send()) {
			print_r("SENT");
		}else{
			print_r($this->email->print_debugger());
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

	public function users(){
		// if ($this->session->userdata('isLoggedIn')) {
			$data['usertab'] = $this->userstab->users();
			$this->load->view('User/usertable', $data);
		// }else{
		// 	redirect('home/login');
		// }
	}


	public function login(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');
		$data['title'] = "Login | Liver-0";

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
					'lastLogin' => $result['lastDateLogin'],
					'isLoggedIn'=> TRUE,
					);
				$this->session->set_userdata($session_data);
				$this->userstab->update_login();
				redirect('/home/home_page');
			}else{
				$msg="Incorrect username/password";
				$this->session->set_flashdata('error',$msg);
				redirect('/home');
			}
		}else{
			redirect('home/',$data);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout','Successfully Logout');
		redirect('/home/');
	}
	
	public function home_page(){
	
		if ($this->session->userdata('isLoggedIn')) {
			$data['title']='Home|CILiver-O';
			// UP8
			//print_r(date('H:i:sa'));
			//print_r($this->userdata->lastDateLogin());
			//$this->sendEmail();
			$this->load->view('User/home_page',$data);	
		}else{
			redirect('home/');
		}
	}

	function update(){
		$btn = $this->input->post('btn_edit');
		$edit = $this->input->post('edit');
		if ($edit=="username") {
			$data = array(
				'edit_name' => TRUE,
				'edit_pass' => FALSE,
				'edit_dob' => FALSE,
				'edit_gender' => FALSE
			);
		}elseif ($edit=="password") {
			$data = array(
				'edit_name' => FALSE,
				'edit_pass' => TRUE,
				'edit_dob' => FALSE,
				'edit_gender' => FALSE
			);
		}elseif ($edit=="dob") {
			$data = array(
				'edit_name' => FALSE,
				'edit_pass' => FALSE,
				'edit_dob' => TRUE,
				'edit_gender' => FALSE
			);
		}elseif ($edit=="gender") {
			$data = array(
				'edit_name' => FALSE,
				'edit_pass' => FALSE,
				'edit_dob' => FALSE,
				'edit_gender' => TRUE
			);
		}
		
		$this->load->view('User/profile_2',$data);
	}

	public function profile(){
		if ($this->session->userdata('isLoggedIn')) {
			$data['title']="Profile|CILiver-O";
			$data = array(
				'edit_name' => FALSE,
				'edit_pass' => FALSE,
				'edit_dob' => FALSE,
				'edit_gender' => FALSE
			);
			$this->load->view('User/profile_2',$data);	
		}else{
			redirect('home/');
		}
	}

	public function update_username(){

		$data['username']=$this->input->post('username');
		print_r("expression");
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
		
	}

	public function update_pass(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');

		$data['password' ]= $this->encrypt->encode($this->input->post('password'));
		$data['userid']=$this->input->post('userid');

		if ($this->form_validation->run()) {
			
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
