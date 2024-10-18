<form action="?" method="POST" enctype="multipart/form-data">
	<h3>Menu Makanan</h3>
	<hr>
	
	<div class="form-group text-center">
		<a href="<?php echo base_url('assets/img/'.$DT_gambar); ?>" target="_blank">
			<img src="<?php echo base_url('assets/img/'.$DT_gambar); ?>" class="img-responsive img-thumbnail" width="700"><br>
		</a>
		<label>Gambar Menu</label>
		<input type="file" class="form-control" name="thumbnail">
		<input type="hidden" class="form-control" value="<?php echo $DT_gambar; ?>" name="gambar_homeold">
	</div>

	<div class="form-group">
		<button class="btn btn-outline-info" style="width: 100%; letter-spacing: 5px;" name="update" value="update">UPDATE</button>
	</div>

</form>