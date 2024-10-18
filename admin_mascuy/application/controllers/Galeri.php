<?php 
class Galeri extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Proses');
    }

    public function index(){

        $this->data['JudulWebsite'] = 'Administrator';
        $this->data['PageView'] = "administrator/pages/galeri/view";

        $Folder = $this->data['Folder'];
        
        if(!$this->input->post()){
            $this->data['DT_Galeri'] = $this->M_Proses->getData('tb_galeri');
            $this->load->view($this->data['UrlTemplate'] , $this->data);
        }else{
            if($this->input->post('insert') || $this->input->post('update')){
                $loc_foto = $_FILES['thumbnail']['tmp_name'];
                if($this->input->post('insert')){
                    $nama_file = $_FILES['thumbnail']['name'];
                    $nama_file = $this->RenameFile($nama_file, 'Foto-Galeri');
                }
            }

            if($this->input->post('delete') || $this->input->post('update')){
                $id_galeri = StrNum($this->input->post('id_galeri'));
                $where = array('id_galeri' => $id_galeri);
            }

            if($this->input->post('insert')){
                $data = array('foto' => $nama_file);
                $upload = move_uploaded_file($loc_foto, $Folder.$nama_file);
                if($upload){
                    $sql = $this->M_Proses->insertData('tb_galeri', $data);
                    if($sql){
                        echo "<script>
                                alert('Galeri Berhasil di Tambahkan');
                                window.location.href=('". base_url('index.php/Galeri') ."');
                            </script>";
                    }else {
                        echo "<script>
                                alert('Maaf, Galeri gagal  di Tambahkan');
                                window.location.href=('". base_url('index.php/Galeri') ."');
                            </script>";
                    }
                }else{
                    $sql = FALSE;
                    echo "<script>
                        alert('Mohon maaf, upload galeri  gagal. Mohon coba lagi beberapa saat lagi.');
                        window.location.href=('". base_url('index.php/Galeri') ."');
                    </script>";
                }
            }else if($this->input->post('update')){
                $fileold = $this->input->post('fileold');
                $lokasifile = $_FILES['thumbnail']['tmp_name'];
                $nama_file = $_FILES['thumbnail']['name'];
                $where = array('id_galeri' => $id_galeri);

                if(!empty($lokasifile)){

                    $rename = $this->RenameFile($nama_file,'Foto-Galeri');
                    if(move_uploaded_file($lokasifile, $this->data['Folder'].$rename)){
                        $this->DeleteFile($fileold);    
                        $data = array(
                            'foto' => $rename
                        );
                    }else{
                        $data = array(
                            'foto' => $fileold
                        );
                    }
                }

                $sqlUpdate = $this->M_Proses->updateData('tb_galeri', $data, $where);
                if($sqlUpdate){
                    echo "<script>
                            alert('Galeri Berhasil di Ubah');
                            window.location.href=('". base_url('index.php/Galeri') ."');
                        </script>";
                }else {
                    echo "<script>
                            alert('Maaf, Galeri gagal  di Ubah');
                            window.location.href=('". base_url('index.php/Galeri') ."');
                        </script>";
                }
            }else if($this->input->post('delete')){
                $fileold = $this->input->post('fileold');
                $id_galeri = $this->input->post('id_galeri');

                $this->DeleteFile($fileold);    
                $where = array('id_galeri' => $id_galeri);
                $sqlDelete = $this->M_Proses->deleteData('tb_galeri', $where);
                if($sqlDelete){
                    echo "<script>
                            alert('Galeri Berhasil di Hapus');
                            window.location.href=('". base_url('index.php/Galeri') ."');
                        </script>";
                }else {
                    echo "<script>
                            alert('Maaf, Galeri gagal  di Hapus');
                            window.location.href=('". base_url('index.php/Galeri') ."');
                        </script>";
                }
            }else{
                echo "<script>
                    alert('Maaf, Data Galeri memiliki kesalahan');
                    window.location.href=('". base_url('index.php/Galeri') ."');
                </script>";
            } 
        }
    }
}
?>