<?php
class Questionmodel extends CI_Model {
    public function insert($data,$table) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function listquestion() {
        $this->db->select('*');
		$this->db->from('tbl_question');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_question');
    }

    

}
?>