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
                <a href="<?php echo base_url('pengiriman/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm m-1">
                    <i class="fa fa-backward"></i> Kembali
                </a>
                <?php if($header_transaksi->status_bayar == "Belum Bayar" || $header_transaksi->status_bayar == "Menunggu Verifikasi" || $header_transaksi->status_pengiriman == "Diterima"){
                    echo '<a href="#" class="btn btn-success btn-sm m-1 disabled"> <i class="fa fa-check"></i> Konfirmasi Pengiriman </a>';
                }else{ ?>
                    <a href="<?php echo base_url('pengiriman/transaksi/konfirm/'.$header_transaksi->id_header)  ?>" title="Konfirmasi Pengiriman" class="btn btn-success btn-sm m-1">
                        <i class="fa fa-check"></i> Konfirmasi Pengiriman
                    </a>
                <?php } ?> 
                
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
                    <tr>
                        <th width="20%">NAMA PELANGGAN</th>
                        <th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
                    </tr>
                    <tr>
                        <th width="20%">KODE TRANSAKSI</th>
                        <th>: <?php echo $header_transaksi->kode_transaksi ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td>: Rp. <?php echo number_format($header_transaksi->jumlah_transaksi,'0',',','.') ?></td>
                    </tr>
                    <tr>
                        <td>Status Bayar</td>
                        <td>: <?php echo $header_transaksi->status_bayar ?></td>
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
                        <td>Tanggal Bayar</td>
                        <td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar)) ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Bayar</td>
                        <td>: Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?></td>
                    </tr>
                    <tr>
                        <td>Rekening pengirim</td>
                        <td>: 
                            <?php echo $header_transaksi->nama_bank ?> 
                            No. Rekening <?php echo $header_transaksi->rek_pembayaran ?> 
                            a.n <?php echo $header_transaksi->rek_pelanggan ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>Pembayaran ke rekening</td>
                        <td>: 
                            <?php echo $header_transaksi->bank ?> 
                            No. Rekening <?php echo $header_transaksi->no_rekening?> 
                            a.n <?php echo $header_transaksi->nama_pemilik ?> 
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE</th>
                        <th>NAMA PRODUK</th>
                        <th>JUMLAH</th>
                        <th>HARGA</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($transaksi as $transaksi){ ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $transaksi->kode_produk ?></td>
                        <td><?php echo $transaksi->nama_produk ?></td>
                        <td><?php echo number_format($transaksi->jumlah) ?></td>
                        <td><?php echo number_format($transaksi->harga) ?></td>
                        <td><?php echo number_format($transaksi->total_harga) ?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->