<?php
class Bus extends CI_Controller {
	private $view_index = "bus/index";
	private $view_add = "bus/add";

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Bus');
	}

	/*
	* index Method
	* list all buses in the database
	*/
	public function index()
	{
		$this->redirectPage();
		$data['view'] = 'buses/index';
		$data['busesData'] = $this->Model_Bus->listBuses();
		$this->load->view('layout', $data);
	}

	/*
	* add Method
	* Use to create new bus
	*/
	public function add()
	{
		$this->redirectPage();
		$data = $this->input->post();
		if(!empty($data)){
			if($this->Model_Bus->createBus($data)){
				redirect($this->view_index);
			}else{
				redirect($view_add);
			}
		}
		$data['view'] = 'buses/add';
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
			$data['busData'] = $this->Model_Bus->getBus($id);
			$data['view'] = 'buses/update';
			$this->load->view('layout', $data);
		}

		if (!empty($this->input->post())) {
			$data = $this->input->post();
			// print_r($data); die;
			$this->Model_Bus->update($data);
			redirect($this->view_index);
		}

	}

	/*
	* delete Method
	* Use to delete one record of table
	* @parameter $id >> id of record to delete.
	*/
	public function delete($id){
		if($id != null){
			$this->Model_Bus->delete($id);
			redirect($this->view_index);
		}
	}

}
