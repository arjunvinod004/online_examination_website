<?php 
require_once FCPATH . 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function export_to_excel() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Retrieve data from database
        $query = $this->db->get('tbl_exam_sheet'); // Replace with your table name
        $data = $query->result_array();

        // Set header row
        $headers = array_keys($data[0]);
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '1', ucfirst($header));
            $column++;
        }

        // Insert data rows
        $row = 2;
        foreach ($data as $record) {
            $column = 'A';
            foreach ($record as $value) {
                $sheet->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }

        // Generate file
        $filename = 'database_export.xlsx';
        $writer = new Xlsx($spreadsheet);
        $filePath = FCPATH . 'uploads/' . $filename;

        $writer->save($filePath);

        // Force download
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}
?>