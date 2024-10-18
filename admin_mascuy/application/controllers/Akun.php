<?php 


class Akun extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->data['JudulWebsite'] = 'Administrator';
		$this->data['PageView'] = "administrator/pages/akun/view";
		$this->data['UrlBack'] = "index.php/apps/akun";

		if(!$this->input->post()){
			$this->load->view($this->data['UrlTemplate'], $this->data);
		}else{

			if($this->input->post('update')){

        		// $`admin`(`id_user`, `nama_admin`, `alamat_admin`, `email_admin`, `username`, `password`, `foto_admin`, `jenis_kelamin`)


				$nama = $this->input->post('nama');
				$email = $this->input->post('email');
				$foto_admin = $this->input->post('foto_admin');


				$data = array('nama' => $nama,
					'email' => $email
				);
				
				$where = array('id_user' => $this->data['SESS_id_user']);
				
				$sql  = $this->M_Proses->updateData('user', $data, $where);
				if($sql){
					$this->notif('Selamat Akun Anda berhasil diperbaharui.', base_url($this->data['UrlBack']));
				}else{
					$this->notif('Mohon maaf, perbaharuan akun Anda tidak berhasil.', base_url($this->data['UrlBack']));
				}
			}else if($this->input->post('ganti-password')){
				// var_dump($this->data['SESS_password']); die;
				$password_lama = md5($this->input->post('password_lama'));
				$password_baru = $this->input->post('password_baru');
				$ulangi_password = $this->input->post('ulangi_password');
				$enkripsi = md5($password_baru);
				//cek apakah password lama telah sesuai.
				if($password_lama == $this->data['SESS_password']){
					
					//jika telah sesuai maka cek lagi pengulangan password telah sesuai atau tidak.
					if($password_baru ==  $ulangi_password){
						//jika telah sesuai maka lakukan update ke database
						$data = array('password' => $enkripsi);
						$where = array('id_user' => $this->data['SESS_id_user']);
						$sql = $this->M_Proses->updateData('user',$data, $where);

						if($sql){
							$this->notif('Selamat! password telah berhasil diganti', base_url($this->data['UrlBack']));
						}else{
							$this->notif('1', base_url($this->data['UrlBack']));
						}
					}else{
						//jika tidak sesuai
						$this->notif('2', base_url($this->data['UrlBack']));
					}
				}else{
					$this->notif('3', base_url($this->data['UrlBack']));
				}
			}else if($this->input->post('ganti-foto')){

				$lokasi_file = $_FILES['thumbnail']['tmp_name'];
				if(!empty($lokasi_file)){
					$nama_file = $_FILES['thumbnail']['name'];
					$photoold = $_POST['photoold'];
        			// penggunaan function in core
					$rename = $this->RenameFile($nama_file, 'Profil');
					$data = array('foto_admin' => $rename);
				}else{	
					$data = array('foto_admin' => $photoold);
				}	

				$where = array('id_user' => $this->data['SESS_id_user']);
				if(move_uploaded_file($lokasi_file, $this->data['Folder'].$rename)){
        			//delete foto
					$this->DeleteFile($photoold);
        			// update ke database
					$sql = $this->M_Proses->updateData('user', $data, $where);
					if($sql){
						$this->notif('Selamat Akun Anda berhasil diperbaharui.', base_url($this->data['UrlBack']));
					}else{
						$this->notif('Mohon maaf, upload foto gagal. Mohon coba lagi beberapa saat lagi.', base_url($this->data['UrlBack']));
					}
				}else{
					$this->notif('Mohon maaf, upload foto gagal. Mohon coba lagi beberapa saat lagi.', base_url($this->data['UrlBack']));
				}
			}else{
				$this->notif('Mohon maaf, terjadi kesalahan coba beberapa saat lagi.', base_url($this->data['UrlBack']));
			}

		}

	}


}