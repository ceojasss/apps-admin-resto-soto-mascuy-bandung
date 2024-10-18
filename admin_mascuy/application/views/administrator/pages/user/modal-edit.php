<!-- Modal -->
<?php ?>
<div class="modal fade" id="ModalEdit<?php echo $key->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Ubah Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="?" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $key->id_user;?>">
        
        <div class="form-group">
        <label class="control-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $key->nama_lengkap;?>" required="required">
        </div>
        <div class="form-group">
        <label class="control-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $key->email;?>" required="required">
        </div>
        <div class="form-group">
        <label class="control-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $key->alamat;?>" required="required">
        </div>
        <div class="form-group">
        <label class="control-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $key->username;?>" required="required">
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info btn-sm" value="update" name="update">Submit</button>
        </div>
       </form>
      </div>
     
    </div>
  </div>
</div>