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
echo form_open_multipart(base_url('penjualan/user/tambah'), ' class="form-horizontal"');
?>
<div>
    <h4 class="font-weight-bold text-primary col-md-5">Form <?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin">
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Nama Pegawai</label>
        <div class="col-md-5">
            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" placeholder="Masukkan Nama Pegawai" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Email</label>
        <div class="col-md-5">
            <input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Masukkan Alamat Email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Username</label>
        <div class="col-md-5">
            <input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>" placeholder="Masukkan Username" required>
        </div>    
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Password</label>
        <div class="col-md-5">
            <input type="password" name="password" class="form-control" value="<?php echo set_value('password') ?>" placeholder="Masukkan Password" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Level Akses</label>
        <div class="col-md-5">
            <select name="role_id" class="form-control">
                <option value="Penjualan">Bagian Penjualan</option>
                <option value="Produksi">Bagian Produksi</option>
                <option value="Pengiriman"> Bagian Pengiriman</option>
            </select>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-5">
            <button class="btn btn-success" name="submit" type="submit">
                <i class="fa fa-save"></i> Simpan
            </button>
            <button class="btn btn-info" name="reset" type="reset" value="Reset">
                <i class="fa fa-times"></i> Reset
            </button>
        </div>
    </div>
</div>
<?php echo form_close();?>