<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('email' , 'Email' , 'required|trim|valid_email');
        $this->form_validation->set_rules('password' , 'Password' , 'required|trim');
        
        if($this->form_validation->run() == false){
            $data['title'] = "Login Yahisha";
            $this->load->view('templates/auth_header' , $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer'); 
        }else{
            // success validation
            $this->_login();
        }   
    }

    public function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'email' => $email
        );
        $user = $this->M_Proses->cek_login('user' , $where)->row_array();
        
        // jika user ada
        if($user > 0){
            // jika user aktif
            if($user['is_active'] == 1){
                // cek password 
                if(password_verify($password, $user['password'])){
                    $datasession = array(
                        'id_session' => $user['id_user'],
                        'status' => "login"
                    );

                    $this->session->set_userdata($datasession);
                    // redirect disini
                    redirect ('Dashboard');
                }else{
                    $this->session->set_flashdata('message' , '<div class="alert alert-danger" role="alert">
                   Password anda salah! silahkan coba kembali</div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message' , '<div class="alert alert-danger" role="alert">
                Email anda belum di aktivasi</div>');
                redirect('auth');
            }

        }else{
            $this->session->set_flashdata('message' , '<div class="alert alert-danger" role="alert">
            Email anda belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function register(){
        $this->form_validation->set_rules('name' , 'Name' , 'required|trim');
        $this->form_validation->set_rules('email' , 'Email' , 'required|trim|valid_email|is_unique[user.email]' ,
        [
            'is_unique' => 'Email sudah terdaftar!'
        ]
        );
        $this->form_validation->set_rules('password1' , 'Password' , 'required|trim|min_length[3]|matches[password2]',
        [
            'matches'=> "Password tidak sama",
            'min_length' => "Password terlalu pendek"
        ]
        );
        $this->form_validation->set_rules('password2' , 'Password' , 'required|trim|matches[password1]');

        if($this->form_validation->run() == false){
            $data['title'] = "Registrasi Yahisha";
            $this->load->view('templates/auth_header' , $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer'); 
        }else{
            $data = array(
                'nama' => htmlspecialchars($this->input->post('name' , true)),
                'email' => htmlspecialchars($this->input->post('email' , true)),
                'image' => 'default.jpg',
                'password' => md5($this->input->post('password')),
                'date_created' =>time()
            );

            $this->M_Proses->insertData('user', $data);
            $this->session->set_flashdata('message' , '<div class="alert alert-success" role="alert">
            <strong>Selamat!</strong> Akun anda berhasil di buat. Silahkan Login</div>');            
            redirect('auth');
        }
        
    }

    public function aksi_logout(){
        $this->session->unset_userdata($data_session);
        $this->session->sess_destroy($data_session);
        redirect('Auth');
    }
}