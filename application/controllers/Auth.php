<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if(logged_in()){
            redirect('home');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page';
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/footer');
        } else {
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->getUserByEmail($email);
        if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $email
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message1', '<small class=" text-danger">Password salah</small>');
                    redirect('auth');
                }
        } else {
            $this->session->set_flashdata('message', '<small class=" text-danger">Email belum terdaftar</small>');
            redirect('auth');
        }
    }

    public function register()
    {
        if(logged_in()){
            redirect('home');
        }
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[4]|matches[password2]',[
        'matches' => 'Password does not match!',
        'min_lenght' => 'Password too short'
        ]);

        $this->form_validation->set_rules('password2', 'Password Verifikasi','required|trim|min_length[4]|matches[password1]');

        if($this->form_validation->run() == false)
        {
            $data['judul'] = 'Register Page';
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/templates/footer');        
        }
        else
        {
            $this->User_model->register();
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('auth');
    }
}