<div class="clearfix"></div>

<div class="row">
<div class="col-12">
<div class="x_panel">
    <div class="x_title">
    <h2>Profil User</h2>
    
    <div class="clearfix"></div>

    </div>
    <div class="x_content">
	<div class="col-6">
		<center>
			<h3>Foto User</h3>
			<hr>
			<img src="<?php echo base_url('assets/img/'.$SESS_foto_admin); ?>" class="img-responsive img-thumbnail" width="300">
			<br>
			<hr>
			<a href="#" data-target="#Edit-Picture" data-toggle="modal" class="btn btn-info">Ganti Photo</a>
			<a href="#" data-target="#GantiPassword" data-toggle="modal" class="btn btn-danger">Ganti Password</a>
		</center>	
	</div>

		<div class="col-6">
		<h3>Data User</h3>
		<hr>
			<form action="?" method="POST" enctype="multipart/form-data">
				<div class="form-group ">
					<label>Nama Lengkap</label>
					<input type="text" class="form-control" name="nama" value="<?php echo $this->data['SESS_nama'] ?>" required="">
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email"  value="<?php echo $this->data['SESS_email'] ?>" required="">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-info" name="update" value="update">Update</button>
				</div>
			</form>
		</div>

		<?php include_once 'modal.php'; ?>
    </div>
</div>
</div>



