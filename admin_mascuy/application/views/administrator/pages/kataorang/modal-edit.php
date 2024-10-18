<!-- Modal -->
<div class="modal fade" id="ModalEdit<?php echo $data->id_kataorang;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Edit Kata Orang</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="?" method="POST" enctype="multipart/form-data">
      <input type="hidden" class="form-control" id="id_kataorang" name="id_kataorang" required="required" value="<?php echo $data->id_kataorang;?>" >
        <div class="form-group">
          <label class="control-label">Kata Orang</label>
          <textarea id="kataorang" type="text" name="kataorang" class="md-textarea form-control" rows="3" value="<?php echo $data->kataorang;?>"><?php echo $data->kataorang;?></textarea>
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