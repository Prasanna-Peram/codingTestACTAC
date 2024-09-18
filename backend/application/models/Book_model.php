<?php
class Book_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_books() {
        return $this->db->get('books')->result_array();
    }

    public function create_book($book) {
        return $this->db->insert('books', $book);
    }
    public function get_book($id) {
        return $this->db->get_where('books', ['id' => $id])->row_array();
    }

    public function update_book($id, $book) {
        $this->db->where('id', $id);
        return $this->db->update('books', $book);
    }
    public function delete_book($id) {
        return $this->db->delete('books', array('id' => $id));
    }
}
?>
