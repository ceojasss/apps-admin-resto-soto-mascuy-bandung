<!-- Modal -->
<?php ?>
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Tambah &rsaquo; User</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
      <form action="?" method="POST" enctype="multipart/form-data" id="regisform">        
        <div class="form-group">
          <input type="text" class="form-control" id="name" name="name"   placeholder="Masukkan Nama Lengkap" value="<?= set_value('name');?>" autocomplete="off">
          <p style="color:red; font-style:italic" id="name-helper"></p>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email"  placeholder="Masukkan email" value="<?= set_value('email');?>" autocomplete="off">
          <p style="color:red; font-style:italic" id="email-helper"></p>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control " id="password1"  name="password1" placeholder="Password">
            <p style="color:red; font-style:italic" id="password1-helper"></p>
          </div>
          <div class="col-sm-6">
            <input type="password" class="form-control " id="password2"   name="password2" placeholder="Konfirmasi Password">
            <p style="color:red; font-style:italic"  id="password2-helper"></p>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="addModalAction()" class="btn btn-info btn-sm" value="insert" name="insert">Submit</button>
        </div>
       </form>
      </div>
     
    </div>
  </div>
</div>