<?php
class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_User');
	}

	public function index()
	{
		$this->redirectPage();
		$data['view'] = 'users/index';
		$data['usersData'] = $this->Model_User->listUser();
		$this->load->view('layaout', $data);
	}


	public function add()
	{
		$this->redirectPage();
		$data = $this->input->post();
		if(!empty($data)){
			$data['password'] = md5($data['password']); //encript password
			if($this->Model_User->createUser($data)){
				redirect('user/index');
			}else{
				redirect('user/add');
			}
		}
		$data['view'] = 'users/add';
		$this->load->view('layaout', $data);
	}

	public function login(){
		$data = $this->input->post();
		if($this->session->userdata('username')){
			redirect('user/index');
		}

		if (!empty($data)) {
			if($this->Model_User->login( $data )){
				$this->session->set_userdata('username',$data['username']);
				redirect( 'user/index' );
			}else{
				redirect('user/login');
			}
		}
		$data['view'] = 'users/login';
		$this->load->view('layaout', $data);
	}

	private function redirectPage(){
		if(!$this->session->userdata('username')){
			redirect('user/login');
		}
	}

	public function update($id = null){
		$this->redirectPage();
		if ($id != null) {
			$data['userData'] = $this->Model_User->getUser($id);
			$data['view'] = 'users/update';
			$this->load->view('layaout', $data);
		}

		if (!empty($this->input->post())) {
			$data = $this->input->post();
			$this->Model_User->update($data);
			redirect('user/index');
		}

	}

	public function delete($id){
		if($id != null){
			$this->Model_User->delete($id);
			redirect('user/index');

		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('user/login');
	}

}
