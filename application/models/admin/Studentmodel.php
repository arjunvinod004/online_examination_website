<?php
class Studentmodel extends CI_Model {


	public function insert($data,$table) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }


	public function liststudents() {
        $this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
    }
    
    public function get_students_count(){

    $this->db->from('tbl_student');
    return $this->db->count_all_results();

    }
	// public function update_categories($id, $data) {
    //     $this->db->where('category_id', $id);
    //     $this->db->update('categories', $data);
    //     return true;
    // }

	// public function delete_category($id){
	// 	$this->db->where('category_id', $id);
    //     return $this->db->delete('categories');
	// }
}
?>