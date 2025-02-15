<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends CI_Controller {

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
		$this->load->model('admin/Taxmodel');
        $this->load->model('admin/Countrymodel');
		
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}

	
	public function index()
	{
	    $data['taxes']=$this->Taxmodel->listtaxes();//print_r($data['taxes']);exit;
        $data['countries']=$this->Countrymodel->listcountries();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/tax/taxes',$data);
		$this->load->view('admin/includes/footer');
	}
	
	
	public function delete(){
	    $this->Taxmodel->delete($this->input->post('id'));
		$this->session->set_flashdata('error','Tax deleted successfully');
	}
	
	public function add(){
		$data['taxes']=$this->Taxmodel->listtaxes();
        $data['countries']=$this->Countrymodel->listcountries();
	    if(isset($_POST['add']))
		{
		    
		    $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('country_id', 'Country name', 'required');
			$this->form_validation->set_rules('tax_type', 'Tax type', 'required');
			$this->form_validation->set_rules('tax_rate', 'Tax rate', 'required');

		
			if($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/tax/taxes',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
                
			    $data = array(
			        'country_id' => $this->input->post('country_id'),
					'tax_type' => $this->input->post('tax_type'),
			        'tax_rate' => $this->input->post('tax_rate'),
			        'is_active' => 1,
			        );
					//print_r($data);exit;
				$this->Taxmodel->insert($data);
				$this->session->set_flashdata('success','New record inserted...');
				redirect('admin/tax');
			}
		}
		else
		{
		    $this->load->view('admin/includes/header');
			$this->load->view('admin/tax/taxes',$data); 
			$this->load->view('admin/includes/footer');
		}
	}
	
	public function edit(){
		$data['taxes']=$this->Taxmodel->listtaxes();
        $data['countries']=$this->Countrymodel->listcountries();
	    if(isset($_POST['edit']))
		{
            
		    $id=$this->input->post('id'); //echo $id;die();
			$data['taxDet']=$this->Taxmodel->get($id);
			$this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('country_id', 'Country name', 'required');
			$this->form_validation->set_rules('tax_type', 'Tax type', 'required');
			$this->form_validation->set_rules('tax_rate', 'Tax rate', 'required');
		
			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/tax/taxes',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{

				$data = array(
			        'country_id' => $this->input->post('country_id'),
					'tax_type' => $this->input->post('tax_type'),
			        'tax_rate' => $this->input->post('tax_rate'),
			        'is_active' => 1,
			        );
				$this->Taxmodel->update($id,$data);
				$this->session->set_flashdata('success','Tax details updated...');
				redirect('admin/tax');
			}
		}
		else
		{
			$id=$this->input->post('id'); //echo $roleid;die();
			$data['taxDet']=$this->Taxmodel->get($id);
			$this->load->view('admin/includes/header');
			$this->load->view('admin/tax/taxes',$data); 
			$this->load->view('admin/includes/footer');
		}
	}
}
