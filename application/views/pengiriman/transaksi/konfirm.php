<?php
//notif error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form
echo form_open(base_url('pengiriman/transaksi/konfirm/'.$header_transaksi->id_header), 'class="form-horizontal"');
?>
<div>
    <h4 class="font-weight-bold text-success col-md-5"><?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin">
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Status Pengiriman</label>
        <div class="col-md-5">
            <select name="status_pengiriman" class="form-control">
                <option value="Belum Dikirim" <?php if($header_transaksi->status_pengiriman=="Belum Dikirim"){ echo "selected";} ?>> Belum Dikirim</option>
                <option value="Sedang Dikirim" <?php if($header_transaksi->status_pengiriman=="Sedang Dikirim"){ echo "selected";} ?>> Sedang Dikirim</option>
            </select>
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-5">
            <button class="btn btn-success" name="submit" type="submit">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </div>
</div>
<?php echo form_close();?>