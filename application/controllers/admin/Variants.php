<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variants extends CI_Controller {

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
		$this->load->model('admin/Variantmodel');
		
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}

	
	public function index()
	{
	    $data['variants']=$this->Variantmodel->listvariants();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/variant/variants',$data);
		$this->load->view('admin/includes/footer');
	}
	
	
	public function delete(){
	    $this->Variantmodel->delete($this->input->post('id'));
		$this->session->set_flashdata('error','Variant deleted successfully');
	}
	
	public function add(){
		
        $data['variants']=$this->Variantmodel->listvariants();
	    if(isset($_POST['add']))
		{
		    
		    $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('variant_name', 'Variant name', 'required|callback_countryname_exists');
			$this->form_validation->set_rules('code', 'code', 'required');

		
			if($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/variant/variants',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
                
			    $data = array(
			        'variant_name' => $this->input->post('variant_name'),
					'code' => $this->input->post('code'),
			        'is_active' => 1,
			        );
					//print_r($data);exit;
				$this->Variantmodel->insert($data);
				$this->session->set_flashdata('success','New record inserted...');
				redirect('admin/variants');
			}
		}
		else
		{
		    $this->load->view('admin/includes/header');
			$this->load->view('admin/variant/variants',$data); 
			$this->load->view('admin/includes/footer');
		}
	}
	
	public function edit(){
        $data['variants']=$this->Variantmodel->listvariants();
	    if(isset($_POST['edit']))
		{
            
		    $id=$this->input->post('id'); //echo $id;die();
			$data['variantDet']=$this->Variantmodel->get($id);
			$this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('variant_name', 'Name', 'required');
			$this->form_validation->set_rules('code', 'Code', 'required');
		
			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/variant/variants',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{

				$data = array(
			        'variant_name' => $this->input->post('variant_name'),
					'code' => $this->input->post('code'),
			        'is_active' => 1,
			        );
				$this->Variantmodel->update($id,$data);
				$this->session->set_flashdata('success','Variant details updated...');
				redirect('admin/variants');
			}
		}
		else
		{
			$id=$this->input->post('id'); //echo $roleid;die();
			$data['variantDet']=$this->Variantmodel->get($id);
			$this->load->view('admin/includes/header');
			$this->load->view('admin/variant/variants',$data); 
			$this->load->view('admin/includes/footer');
		}
	}

	public function countryname_exists($country)
	{
		if ($this->Variantmodel->check_countryname_exists($country)) {
			$this->form_validation->set_message('countryname_exists', 'The {field} is already taken.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
