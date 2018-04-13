<?php
class User extends CI_Controller {
	private $view_index = "user/index";
	private $view_add = "user/add";

	function __construct(){
		parent::__construct();
		$this->load->model('Model_User');
	}

	/*
	* index Method
	* list all users in the database
	*/
	public function index()
	{
		$this->redirectPage();
		$data['view'] = 'users/index';
		$data['usersData'] = $this->Model_User->listUser();
		$this->load->view('layout', $data);
	}

	/*
	* add Method
	* Use to create new user
	*/
	public function add()
	{
		$this->redirectPage();
		$data = $this->input->post();
		if(!empty($data)){
			$data['password'] = md5($data['password']); //encript password
			if($this->Model_User->createUser($data)){
				redirect($this->view_index);
			}else{
				redirect($this->view_add);
			}
		}
		$data['view'] = 'users/add';
		$this->load->view('layout', $data);
	}

	/*
	* login Method
	* Use to create login in the system and create the session
	*/
	public function login(){
		$data = $this->input->post();
		if($this->session->userdata('username')){
			redirect($this->view_index);
		}

		if (!empty($data)) {
			if($this->Model_User->login( $data )){
				$this->session->set_userdata('username',$data['username']);
				redirect( $this->view_index );
			}else{
				redirect('user/login');
			}
		}
		$data['view'] = 'users/login';
		$this->load->view('layout', $data);
	}

	/*
	* redirectPage Method
	* use to validate session and redirect to login
	*/
	private function redirectPage(){
		if(!$this->session->userdata('username')){
			redirect('user/login');
		}
	}

	/*
	* update Method
	* Use to Update one record of table
	* @parameter $data >> new data to save
	*/
	public function update($id = null){
		$this->redirectPage();
		if ($id != null) {
			$data['userData'] = $this->Model_User->getUser($id);
			$data['view'] = 'users/update';
			$this->load->view('layout', $data);
		}

		if (!empty($this->input->post())) {
			$data = $this->input->post();
			$this->Model_User->update($data);
			redirect($this->view_index);
		}

	}

	/*
	* delete Method
	* Use to delete one record of table
	* Parameters $id >> id of record to delete.
	*/

	public function delete($id){
		if($id != null){
			$this->Model_User->delete($id);
			redirect($this->view_index);

		}
	}

	/*
	* delete Method
	* Use to logout of systen and destroy the session
	*/

	public function logout(){
		$this->session->sess_destroy();
		redirect('route/search');
	}

}
