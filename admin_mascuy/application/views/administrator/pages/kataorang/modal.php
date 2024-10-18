<!-- Modal -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Tambah Kata Orang</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="?" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label">Nama Orang</label>
          <input type="text" class="form-control" id="nama_kataorang" name="nama_kataorang" required="required" placeholder="Masukkan Nama ">
        </div> 
        <div class="form-group">
          <label class="control-label">Jabatan atau kamu sebagai apa ?</label>
          <input type="text" class="form-control" id="jenis_kataorang" name="jenis_kataorang" required="required" placeholder="Masukkan jabatan ">
        </div>
        <div class="form-group">
          <label class="control-label">Testimoni Orang</label>
          <textarea id="kataorang" type="text" name="kataorang" class="md-textarea form-control" rows="3"></textarea>        
        </div> 
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info btn-sm" value="insert" name="insert">Submit</button>
        </div>
       </form>
      </div>
     
    </div>
  </div>
</div>