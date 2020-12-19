<!-- notif -->
<?php 
      if($this->session->flashdata('sukses')){
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
    ?>
<?php
//eror upload
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
//notif error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form
echo form_open_multipart(base_url('penjualan/konfigurasi/logo'), ' class="form-horizontal"');
?>


<div>
    <h4 class="font-weight-bold text-primary col-md-5">Form <?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin">
    <div class="form-group row ">
        <label class="col-md-3 control-label text-dark font-weight-bold">Nama Website</label>
        <div class="col-md-6">
            <input type="text" name="namaweb" class="form-control" value="<?php echo $konfigurasi->namaweb ?>" placeholder="Masukkan Nama Website" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Upload Logo Baru</label>
        <div class="col-md-6">
            <input type="file" name="logo" class="form-control" value="<?php echo $konfigurasi->logo ?>" placeholder="Upload Logo Baru" required>
            Logo lama : <br><img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" class="img img-responsive img-thumbnail" width="300">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
            <button class="btn btn-success" name="submit" type="submit">
                <i class="fa fa-save"></i> Simpan
            </button>
            <button class="btn btn-info" name="reset" type="reset">
                <i class="fa fa-times"></i> Reset
            </button>
        </div>
    </div>

</div>
<?php echo form_close();?> 