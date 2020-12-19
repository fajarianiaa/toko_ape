<!-- DataTales Example -->
<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_rekening"><i class="fas fa-plus fa-sm"></i> Tambah <?php echo $title ?> </button>
    <!-- notif -->
    <?php 
      if($this->session->flashdata('sukses')){
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
    ?>

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?php echo $title ?></h6>
    </div>    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA BANK</th>
                    <th>NO REKENING</th>
                    <th>NAMA PEMILIK</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no =1;
                foreach($rekening as $rekening) :  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $rekening->nama_bank ?></td>
                        <td><?php echo $rekening->no_rekening ?></td>
                        <td><?php echo $rekening->nama_pemilik ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                          <a href="<?php echo base_url('admin/rekening/hapus/'.$rekening->id_rekening) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                	<?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="tambah_rekening" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Rekening</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/rekening/tambah' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control" value="<?php echo set_value('nama_bank') ?>" required>
            </div>
            <div class="form-group">
                <label>Nomor Rekening</label>
                <input type="number" name="no_rekening" class="form-control" value="<?php echo set_value('no_rekening') ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Pemilik Rekening</label>
                <input type="text" name="nama_pemilik" class="form-control" value="<?php echo set_value('nama_pemilik') ?>" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
