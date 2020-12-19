<div class="container-fluid">
<h3 class=""><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>
<?php foreach($barang as $brg) :?>
    <!-- <form action="<?php echo base_url().'admin/data_barang/prosesUpdate/'.$brg->id_brg?>" method="POST"> -->
    <form action="<?php echo site_url('admin/data_barang/prosesUpdate/'.$brg->id_brg)?>" method="POST">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
            <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
        </div>
        <div class="form-group">
            <label>Gambar Produk</label><br>
            <input type="file" name="gambar" class="form-control" value="<?php echo $brg->gambar ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
    </form>    
<?php endforeach; ?>
</div>