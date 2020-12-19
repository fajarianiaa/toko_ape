<?php
//notif error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form
echo form_open(base_url('produksi/pesanan_khusus/konfirm/'.$pesanan_khusus->id_pesanan), 'class="form-horizontal"');
?>
<div>
    <h4 class="font-weight-bold text-info col-md-5"><?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin">
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Status Produksi</label>
        <div class="col-md-5">
            <select name="status_produksi" class="form-control">
                <option value="Belum Diproduksi" <?php if($pesanan_khusus->status_produksi=="Belum Diproduksi"){ echo "selected";} ?>> Belum Diproduksi</option>
                <option value="Sedang Diproduksi" <?php if($pesanan_khusus->status_produksi=="Sedang Diproduksi"){ echo "selected";} ?>> Sedang Diproduksi</option>
                <option value="Produksi Selesai" <?php if($pesanan_khusus->status_produksi=="Produksi Selesai"){ echo "selected";} ?>> Produksi Selesai</option>
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