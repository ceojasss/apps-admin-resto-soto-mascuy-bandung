<div id="Edit-Picture" class="modal fade" role="dialog" style="">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="?" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h3>Ganti Photo</h3>
                </div>
				<div class="modal-body">
					<div class="form-group mt-3">
						<h4>Ganti Photo</h4>
						<!-- thumbnail itu adalah foto yang ingin di masukkan -->
						<input type="file" class="form-control" name="thumbnail" required="">
						
						<!-- photoold itu adalah foto lama yang di ambil dari database -->
						<input type="hidden" name="photoold" value="<?php echo $SESS_foto_admin; ?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="pe-7s-help1"></i> Cancel</button>
					<button type="submit" class="btn btn-info btn-sm" name="ganti-foto" value="ganti-foto"><i class="pe-7s-check"></i> Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="GantiPassword" class="modal fade" role="dialog" style="">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="?" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h3>Ganti Password</h3>
                </div>
				<div class="modal-body">
					<div class="form-group mt-3">
						<h4>Password</h4>
						<input type="password" class="form-control" name="password_lama" placeholder="Password Lama" required="">
					</div>
					<div class="form-group mt-3">
						<h4>Password Baru</h4>
						<input type="password" class="form-control" name="password_baru" placeholder="Password baru" required="">
					</div>
					<div class="form-group mt-3">
						<h4>Ulangi Password</h4>
						<input type="password" class="form-control" name="ulangi_password" placeholder="Ulangi Password" required="">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="pe-7s-help1"></i> Cancel</button>
					<button type="submit" class="btn btn-info btn-sm" name="ganti-password" value="ganti-password"><i class="pe-7s-check"></i> Update</button>
				</div>
			</form>
		</div>
	</div>
</div>