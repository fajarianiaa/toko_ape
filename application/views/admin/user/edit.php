<?php
//notif error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form
echo form_open(base_url('penjualan/user/edit/'.$user->id_user), ' class="form-horizontal"');
?>
<div>
    <h4 class="font-weight-bold text-primary col-md-5">Form <?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin">
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Nama Pegawai</label>
        <div class="col-md-5">
            <input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>" placeholder="Masukkan Nama Pegawai" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Email</label>
        <div class="col-md-5">
            <input type="email" name="email" class="form-control" value="<?php echo  $user->email ?>" placeholder="Masukkan Alamat Email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Username</label>
        <div class="col-md-5">
            <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>" placeholder="Masukkan Username" readonly>
        </div>    
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Password</label>
        <div class="col-md-5">
            <input type="password" name="password" class="form-control" value="<?php echo $user->password ?>" placeholder="Masukkan Password" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Level Akses</label>
        <div class="col-md-5">
            <select name="role_id" class="form-control">
                <option value="Penjualan" <?php if($user->role_id=="Penjualan"){ echo "selected";} ?>> Bagian Penjualan</option>
                <option value="Produksi" <?php if($user->role_id=="Produksi"){ echo "selected";} ?>>Bagian Produksi</option>
                <option value="Pengiriman" <?php if($user->role_id=="Pengiriman"){ echo "selected";} ?>>Bagian Pengiriman</option>
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