<!-- page content -->
<div class="">
    <div class="clearfix"></div>
    <div class="row">
    <?php echo $this->session->flashdata('message');?>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Data User</h2>
            <div class="clearfix"></div>
            <a href="#" data-toggle="modal" data-target="#ModalTambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data </a>
            <?php include 'modal.php';?>
            </div>
            <br>
            <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Modify</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach($this->data['DT_User'] as $key):?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $key->nama; ?></td>
                    <td><?php echo $key->email; ?></td>
                    <td><img src="<?php echo base_url('assets/img/'.$key->foto_admin); ?>" class="img-responsive img-thumbnail" style="width: 100px; height: 100px;"><br></td>
                    <td>
                    <!-- <a href="#" data-toggle="modal" data-target="#ModalEdit<?php // echo $key->id_user;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
                    <?php //include 'modal-edit.php';?>
                    <a href="#" data-toggle="modal" data-target="#ModalDelete<?php echo $key->id_user;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                    <?php include 'modal-delete.php';?>
                    </td>
                </tr>
                <?php $i++;?>
                <?php endforeach;?>  
                </tbody>
            </table>
            </div>
        </div>
        </div>           
    </div>
</div>

<!-- /page content -->