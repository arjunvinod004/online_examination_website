<?php
class Questionmodel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_question($question_no) {
        return $this->db->get_where('tbl_question', ['id' => $question_no])->row();
    }

    public function get_question_by_id($question_id) {
        return $this->db->get_where('tbl_question', ['id' => $question_id])->row();
    }

    public function get_options($question_id) {
        return $this->db->get_where('tbl_question', ['id' => $question_id])->result();
    }
    public function insert_questionaire_answers($answers){
        $this->db->insert('tbl_exam_sheet' , $answers );
    }
    public function update_total_score_and_exam_status($total_marks){
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'total_score' => $total_marks,
            'date_time' => date('Y-m-d H:i:s'),
            'is_exam' => 1
        );
        $this->db->where('id ', $user_id);
        $this->db->update('tbl_student', $data);
    }

/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Fetches a limited number of random questions from the database.

/******  aced7dd4-219e-42d7-8b2d-4d868e35c7a7  *******/
    public function get_random_questions() {
        $this->db->distinct();
        $this->db->select('id');
        $this->db->from('tbl_question');
        $this->db->order_by('RAND()'); // Fetch random questions
        $this->db->limit(10); // Limit number of questions
        $query = $this->db->get();
        return $query->result();
    }
}
?>