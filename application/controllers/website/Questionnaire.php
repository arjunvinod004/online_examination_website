<?php
class Questionnaire extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('website/Questionmodel');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index($question_no = 1) {
        $question = $this->Questionmodel->get_question($question_no);
        if (!$question) {
            redirect('website/Questionnaire/result'); // Redirect to result page if no more questions
        }
        $options = $this->Questionmodel->get_options($question->id);

        $this->load->view('website/header');
        $this->load->view('website/question', ['question' => $question, 'options' => $options, 'question_no' => $question_no]);
        $this->load->view('website/footer');
    }

    public function next() {
        $question_id = $this->input->post('question_id');
        $selected_option = $this->input->post('option'); 

        $question = $this->Questionmodel->get_question_by_id($question_id); 

        if ($question->answer == $selected_option) {
            $total_marks = $this->session->userdata('total_marks') ?? 0;
            $total_marks += $question->mark;
            $this->session->set_userdata('total_marks', $total_marks);
        }

        $next_question_no = $this->input->post('question_no') + 1; 
        redirect("website/Questionnaire/index/$next_question_no");
    }

    public function result() {
        $total_marks = $this->session->userdata('total_marks') ?? 0;
        $this->load->view('website/header');
        $this->load->view('website/result', ['total_marks' => $total_marks]);
        $this->load->view('website/footer');
    }

    public function clear_session() {
        $this->session->unset_userdata('total_marks');
        redirect('website/Questionnaire');  
    }

    public function generate_login_qr() {
		 require BASEPATH . 'libraries/phpqrcode/qrlib.php';
		 $codeContents = base_url() . 'website/User/login_form/';
		 QRcode::png($codeContents, false, QR_ECLEVEL_L, 10, 2);
	}
}
?>