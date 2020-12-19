<!-- Content page -->
<section class="bgwhite p-t-120 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <h3 class="p-b-20"><?php echo $title ?></h3>
                    
                    <?php
                        //menampilkan data tabel transaksi
                        if($header_transaksi){ 
                    ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">KODE TRANSAKSI</th>
                                <th>: <?php echo $header_transaksi->kode_transaksi ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tanggal</td>
                                <td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                            </tr>
                            <tr>
                                <td>Total Bayar</td>
                                <td>: Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            </tr>
                            <tr>
                                <td>Status Bayar</td>
                                <td>: <?php echo $header_transaksi->status_bayar ?></td>
                            </tr>
                            <tr>
                                <td>Status Pengiriman</td>
                                <td>: <?php echo $header_transaksi->status_pengiriman ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-white">NO</th>
                                <th class="text-white">KODE</th>
                                <th class="text-white">NAMA PRODUK</th>
                                <th class="text-white">JUMLAH</th>
                                <th class="text-white">HARGA</th>
                                <th class="text-white">SUBTOTAL</th>
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

                    <?php }else{ ?>
                        <p class="alert alert-success">
                            <i class="fa fa-warning"></i> Anda belum melakukan transaksi.
                        </p>
                    <?php } ?>
            </div>
</section>