<?php
class Login extends CI_Controller{
    
    public $data  = [
         "JudulWebsite" => "Administrator",
         "PageView" => "",
         "UrlTemplate" => "administrator/template",
         "UserAwal" => "auth/awal"
     ];
    
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Proses');
        $this->load->library('form_validation');

    }

    public function index(){
        $this->data['title'] = 'Login &rsaquo; Mascuy';
        $this->data['PageView'] = "auth/pages/login";
        $this->load->view($this->data['UserAwal'] , $this->data);
    }
                                                                               
    public function aksi_login(){
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'email' => $email,
            'password' => md5($password)
        );

        $cek = $this->M_Proses->cek_login("user" , $where)->num_rows();
        // check 
        if($cek > 0){
            // pengambilan data
            $where = array('email' => $email, 'password' => md5($password));
            $data = $this->M_Proses->getDataById('user', $where);

            if(!empty($data)){
                foreach ($data as $datauser) {
                    $id_user = $datauser->id_user;
                }

                $dataarray = array('ID_SESSION' => $id_user,
                                   'LOGIN_SESSION' => TRUE);

                // pembuatan session
                $this->session->set_userdata($dataarray);
                redirect ('Menu');
                // var_dump($this->session->userdata());
            }else{
                echo "<script>
                alert('Maaf, Terjadi kesalahan. Coba beberapa saat lagi');
                window.location=('". base_url('index.php/login') ."');
                 </script>";
            }
          
        }else{
            echo "<script>
            alert('Maaf, email/Password salah!');
            window.location=('". base_url('index.php/login') ."');
             </script>";
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
            $data['title'] = "Registrasi &rsaquo; Yahisha";
            $this->load->view('templates/auth_header' , $data);
            $this->load->view('auth/pages/register');
            $this->load->view('templates/auth_footer'); 
        }else{
            $data = array(
                'nama' => htmlspecialchars($this->input->post('name' , true)),
                'email' => htmlspecialchars($this->input->post('email' , true)),
                'image' => 'default.jpg',
                'password' => md5($this->input->post('password1')),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' =>time()
            );

            $this->M_Proses->insertData('user', $data);
            $this->session->set_flashdata('message' , '<div class="alert alert-success" role="alert">
            <strong>Selamat!</strong> Akun anda berhasil di buat. Silahkan Login</div>');            
            redirect('index.php/Login');
        }
        
    }

    public function aksi_logout(){
        $this->session->unset_userdata($data_session);
        $this->session->sess_destroy($data_session);
        redirect('login');
    }
}


?>