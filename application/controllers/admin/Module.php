<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller {

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
		$this->load->model('Modulemodel');
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}
	public function index()
	{
	    $data['module']=$this->Modulemodel->listmodules();
		$this->load->view('includes/header');
		$this->load->view('role/modules');
		$this->load->view('includes/footer');
	}
	public function delete(){
	    $this->Modulemodel->delete($this->input->post('id'));
		$this->session->set_flashdata('error','Module deleted successfully');
	}
	public function add(){
	    // $data['module']=$this->Modulemodel->listmodules();
	    if(isset($_POST['add']))
		{
		    
		    $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('modulename', 'Module Name', 'required');
			$this->form_validation->set_rules('modulecode', 'Module Code', 'required');
		
			if($this->form_validation->run() == FALSE) 
			{
				$this->load->view('includes/header');
			    $this->load->view('role/modules',$data); 
			    $this->load->view('includes/footer');
			}
			else
			{
			    $moduledata = array(
			        'modulename' => $this->input->post('modulename'),
			        'modulecode' => $this->input->post('modulecode'),
			        'moduletype' => 'Leftmenu',
			        'icon' => $this->input->post('icon'),
			        'is_active' => 1,
			        );
				$this->Modulemodel->insert($moduledata);
				$this->session->set_flashdata('success','New record inserted...');
				redirect('module');
			}
		}
		else
		{
		    $this->load->view('includes/header');
			$this->load->view('role/modules',$data); 
			$this->load->view('includes/footer');
		}
	}
	
	public function edit(){
	    if(isset($_POST['edit']))
		{
		    $moduleid=$this->input->post('moduleid'); //echo $roleid;die();
			$data['moduleDet']=$this->Modulemodel->get($moduleid);
			$this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('modulename', 'Module Name', 'required');
			$this->form_validation->set_rules('modulecode', 'Module Code', 'required');
		
			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->view('includes/header');
			    $this->load->view('role/modules',$data); 
			    $this->load->view('includes/footer');
			}
			else
			{
				$moduledata = array(
			        'modulename' => $this->input->post('modulename'),
			        'modulecode' => $this->input->post('modulecode'),
			        'moduletype' => 'Leftmenu',
			        'icon' => $this->input->post('icon'),
			        'is_active' => 1,
			        );
				$this->Modulemodel->update($moduleid,$moduledata);
				$this->session->set_flashdata('success','Module details updated...');
				redirect('module');
			}
		}
		else
		{
		    $data['module']=$this->Modulemodel->listmodules();
			$moduleid=$this->input->post('moduleid'); //echo $roleid;die();
			$data['moduleDet']=$this->Modulemodel->get($moduleid);
			$this->load->view('includes/header');
			$this->load->view('role/modules',$data); 
			$this->load->view('includes/footer');
		}
	}
}
