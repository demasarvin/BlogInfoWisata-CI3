<?php
    class Post extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Post_model');
        }

        public function index()
        {
            $data['judul'] = "Halaman Post";

            $this->load->library('pagination');

            $config['base_url'] = 'https://plesire.herokuapp.com/post/index';

            if(isset($_POST['submit'])){
                $data['keyword'] = $this->input->post('keyword');
                $this->session->set_userdata('keyword',$data['keyword']);
            }else{
                $data['keyword'] = $this->session->userdata('keyword');
            }
            $config['total_rows'] = $this->Post_model->countPosts($data['keyword']);
            
            //styling pagination

            $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $config['per_page'] = 10;

            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);

            
            $data['posts'] = $this->Post_model->getPosts($config['per_page'],$data['start'], $data['keyword']);
            

            $this->load->view('templates/header',$data);
            $this->load->view('post/index',$data);
            $this->load->view('templates/footer');
        }

        public function tambah()
        {
            if(logged_in()){
                $data['judul'] = "Tambah Post";
                $this->form_validation->set_rules('judul','judul post','required');
                $this->form_validation->set_rules('isi','isi post','required');
                if($this->form_validation->run()==FALSE){
                    $this->load->view('templates/header', $data);
                    $this->load->view('post/tambah');
                    $this->load->view('templates/footer');
                }
                else{
                    $this->Post_model->tambahPost();
                    $this->session->set_flashdata('pesan',' Ditambahkan');
                    $this->session->set_flashdata('tipe','success');
                    redirect(base_url()."post");
                }
            } else {
                redirect('auth');
            }    
        }

        public function update($id){
            if(logged_in()){
                $data['judul'] = 'Update Post';
                $data['post'] = $this->Post_model->getPostById($id);
                $this->form_validation->set_rules('judul','judul post','required');
                $this->form_validation->set_rules('isi','isi post','required');
                if($this->form_validation->run()==FALSE){
                    $this->load->view('templates/header', $data);
                    $this->load->view('post/update');
                    $this->load->view('templates/footer');
                }
                else{
                    $this->Post_model->updatePost($id);
                    $this->session->set_flashdata('pesan',' Diupdate');
                    $this->session->set_flashdata('tipe','primary');
                    redirect(base_url()."post");
                }
            } else {
                redirect('auth');
            } 
        }
        public function hapus($id){
            if(logged_in()){
                $this->Post_model->hapusPost($id);
                $this->session->set_flashdata('pesan',' Dihapus');
                $this->session->set_flashdata('tipe','danger');
                redirect(base_url() . "post");
            } else {
                redirect('auth');
            } 
        }

        public function artikel($id)
        {
            $data['judul'] = "Artikel";
            $data['post'] = $this->Post_model->getPostById($id);

            $this->load->view('templates/header', $data);
            $this->load->view('post/artikel');
            $this->load->view('templates/footer');
        }
    }