<?php 
class User extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Proses');
        $this->load->library('form_validation');
    }

    public function index(){

        $this->data['JudulWebsite'] = 'Administrator';
        $this->data['PageView'] = "administrator/pages/user/view";

        $Folder = $this->data['Folder'];    
        
        
        if(!$this->input->post()){
          
            $this->data['DT_User'] = $this->M_Proses->getData('user');
            $this->load->view($this->data['UrlTemplate'] , $this->data);
        }else if($this->input->post('insert')){ 
            
                    $this->form_validation->set_rules('name','Nama','required|trim');
                    $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');


                    if($this->form_validation->run() == false){
                        
                    }else{
                        $data = array(
                            'nama' => htmlspecialchars($this->input->post('name' , true)),
                            'email' => htmlspecialchars($this->input->post('email' , true)),
                            'foto_admin' => 'default.jpg',
                            'password' => md5($password1),
                            'role_id' => 2,
                            'is_active' => 1,   
                            'date_created' =>time()
                        );
            
                        $this->M_Proses->insertData('user', $data);
                        $this->session->set_flashdata('message' , '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <strong>Selamat!</strong> Akun baru berhasil di tambahkan!
                                                        </div>');            
                        redirect('index.php/User');
                    }
                   
        }else if($this->input->post('delete')){
            $id_user = $this->input->post('id_user');
            $where = array('id_user' => $id_user);

            $queryDelete = $this->M_Proses->deleteData('user' , $where);

            if($queryDelete){
                echo "<script>
                    alert(' Data User Berhasil di hapus');
                    window.location.href=('". base_url('index.php/User') ."');
                    </script>";
            }else {
                echo "<script>
                    alert(' Maaf, Data User gagal di hapus');
                    window.location.href=('". base_url('index.php/User') ."');
                    </script>";
            }
        }else {
            echo "<script>
               alert('Maaf, Terjadi Kesalahan');
               window.location.href=('". base_url('index.php/User') ."');
               </script>";
       }
    }

    public function addUserAPI(){
        $this->form_validation->set_rules('name','Nama','required|trim', [
            'required' => 'Nama lengkap tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email anda salah, silahkan coba lagi!',
            'is_unique' => 'Maaf,Email sudah di gunakan!'
        ]);
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]', [
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2','Confirmasi Password','required|matches[password1]',[
            'required' => 'Konfirmasi password tidak boleh kosong!',
            'matches' => 'Konfirmasi password tidak sama!'
        ]);
        if($this->form_validation->run() == false){
            $this->output->set_status_header(400);
            $errors = [
                "name" => form_error("name"," "," "),
                "email" => form_error("email"," "," "),
                "password1" => form_error("password1"," "," "),
                "password2" => form_error("password2"," "," "),
            ];
            echo json_encode($errors);
        }else{
            $password1 = $this->input->post('password1' , true);
            $data = array(
                'nama' => htmlspecialchars($this->input->post('name' , true)),
                'email' => htmlspecialchars($this->input->post('email' , true)),
                'foto_admin' => 'default.jpg',
                'password' => md5($password1),  
                'date_created' =>time()
            );

            $this->M_Proses->insertData('user', $data);
            echo json_encode(["message"=>"Berhasil"]);
        }
    }

}
?>