<!-- DataTales Example -->
<div class="container-fluid">
    <?php 
      if($this->session->flashdata('sukses')){
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
    ?>
    <p class="pull-right">
            <div class="btn-group pull-right">
                <a href="<?php echo base_url('penjualan/pesanan_khusus') ?>" title="Kembali" class="btn btn-info btn-sm m-1">
                    <i class="fa fa-backward"></i> Kembali
                </a>
                <!-- <a href="<?php echo base_url('penjualan/pesanan_khusus/konfirm/'.$pesanan_khusus->id_pesanan)  ?>" title="Konfirmasi Produksi" class="btn btn-success btn-sm m-1">
                    <i class="fa fa-check"></i> Konfirmasi Pengiriman
                </a> -->
            </div>
        </p>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Detail <?php echo $title ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <?php if($pesanan_khusus){ ?>
                    <tr>
                        <th width="20%">NAMA PELANGGAN</th>
                        <th>: <?php echo $pesanan_khusus->nama_pelanggan ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td>: <?php echo date('d-m-Y', strtotime($pesanan_khusus->tanggal_update)) ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi Produk</td>
                        <td>: <?php echo $pesanan_khusus->deskripsi ?></td>
                    </tr>
                    <!-- <tr>
                        <td>Bukti Bayar</td>
                        <td>: 
                        <?php 
                                if($header_transaksi->bukti_bayar == "" ) 
                                    { echo 'Belum upload bukti pembayaran.'; 
                                }else{
                            ?>
                            <img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar ) ?>" class="img img-thumbnail" width="200" >
                                <?php } ?>
                        </td>
                    </tr> -->
                    <tr>
                        <td>Status Produksi</td>
                        <td>: <?php echo $pesanan_khusus->status_produksi ?></td>
                    </tr>
                    <tr>
                        <td>Status Pengiriman</td>
                        <td>: <?php echo $pesanan_khusus->status_pengiriman ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->