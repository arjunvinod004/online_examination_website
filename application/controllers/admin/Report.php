<?php
class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Studentmodel');

       
    }

    public function index()
	{
        $data['report']= $this->Studentmodel->get_student_report();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/report',$data);
		$this->load->view('admin/includes/footer');
	}


}
?>