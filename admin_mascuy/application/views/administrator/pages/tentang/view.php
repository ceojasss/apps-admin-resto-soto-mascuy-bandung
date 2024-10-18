<div class="clearfix"></div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
    <div class="x_title">
    <h2>Data Tentang</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
        <tr>
        <th scope="col" class="border-0">No</th>
        <th scope="col" class="border-0">Nama Tentang</th>
        <th scope="col" class="border-0">Foto </th>
        <th scope="col" class="border-0">Modify</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        <?php foreach ($this->data['DT_Tentang'] as $key):?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $key->nama_tentang;?></td>
            <td>
            <img src="<?php echo base_url('assets/img/'.$key->foto); ?>" class="img-responsive img-thumbnail" width="600px" height="700px"><br>
            </td>
            <td>
                <a href="#" data-toggle="modal" data-target="#ModalEdit<?php echo $key->id_tentang;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <?php include 'modal-edit.php';?>
           </td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>
</div>

