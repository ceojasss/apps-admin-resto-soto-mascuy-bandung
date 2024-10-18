<div class="clearfix"></div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
    <div class="x_title">
    <h2>Data Galeri</h2>
    <div class="clearfix"></div>
    <a href="#" data-toggle="modal" data-target="#ModalTambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data </a>
    <?php include 'modal.php';?>
    </div>
    <br>
    <div class="x_content">
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col" class="border-0">No</th>
            <th scope="col" class="border-0">Galeri </th>
            <th scope="col" class="border-0">Modify</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        <?php foreach ($this->data['DT_Galeri'] as $key):?>
        <tr>
            <td><?php echo $i;?></td>
            <td>
            <img src="<?php echo base_url('assets/img/'.$key->foto); ?>" class="img-responsive img-thumbnail" width="200px"><br>
            <td>
                <a href="#" data-toggle="modal" data-target="#ModalEdit<?php echo $key->id_galeri;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <?php include 'modal-edit.php';?>
                <a href="#" data-toggle="modal" data-target="#ModalDelete<?php echo $key->id_galeri;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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

