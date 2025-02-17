<?php
class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Studentmodel');
    }

    public function index()
	{
        $data['students']=$this->Studentmodel->liststudents();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/student/list',$data);
		$this->load->view('admin/includes/footer');
	}

    public function delete(){
	    $this->Productmodel->delete_category($this->input->post('id'));
		$this->session->set_flashdata('error','Category deleted successfully');
	}

    public function student_form()
    {
        $this->load->view('admin/includes/header');
        $this->load->view('admin/student/add'); 
        $this->load->view('admin/includes/footer');

    }

    // Function to add a product with translations
    public function add() {
        // echo "here";
        $data = array(
            'name' => $this->input->post('name'),
            'email'=>$this->input->post('email'),
            'mobno'=>$this->input->post('mobileno'),
            'address'=>$this->input->post('address'),
            'remarks'=>$this->input->post('remarks'),
            'status'=>$this->input->post('user-status'),
        );
        // print_r($data);exit;
        $this->Productmodel->insert($data,"tbl_student");
    // Redirect or display success message
         redirect('admin/student');
}

public function edit(){
}

}
?>