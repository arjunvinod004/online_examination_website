<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

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
		$this->load->model('admin/Countrymodel');
		
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}

	
	public function index()
	{
	    $data['countries']=$this->Countrymodel->listcountries();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/country/countries',$data);
		$this->load->view('admin/includes/footer');
	}
	
	
	public function delete(){
	    $this->Countrymodel->delete($this->input->post('id'));
		$this->session->set_flashdata('error','Country deleted successfully');
	}
	
	public function add(){
        $data['countries']=$this->Countrymodel->listcountries();
	    if(isset($_POST['add']))
		{
		    
		    $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('country_name', 'Country name', 'required|callback_countryname_exists');
			$this->form_validation->set_rules('currency', 'Currency', 'required');

		
			if($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/country/countries',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
                
			    $data = array(
			        'name' => $this->input->post('country_name'),
					'currency' => $this->input->post('currency'),
					'support_no' => $this->input->post('supportno'),
                    'support_email' => $this->input->post('supportemail'),
			        'is_active' => 1,
			        );
					//print_r($data);exit;
				$this->Countrymodel->insert($data);
				$this->session->set_flashdata('success','New record inserted...');
				redirect('admin/country');
			}
		}
		else
		{
		    $this->load->view('admin/includes/header');
			$this->load->view('admin/country/countries',$data); 
			$this->load->view('admin/includes/footer');
		}
	}
	
	public function edit(){
        $data['countries']=$this->Countrymodel->listcountries();
	    if(isset($_POST['edit']))
		{
            
		    $id=$this->input->post('id'); //echo $id;die();
			$data['countryDet']=$this->Countrymodel->get($id);
			$this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('country_name', 'Name', 'required');
			$this->form_validation->set_rules('currency', 'Currency', 'required');
		
			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/country/countries',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{

				$data = array(
			        'name' => $this->input->post('country_name'),
					'currency' => $this->input->post('currency'),
					'support_no' => $this->input->post('supportno'),
                    'support_email' => $this->input->post('supportemail'),
			        'is_active' => 1,
			        );
				$this->Countrymodel->update($id,$data);
				$this->session->set_flashdata('success','Country details updated...');
				redirect('admin/country');
			}
		}
		else
		{
			$id=$this->input->post('id'); //echo $roleid;die();
			$data['countryDet']=$this->Countrymodel->get($id);
			$this->load->view('admin/includes/header');
			$this->load->view('admin/country/countries',$data); 
			$this->load->view('admin/includes/footer');
		}
	}

	public function countryname_exists($country)
	{
		if ($this->Countrymodel->check_countryname_exists($country)) {
			$this->form_validation->set_message('countryname_exists', 'The {field} is already taken.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}