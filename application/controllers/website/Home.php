<?php
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Productmodel');
        $this->load->model('website/Homemodel');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $data['categories']=$this->Productmodel->listcategories();
        // print_r($categories);
       
        //$this->load->view('website/header');
        $this->load->view('website/home',$data);
        //$this->load->view('website/footer');
    }
}
?>