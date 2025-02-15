<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function about()
    {
        // Load the about view
        $this->load->view('website/header');
        $this->load->view('website/about');
        $this->load->view('website/footer');
    }

    public function contact()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // You can add validation and email sending logic here
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $message = $this->input->post('message');
    
            // For simplicity, just print the data (you can email or store it as needed)
            echo "Name: $name <br>Email: $email <br>Message: $message";
        } else {
            // Load the contact view
            $this->load->view('website/header');
            $this->load->view('website/contact');
            $this->load->view('website/footer');
        }
    }
}
