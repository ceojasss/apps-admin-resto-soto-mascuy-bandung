<!-- Modal -->
<?php ?>
<div class="modal fade" id="ModalEdit<?php echo $key->id_galeri;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="hidden" class="form-control" id="id_galeri" name="id_galeri" value="<?php echo $key->id_galeri;?>">
        <input type="hidden" class="form-control" id="id" name="fileold"  value="<?php echo $key->foto;?>">
        <div class="form-group">
            <label>Ganti Foto</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail" >
            <small>catatan: jika Anda tidak mengganti foto, maka kosongkan isian diatas. <br>
                <i>
                <a href="<?php echo base_url('assets/img/'.$key->foto); ?>" target="_blank" style="color:blue;">
                Klik di sini untuk lihat Foto sebelumnya.
                </a></i>
            </small>

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