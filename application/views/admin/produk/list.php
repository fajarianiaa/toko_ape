<!-- DataTales Example -->
<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" onclick="window.location.href='produk/tambah'"><i class="fas fa-plus fa-sm"></i> Tambah <?php echo $title ?> </button>
    <!-- <a href="<?php echo base_url('penjualan/produk/tambah') ?>" class="btn btn-success btn-lg"><i class="fas fa-plus fa-sm">Tambah <?php echo $title ?> </i></a> -->
    <!-- notif -->
    <?php 
      if($this->session->flashdata('sukses')){
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
    ?>
    
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?php echo $title ?></h6>
    </div>    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>GAMBAR</th>
                    <th>NAMA</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>STOK</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no =1;
                foreach($produk as $produk) :  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                          <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="100">
                        </td>
                        <td><?php echo $produk->nama_produk ?></td>
                        <td><?php echo $produk->nama_kategori ?></td>
                        <td><?php echo number_format($produk->harga, '0', ',', '.' )?></td>
                        <td><?php echo $produk->stok ?></td>
                        <td><?php echo $produk->status_produk ?></td>
                        <td>
                          <a href="<?php echo base_url('penjualan/produk/gambar/'.$produk->id_produk) ?>" class="btn btn-info btn-sm"><i class="fas fa-image"></i> Gambar (<?php echo $produk->total_gambar ?>)</a>
                          <a href="<?php echo base_url('penjualan/produk/edit/'.$produk->id_produk) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                          <!-- <a href="<?php echo base_url('penjualan/produk/hapus/'.$produk->id_produk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a> -->
                        </td>
                    </tr>
                	<?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->
