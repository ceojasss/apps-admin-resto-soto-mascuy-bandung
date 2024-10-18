<?php
class MY_Controller extends CI_Controller{
    public $data  = [
        "JudulWebsite" => "Administrator",
        "PageView" => "",
        "UrlTemplate" => "administrator/template",
        "UserAwal" => "user/awal",
        'TextEditor' => FALSE,
        'PictureForbid' => 'no pict.png',
        'Folder' => './assets/img/'
        ];

        public function __construct(){
          parent::__construct();
          $this->load->model('M_Proses');
      
          if($this->session->userdata('LOGIN_SESSION') == TRUE){
            $where = array('id_user' => $this->session->userdata('ID_SESSION'));
            $data = $this->M_Proses->getDataById('user', $where);
            if(!empty($data)){
              foreach ($data as $key) {
                // var_dump($key); die;
                $this->data['SESS_id_user'] = $key->id_user;
                $this->data['SESS_nama'] = $key->nama;
                $this->data['SESS_email'] = $key->email;
                $this->data['SESS_foto_admin'] = $key->foto_admin;
                $this->data['SESS_password'] = $key->password;
                $this->data['SESS_date_created'] = $key->date_created;
              }
            }else{
              //terjadi jika data tidak ditemukan atau data admin kosong.
            }
          }else{
            redirect(base_url('index.php/login'));
          }
        }
    
    
    public function notif($notifikasi, $link){
      echo '
      <script>
        alert("'.$notifikasi.'");
        window.location=("'.$link.'");
      </script>
      ';
    }
    
    function RenameFile($nama_file,$prefix){
        $ekstensi = GetExtensi($nama_file);
        $thumbnail = date("Y-m-d").'-'.rand(0,999).'-'.$prefix.'.'.$ekstensi;
        return $thumbnail;
      }
    
    function DeleteFile($oldthumbnail){
        $Folder = $this->data['Folder'];
        if(file_exists($Folder.$oldthumbnail)){
            if($oldthumbnail != $this->data['PictureForbid']){
                unlink("$Folder$oldthumbnail");
            }
        }
    }

}

