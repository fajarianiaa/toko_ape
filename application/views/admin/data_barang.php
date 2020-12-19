<!-- DataTales Example -->
<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
    </div>    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>KETERANGAN</th>
                    <th>HARGA</th>
                    <th>STOK</th>
                    <th>GAMBAR</th>
                    <th colspan="3">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no =1;
                foreach($barang->result() as $brg) :  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $brg->nama_brg ?></td>
                        <td><?php echo $brg->keterangan ?></td>
                        <td><?php echo $brg->harga ?></td>
                        <td><?php echo $brg->stok ?></td>
                        <td> 
                            <!-- echo base_url().'/uploads/'.$brg->gambar
                            $product_image = ['src'=>'uploads/' . $brg->gambar,
                                                                 'width'=>'100',
                                                                 'height'=>'100'];
                                             echo img($product_image);
                            echo '<img src="'.'/uploads/'.$brg->gambar.'">'; -->
                            <img src="<?=base_url()?>uploads/<?=$brg->gambar;?>" width="100" height="100">
                        </td>
                        <td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></div></td>
                        <td><?php echo anchor('admin/data_barang/editproduk/'.$brg->id_brg,'<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></div>')?></td>
                        <td><?php echo anchor('admin/data_barang/hapus/'.$brg->id_brg,'<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></div>')?></td>
                    </tr>
                	<?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_barang/prosestambah' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control">
            </div>
            <div class="form-group">
                <label>Gambar Produk</label><br>
                <input type="file" name="gambar" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
