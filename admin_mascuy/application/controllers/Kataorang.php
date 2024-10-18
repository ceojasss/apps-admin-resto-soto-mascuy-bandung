<?php 
class Kataorang extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Proses');
    }

    public function index(){

        $this->data['JudulWebsite'] = 'Administrator';
        $this->data['PageView'] = "administrator/pages/kataorang/view";

        $Folder = $this->data['Folder'];    
        
        
        if(!$this->input->post()){
            $this->data['DT_Kataorang'] = $this->M_Proses->getData('tb_kataorang');
            $this->load->view($this->data['UrlTemplate'] , $this->data);
        }else if($this->input->post('insert')){
                $kataorang = $this->input->post('kataorang');
                $nama_kataorang = $this->input->post('nama_kataorang');
                $jenis_kataorang = $this->input->post('jenis_kataorang');

                $data = array(
                    'kataorang' => $kataorang,
                    'nama_kataorang' => $nama_kataorang,
                    'jenis_kataorang' => $jenis_kataorang
                );

                $queryInsert = $this->M_Proses->insertData('tb_kataorang' , $data);
                if($queryInsert){
                     echo "<script>
                            alert('Data Kata orang berhasil di tambahkan ');
                            window.location.href=('". base_url('index.php/Kataorang') ."');
                        </script>";
                }else {
                     echo "<script>
                            alert('Maaf, Kata orang gagal di Tambahkan');
                            window.location.href=('". base_url('index.php/Kataorang') ."');
                        </script>";
                }
        }else if($this->input->post('update')){
                $id_kataorang = $this->input->post('id_kataorang');
                $kataorang = $this->input->post('kataorang');

                $data = array(
                    'kataorang' => $kataorang
                );

                $where = array(
                    'id_kataorang' => $id_kataorang
                );

                $queryUpdate = $this->M_Proses->updateData('tb_kataorang' , $data, $where);
                if($queryUpdate){
                     echo "<script>
                            alert('Data Kata orang berhasil di Ubah ');
                            window.location.href=('". base_url('index.php/Kataorang') ."');
                        </script>";
                }else {
                     echo "<script>
                            alert('Maaf, Data Kata orang gagal di Ubah');
                            window.location.href=('". base_url('index.php/Kataorang') ."');
                        </script>";
                }
        }else if($this->input->post('delete')){
            $id_kataorang = $this->input->post('id_kataorang');
            $where = array('id_kataorang' => $id_kataorang);

            $queryDelete = $this->M_Proses->deleteData('tb_kataorang' , $where);

            if($queryDelete){
                echo "<script>
                    alert(' Data Kata orang Berhasil di hapus');
                    window.location.href=('". base_url('index.php/Kataorang') ."');
                    </script>";
            }else {
                echo "<script>
                    alert(' Maaf, Data Kata orang Berhasil di hapus');
                    window.location.href=('". base_url('index.php/Kataorang') ."');
                    </script>";
            }
        }else {
            echo "<script>
               alert('Maaf, Terjadi Kesalahan');
               window.location.href=('". base_url('index.php/Kataorang') ."');
               </script>";
       }
    }

}
?>