<?php 
class Tentang extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Proses');
    }

    public function index(){

        $this->data['JudulWebsite'] = 'Administrator';
        $this->data['PageView'] = "administrator/pages/tentang/view";

        $Folder = $this->data['Folder'];
        
        if(!$this->input->post()){
            $this->data['DT_Tentang'] = $this->M_Proses->getData('tb_tentang');
            $this->load->view($this->data['UrlTemplate'] , $this->data);
        }else{
            if($this->input->post('insert') || $this->input->post('update')){
                $loc_foto = $_FILES['thumbnail']['tmp_name'];
                if($this->input->post('insert')){
                    $nama_file = $_FILES['thumbnail']['name'];
                    $nama_file = $this->RenameFile($nama_file, 'Foto-tentang');
                }
            }

            if($this->input->post('delete') || $this->input->post('update')){
                $id_tentang = StrNum($this->input->post('id_tentang'));
                $where = array('id_tentang' => $id_tentang);
            }

            if($this->input->post('insert')){
                $nama_tentang = $this->input->post('nama_tentang');
                $data = array(
                    'foto' => $nama_file,
                    'nama_tentang' => $nama_tentang
                );
                $upload = move_uploaded_file($loc_foto, $Folder.$nama_file);
                if($upload){
                    $sql = $this->M_Proses->insertData('tb_tentang', $data);
                    if($sql){
                        echo "<script>
                                alert('Data tentang Berhasil di Tambahkan');
                                window.location.href=('". base_url('index.php/Tentang') ."');
                            </script>";
                    }else {
                        echo "<script>
                                alert('Maaf, Data tentang gagal  di Tambahkan');
                                window.location.href=('". base_url('index.php/Tentang') ."');
                            </script>";
                    }
                }else{
                    $sql = FALSE;
                    echo "<script>
                        alert('Mohon maaf, upload Data tentang  gagal. Mohon coba lagi beberapa saat lagi.');
                        window.location.href=('". base_url('index.php/Tentang') ."');
                    </script>";
                }
            }else if($this->input->post('update')){
                $nama_tentang = $this->input->post('nama_tentang');
                $fileold = $this->input->post('fileold');
                $lokasifile = $_FILES['thumbnail']['tmp_name'];
                $nama_file = $_FILES['thumbnail']['name'];
                $where = array('id_tentang' => $id_tentang);

                if(!empty($lokasifile)){

                    $rename = $this->RenameFile($nama_file,'Foto-Tentang');
                    if(move_uploaded_file($lokasifile, $this->data['Folder'].$rename)){
                        $this->DeleteFile($fileold);    
                        $data = array(
                            'foto' => $rename,
                            'nama_tentang' => $nama_tentang
                        );
                    }else{
                        $data = array(
                            'foto' => $fileold,
                            'nama_tentang' => $nama_tentang
                        );
                    }
                    
                }else{
                    $data = array(
                        'nama_tentang' => $nama_tentang
                    );
                }
              
                $sqlUpdate = $this->M_Proses->updateData('tb_tentang', $data, $where);
                if($sqlUpdate){
                    echo "<script>
                            alert('Data tentang Berhasil di Ubah');
                            window.location.href=('". base_url('index.php/Tentang') ."');
                        </script>";
                }else {
                    echo "<script>
                            alert('Maaf, Data tentang gagal  di Ubah');
                            window.location.href=('". base_url('index.php/Tentang') ."');
                        </script>";
                }
            }else if($this->input->post('delete')){
                $fileold = $this->input->post('fileold');
                $id_tentang = $this->input->post('id_tentang');

                $this->DeleteFile($fileold);    
                $where = array('id_tentang' => $id_tentang);
                $sqlDelete = $this->M_Proses->deleteData('tb_tentang', $where);
                if($sqlDelete){
                    echo "<script>
                            alert('Data tentang Berhasil di Hapus');
                            window.location.href=('". base_url('index.php/Tentang') ."');
                        </script>";
                }else {
                    echo "<script>
                            alert('Maaf, Data tentang gagal  di Hapus');
                            window.location.href=('". base_url('index.php/Tentang') ."');
                        </script>";
                }
            }else{
                echo "<script>
                    alert('Maaf,  Data tentang memiliki kesalahan');
                    window.location.href=('". base_url('index.php/Tentang') ."');
                </script>";
            } 
        }
    }
}
?>