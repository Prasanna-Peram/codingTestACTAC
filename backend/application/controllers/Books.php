<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
         // Allow CORS
         header("Access-Control-Allow-Origin: *"); // Change '*' to your frontend URL in production
         header("Access-Control-Allow-Headers: Content-Type, Authorization");
         header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
 
         // Handle OPTIONS requests
         if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
             exit; // terminate the script for OPTIONS requests
         }
    }

    public function index() {
        $data = $this->Book_model->get_books();
        echo json_encode($data);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);

        // Check if the data is not empty
        if ($data) {
            if ($this->validate($data)) {
                $this->Book_model->create_book($data);
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Validation failed: Author must include first and last name, and description must be at least 100 characters.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data received.']);
        }
    }
    public function get($id) {
        $book = $this->Book_model->get_book($id);
        echo json_encode($book);
    }
    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        // Check if the data is not empty
        if ($data) {
            if ($this->validate($data)) {
                $this->Book_model->update_book($id, $data);
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Validation failed: Author must include first and last name, and description must be at least 100 characters.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data received.']);
        }
    }

    public function delete($id) {
        $this->Book_model->delete_book($id);
        echo json_encode(array('status' => 'success'));
    }
    private function validate($data) {
        // Validate author name
        if (!isset($data['author']) || count(explode(' ', trim($data['author']))) < 2) {
            return false;
        }
    
        // Validate description length
        if (!isset($data['description']) || strlen($data['description']) < 100) {
            return false;
        }
    
        return true;
    }
}
?>
