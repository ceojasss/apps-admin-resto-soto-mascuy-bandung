<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->data['JudulWebsite'] = 'Administrator';
		$this->data['PageView'] = 'administrator/pages/menu/view';
		$Folder = $this->data['Folder'];

		if(!$this->input->post()){
			$where = array('id_menu_makanan' => 1);
			$this->data['DT_Menu'] = $this->M_Proses->getDataById('tb_menu_makanan', $where);

			foreach ($this->data['DT_Menu'] as $data) {
				
				$this->data['DT_gambar'] = $data->gambar;
				$this->data['DT_last_update'] = $data->last_update;
			}

			$this->load->view($this->data['UrlTemplate'], $this->data);
		}else{
			if($this->input->post('update')){

				
				$loc_foto = $_FILES['thumbnail']['tmp_name'];
				$gambar_homeold = $this->input->post('gambar_homeold');
				$where = array('id_menu_makanan' => 1);

				if(!empty($loc_foto)){
					$nama_file = $_FILES['thumbnail']['name'];
					$thumbnail = $this->RenameFile($nama_file,'gambar-menu-makanan');
					$upload = move_uploaded_file($loc_foto, $Folder.$thumbnail);
					$this->DeleteFile($gambar_homeold);
				}else{
					$thumbnail = $gambar_homeold;
				}


				$data = array(
							 'gambar' => $thumbnail,
							 'last_update' => date('y-m-d'),
							);
				$sql = $this->M_Proses->updateData('tb_menu_makanan', $data, $where);
				if($sql){
					echo "
					<script>
						alert('Ubah menu Berhasil');
						window.location.href=('". base_url('index.php/Menu') ."');
					</script>";
				}else {
					echo "
					<script>
						alert('Maaf, Gagal Ubah menu, Silahkan coba kembali...');
						//window.location.href=('". base_url('index.php/Menu') ."');
					</script>";
				}
			}
		}
	}
}
