<?php
class Route extends CI_Controller {
	private $view_index = "route/index";
	private $view_add = "routes/add";

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Route');
		$this->load->model('Model_Bus');
	}


	/*
	* index Method
	* list all routes in the database
	*/
	public function index()
	{
		$this->redirectPage();
		$data['view'] = 'routes/index';
		$data['routesData'] = $this->Model_Route->listRoutes();
		$this->load->view('layout', $data);
	}

	/*
	* add Method
	* Use to create new route
	*/
	public function add()
	{
		$this->redirectPage();
		$dataPost = $this->input->post();
		$data['view'] = 'routes/add';
		if(!empty($dataPost)){
			//VAlidations
			$this->form_validation->set_rules('city_origin', 'city_origin', 'callback_cities_check');

			if( $this->form_validation->run() && $this->Model_Route->createRoute($dataPost)){
				redirect($this->view_index);
			}else{
				$data['view'] = $this->view_add;
			}
		}

		$data['buses'] = $this->getBuses();
		$this->load->view('layout', $data);
	}

	/*
	* cities_check Method
	* validate to origin city and destination city doesn't exist in the database
	*/
	public function cities_check($origin){
		$destino = $this->input->post('city_destiny');

		if( $this->Model_Route->validateRoute($origin, $destino) ){
			return true;
		}else{
			$this->form_validation->set_message('cities_check', 'the city of origin and destination already exists in another route');
			return false;
		}
	}

	/*
	* search Method
	* Use to search the posible path in the tables routes
	*/
	public function search(){
		$postData = $this->input->post();
		if(!empty($postData)){
			$routes = $this->Model_Route->getPathRoutes();
			$data['routesData'] = $this->bfs_path($routes, $postData['origin'], $postData['destiny']);
		}
		$data['origins'] = $this->Model_Route->getListCities('city_origin');
		$data['destination'] = $this->Model_Route->getListCities('city_destiny');
		$data['view'] = 'routes/search';
		$this->load->view('layout', $data);

	}

	/*
	* getBuses Method
	* Use to get a list of the buses in database
	*/
	private function getBuses(){
		$busesResult = $this->Model_Bus->getList();
		foreach ($busesResult as $key => $bus) {
			$result [$bus->id]=  $bus->license;
		}
		return $result;
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
			$data['routeData'] = $this->Model_Route->getRoute($id);
			$data['view'] = 'routes/update';
			$data['buses'] = $this->getBuses();
			$this->load->view('layout', $data);
		}

		if (!empty($this->input->post())) {
			$data = $this->input->post();
			// print_r($data); die;
			$this->Model_Route->update($data);
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
			$this->Model_Route->delete($id);
			redirect($this->view_index);
		}
	}

/*
* bfs_path Method
* It returns a path.
* Implemented by enqueuing a path, instead of a node, for each neighbour.
* @returns array or false
*/
function bfs_path($graph, $start, $end) {
    $queue = new SplQueue();
    # Enqueue the path
    $queue->enqueue([$start]);
    $visited = [$start];
    while ($queue->count() > 0) {
        $path = $queue->dequeue();
        # Get the last node on the path
        # so we can check if we're at the end
        $node = $path[sizeof($path) - 1];

				if (is_array($node)) {
					$node = $node['node'];
				}

        if ($node === $end) {
            return $path;
        }

				if(isset($graph[$node])){
	        foreach ($graph[$node] as $neighbour) {
							$city = $neighbour['node'];
	            if (!in_array($city, $visited)) {
	                $visited[] = $city;
	                # Build new path appending the neighbour then and enqueue it
	                $new_path = $path;
	                $new_path[] = $neighbour;
	                $queue->enqueue($new_path);
	            }
	        }
				}
    }
    return false;
}

}
