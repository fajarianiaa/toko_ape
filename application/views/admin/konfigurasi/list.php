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
echo form_open_multipart(base_url('penjualan/konfigurasi'), ' class="form-horizontal"');
?>


<div>
    <h4 class="font-weight-bold text-primary col-md-5">Form <?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin">
    <div class="form-group row ">
        <label class="col-md-3 control-label text-dark font-weight-bold">Nama Website</label>
        <div class="col-md-8">
            <input type="text" name="namaweb" class="form-control" value="<?php echo $konfigurasi->namaweb ?>" placeholder="Masukkan Nama Website" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Tagline</label>
        <div class="col-md-8">
            <input type="text" name="tagline" class="form-control" value="<?php echo $konfigurasi->tagline ?>" placeholder="Masukkan Tagline" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Email</label>
        <div class="col-md-8">
            <input type="email" name="email" class="form-control" value="<?php echo $konfigurasi->email ?>" placeholder="Masukkan Email" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Website</label>
        <div class="col-md-8">
            <input type="text" name="website" class="form-control" value="<?php echo $konfigurasi->website ?>" placeholder="Masukkan Website" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Alamat Facebook</label>
        <div class="col-md-8">
            <input type="url" name="facebook" class="form-control" value="<?php echo $konfigurasi->facebook ?>" placeholder="Masukkan Alamat Facebook" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Alamat Whatsapp</label>
        <div class="col-md-8">
            <input type="url" name="whatsapp" class="form-control" value="<?php echo $konfigurasi->whatsapp ?>" placeholder="Masukkan Alamat Whatsapp" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Telepon/HP</label>
        <div class="col-md-8">
            <input type="text" name="telepon" class="form-control" value="<?php echo $konfigurasi->telepon ?>" placeholder="Masukkan Telepon" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Alamat Kantor</label>
        <div class="col-md-9">
            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" ><?php echo $konfigurasi->alamat ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Keyword (untuk SEO Google)</label>
        <div class="col-md-9">
            <textarea name="keywords" class="form-control" placeholder="Masukkan Keyword (untuk  SEO Google)" ><?php echo $konfigurasi->keywords ?></textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Kode Metatext</label>
        <div class="col-md-9">
            <textarea name="metatext" class="form-control" placeholder="Masukkan Metatext" ><?php echo $konfigurasi->metatext ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Deskripsi Website</label>
        <div class="col-md-9">
            <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Website" ><?php echo $konfigurasi->deskripsi ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 control-label text-dark font-weight-bold">Rekening Pembayaran</label>
        <div class="col-md-9">
            <textarea name="rek_pembayaran" class="form-control" placeholder="Masukkan Rekening Pembayaran" ><?php echo $konfigurasi->rek_pembayaran ?></textarea>
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