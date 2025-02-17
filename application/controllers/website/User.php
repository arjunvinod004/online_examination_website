<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('website/Usermodel');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function login_form() {
        $this->load->view('website/header');
        $this->load->view('website/login');
        $this->load->view('website/footer');
    }

    public function login_user() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile_number', 'Mobile number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('website/header');
            $this->load->view('website/login');
            $this->load->view('website/footer');
        } else {
            $email = $this->input->post('email');
            $mobile_number = $this->input->post('mobile_number');

            $user = $this->Usermodel->get_user_by_email($email,$mobile_number);
            
            if ($user && $mobile_number == $user->mobno) 
            {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('username', $user->name);
                redirect('website/Questionnaire');
            } else
            {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('website/user/login_form');
            }
        }
    }
}