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
    public function update_total_score($total_marks){
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'total_score' => $total_marks,
            'date_time' => date('Y-m-d H:i:s')
        );
        $this->db->where('id ', $user_id);
        $this->db->update('tbl_student', $data);
    }
}
?>