<?php
//notif error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form
echo form_open(base_url('penjualan/kategori/edit/'.$kategori->id_kategori), ' class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Kategori</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?php echo $kategori->nama_kategori ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Deskripsi</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" value="<?php echo $kategori->deskripsi ?>" required>
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
<?php echo form_close();?>