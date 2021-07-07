<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('templates/auth_header');  
        $this->load->view('v_login');
        $this->load->view('templates/auth_footer');  
    }
    
    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]',['matches' => 'Password Tidak Sama', 'min_length' => 'Terlalu Pendek']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false){
            $data['title'] = 'Machine-KU Registration';
            $this->load->view('templates/auth_header', $data);  
            $this->load->view('v_daftar');
            $this->load->view('templates/auth_footer');
        }else{
            echo "berhasi";
        }
        
    }
}