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
echo form_open_multipart(base_url('penjualan/produk/tambah'), ' class="form-horizontal"');
?>
<div>
    <h4 class="font-weight-bold text-primary col-md-5">Form <?php echo $title ?></h4>
</div>
<div class="card-body container-fluid w3-margin">
    <div class="form-group form-gruop-lg">
        <label class="col-md-5 control-label text-dark font-weight-bold">Nama Produk</label>
        <div class="col-md-5">
            <input type="text" name="nama_produk" class="form-control" value="<?php echo set_value('nama_produk') ?>" placeholder="Masukkan Nama Produk" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Kode Produk</label>
        <div class="col-md-5">
            <input type="text" name="kode_produk" class="form-control" value="<?php echo set_value('kode_produk') ?>" placeholder="Masukkan Kode Produk" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Kategori Produk</label>
        <div class="col-md-5">
        <select name="id_kategori" class="form-control">
            <?php foreach ($kategori as $kategori) { ?>
            <option value="<?php echo $kategori->id_kategori ?>">
            <?php echo $kategori->nama_kategori ?>
            </option>
            <?php } ?>
        </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Harga Produk</label>
        <div class="col-md-5">
            <input type="number" name="harga" class="form-control" value="<?php echo set_value('harga') ?>" placeholder="Masukkan Harga Produk" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Stok Produk</label>
        <div class="col-md-5">
            <input type="number" name="stok" class="form-control" value="<?php echo set_value('stok') ?>" placeholder="Masukkan Stok Produk" required>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Berat Produk</label>
        <div class="col-md-5">
            <input type="text" name="berat" class="form-control" value="<?php echo set_value('berat') ?>" placeholder="Masukkan Berat Produk" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Ukuran Produk</label>
        <div class="col-md-5">
            <input type="text" name="ukuran" class="form-control" value="<?php echo set_value('ukuran') ?>" placeholder="Masukkan Ukuran Produk" required>
        </div>
    </div> -->
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Keterangan</label>
        <div class="col-md-10">
            <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan Produk" id="editor" cols="30" rows="5"><?php echo set_value('keterangan') ?></textarea>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Keyword (untuk SEO Google)</label>
        <div class="col-md-10">
            <textarea name="keywords" class="form-control" placeholder="Masukkan Keyword (untuk  SEO Google)" ><?php echo set_value('keywords') ?></textarea>
        </div>
    </div> -->
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Upload Gambar Produk</label>
        <div class="col-md-10">
            <input type="file" name="gambar" class="form-control" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-5 control-label text-dark font-weight-bold">Status Produk</label>
        <div class="col-md-10">
            <select name="status_produk" class="form-control">
                <option value="Publish">Publikasikan</option>
                <option value="Draft">Simpan Sebagai Draft</option>
            </select>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
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