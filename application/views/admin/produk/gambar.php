<?php
//error upload
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

//notif error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form
echo form_open_multipart(base_url('penjualan/produk/gambar/'.$produk->id_produk), ' class="form-horizontal"');
?>
<div>
    <h4 class="font-weight-bold text-primary col-md-10">Form <?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin ">
    <div class="form-group form-gruop-lg">
        <label class="col-md-5 control-label text-dark font-weight-bold">Judul Gambar</label>
        <div class="col-md-4">
            <input type="text" name="judul_gambar" class="form-control" value="<?php echo set_value('judul_gambar') ?>" placeholder="Masukkan Judul Gambar Produk" required>
        </div>
    </div>
    <div class="form-group form-gruop-lg">
        <label class="col-md-5 control-label text-dark font-weight-bold">Upload Gambar</label>
        <div class="col-md-4">
            <input type="file" name="gambar" class="form-control" value="<?php echo set_value('gambar') ?>" placeholder="Upload Gambar Produk" required>
        </div>
    </div>

    <div class="col-md-5">
        <button class="btn btn-success" name="submit" type="submit">
            <i class="fa fa-save"></i> Upload
        </button>
        <button class="btn btn-info" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>
<?php echo form_close();?>

<!-- list tabel -->
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
        <h6 class="m-0 font-weight-bold text-primary">Data Gambar : <?php echo $produk->nama_produk ?></h6>
    </div>    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>JUDUL GAMBAR</th>
                    <th>GAMBAR</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="100">
                    </td>
                    <td><?php echo $produk->nama_produk ?></td>
                    <td>
                        
                    </td>
                </tr>
                <?php 
                $no =2;
                foreach($gambar as $gambar) :  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                          <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="100">
                        </td>
                        <td><?php echo $gambar->judul_gambar ?></td>
                        <td>
                          <a href="<?php echo base_url('penjualan/produk/hapus_gambar/'.$produk->id_produk.'/'.$gambar->id_gambar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fas fa-trash"></i> Hapus</a>
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
