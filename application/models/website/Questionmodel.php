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
}
?>