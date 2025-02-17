<?php
class Question extends CI_Controller {
    public function __construct() {
        parent::__construct();
         $this->load->model('admin/Questionmodel');
    }

    public function index()
	{
        $data['questions']=$this->Questionmodel->listquestion();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/question/list',$data);
		$this->load->view('admin/includes/footer');
	}

    public function question_form(){
        $this->load->view('admin/includes/header');
		$this->load->view('admin/question/add');
		$this->load->view('admin/includes/footer'); 
    }

    public function add() {
        // echo "here";
       // Collect form data
    $data = array(
        'question_name' => $this->input->post('question_name', true), // true enables XSS filtering
        'option1' => $this->input->post('option1', true),
        'option2' => $this->input->post('option2', true),
        'option3' => $this->input->post('option3', true),
        'option4' => $this->input->post('option4', true),
        'answer'  => $this->input->post('answer', true),
        'mark' => 1,
        'remarks' => $this->input->post('remarks', true),
    );
    
    if($this->Questionmodel->insert($data,"tbl_question")){
        echo json_encode(array('status' => 'success', 'redirect_url' => base_url('admin/question')));
    } else{
        echo json_encode(array('status' => 'error', 'message' => 'Failed to add student'));
    }

    
}

public function delete() {    
    $id = $this->input->post('id');
    //  echo $id;
    $this->Questionmodel->delete($id);
}
}
?>