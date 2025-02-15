<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}
	public function index()
	{
	    $this->load->model('website/Homemodel');

		$controller = $this->router->fetch_class(); // Gets the current controller name
		$method = $this->router->fetch_method();   // Gets the current method name
		$data['controller'] = $controller;
        $logged_in_store_id = $this->session->userdata('logged_in_store_id');//echo $logged_in_store_id;exit;
        
        $store_details = $this->Homemodel->get_store_details_by_store_id($logged_in_store_id);
        $support_details = $this->Homemodel->get_support_details_by_country_id($store_details->store_country);
        $data['store_disp_name'] = $store_details->store_disp_name;
        $data['store_address'] = $store_details->store_address;
        $data['support_no'] = $support_details->support_no;
        $data['support_email'] = $support_details->support_email;
        
        $this->load->model('admin/Storemodel');
		$data['productsCount']=$this->Commonmodel->productsCount();
		$data['completedOrder']=$this->Commonmodel->completedOrder();
        $data['store_details']=$this->Storemodel->get($logged_in_store_id);
		$data['pendingOrder']=$this->Commonmodel->pendingOrder();
        $data['todayOrder']=$this->Commonmodel->todayOrder($logged_in_store_id);
        $data['totalAmount']=$this->Commonmodel->totalAmount($logged_in_store_id);
        $data['todayAmount']=$this->Commonmodel->todayAmount($logged_in_store_id);
		$this->session->set_userdata('store_name',$data['store_details'][0]['store_name']);
		//print_r($data['store_details']);exit;
		$this->load->view('owner/includes/header',$data);
		$this->load->view('owner/dashboard',$data);
		$this->load->view('owner/includes/footer');
	}

	public function getHolidaysByStoreId(){
		$store_id = $this->session->userdata('logged_in_store_id');
// echo json_encode($data); exit;
		$this->load->model('owner/Ordermodel');
		$getholidaydays=$this->Ordermodel->GetHolidaysByStoreId($store_id);

		if (!empty($getholidaydays)) {
			$store_id = $this->session->userdata('logged_in_store_id');
			$date = date('Y-m-d');
			
			$html = '<table class="table table-striped mt-3" style="width:100%">';
			$html .= '<thead style="background: #e5e5e5;">';
			$html .= '<tr>
						<th>Sl No</th>
						<th>Name</th>
						<th>Date</th>
						<th>Actions</th>
					  </tr>';
			$html .= '</thead>';
			$html .= '<tbody>';
			
			$count = 1;
			foreach ($getholidaydays as $holiday) {
				$html .= '<tr id="order-id'  . $holiday['id'] . '">';
				$html .= '<td>' . $count. '</td>';
				$html .= '<td>' . htmlspecialchars($holiday['holiday_date']) . '</td>';
				$html .= '<td>' . htmlspecialchars($holiday['holiday_name']) . '</td>';
				$html .= '<td>';
				$html .= '<a data-bs-toggle="modal" data-bs-target="#deleteorder" type="button">';
				$html .= '<button class="btn btn-danger delete-order" data-id="' . htmlspecialchars($holiday['id']) . '">';
				$html .= '<i class="fa fa-trash"></i>';
				$html .= '</button>';
				$html .= '</a>';
				$html .= '</td>';
				
				$html .= '</tr>';
		
				$count++;
			}
		
			$html .= '</tbody>';
			$html .= '</table>';
		
			echo $html;
		} else {
			echo '<p>No Holidays found.</p>';
		}
	
}
public function DeleteHoliday(){
	$this->load->model('owner/Ordermodel');
	$rowID = $this->input->post('rowID');
	$deleted = $this->Ordermodel->Delete_Holiday($rowID);
	// Attempt to delete the holiday
	if ($deleted) {
		echo json_encode(['success' => true, 'message' => 'Holiday deleted successfully']);
	} else {
		echo json_encode(['success' => false, 'message' => 'Failed to delete the holiday']);
	}
}
	public function addHoliday(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('holiday_date', 'date', 'required');
		$this->form_validation->set_rules('holiday_name', ' name', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$response = [
				'errors' => false,
				'errors' => [
					'holiday_date' => form_error('holiday_date'),
					'holiday_name' => form_error('holiday_name')
				]
			];
			echo json_encode($response);
		}
		else
		{
			
			$store_id = $this->session->userdata('logged_in_store_id');
			$data=array(
			'store_id' => $store_id,
			'holiday_date' => $this->input->post('holiday_date'),
			'holiday_name' => $this->input->post('holiday_name'),
			'holiday_description' => $this->input->post('holiday_description'),
			);
			echo json_encode(array('success' => true));
			// echo json_encode($data); exit;
			$this->load->model('owner/Ordermodel');
			$this->Ordermodel->AddHoliday($data);
			$getholidaydays=$this->Ordermodel->GetHolidaysByStoreId($store_id);

			if (!empty($getholidaydays)) {
				$store_id = $this->session->userdata('logged_in_store_id');
				$html = '<table class="table table-striped mt-3" style="width:100%">';
				$html .= '<thead style="background: #e5e5e5;">';
				$html .= '<tr>
							<th>Id</th>
							<th>StoreId</th>
							<th>Date</th>
							<th>Name</th>
							<th>Description</th>
						  </tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
				
				$count = 1;
				foreach ($getholidaydays as $holiday) {
					$html .= '<tr id="order-id' . $holiday['id'] . '">';
					$html .= '<td>' . $count . '</td>';
					$html .= '<td>' . htmlspecialchars($holiday['store_id']) . '</td>';
					$html .= '<td>' . htmlspecialchars($holiday['holiday_date']) . '</td>';
					$html .= '<td>' . htmlspecialchars($holiday['holiday_name']) . '</td>';
					$html .= '<td>' . htmlspecialchars($holiday['holiday_description']) . '</td>';
					$html .= '</tr>';
			
					$count++;
				}
			
				$html .= '</tbody>';
				$html .= '</table>';
			
				echo $html;
			} else {
				echo '<p>No Holidays found.</p>';
			}
			
		}
	}
}