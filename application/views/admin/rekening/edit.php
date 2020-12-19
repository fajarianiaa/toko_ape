<?php
//notif error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form
echo form_open(base_url('admin/rekening/edit/'.$rekening->id_rekening), ' class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Bank</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank" value="<?php echo $rekening->nama_bank ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Nomor Rekening</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="no_rekening" placeholder="Nomor Rekening" value="<?php echo $rekening->no_rekening ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Nama Pemilik Rekening</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik Rekening" value="<?php echo $rekening->nama_pemilik ?>" required>
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