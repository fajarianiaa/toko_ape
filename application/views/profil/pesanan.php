<!-- Content page -->
<section class="bgwhite p-t-120 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-2 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <h3 class="mtext-105 cl2 p-b-20"><?php echo $title ?></h3>
                    
                    <?php
                        //menampilkan data tabel transaksi
                        if($header_transaksi){ 
                    ?>
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-white">NO</th>
                                <th class="text-white">KODE</th>
                                <th class="text-white">TANGGAL</th>
                                <th class="text-white">JUMLAH ITEM</th>
                                <th class="text-white">JUMLAH TOTAL</th>
                                <th class="text-white">STATUS BAYAR</th>
                                <th class="text-white">STATUS PENGIRIMAN</th>
                                <th class="text-white">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($header_transaksi as $header_transaksi){ ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $header_transaksi->kode_transaksi ?></td>
                                <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                                <td><?php echo $header_transaksi->total_item ?></td>
                                <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                                <td><?php echo $header_transaksi->status_bayar ?></td>
                                <td><?php echo $header_transaksi->status_pengiriman ?></td>

                                <td>
                                <div class="btn-group">
                                    <a href="<?php echo base_url('profil/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>

                                    <?php if($header_transaksi->status_bayar == "Sudah Bayar"){
                                        echo '<a href="#" class="btn btn-info btn-sm disabled"> <i class="fa fa-upload"></i> Konfirmasi Bayar </a>';
                                    }else{ ?>
                                        <a href="<?php echo base_url('profil/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm">
                                        <i class="fa fa-upload"></i> Konfirmasi Bayar
                                        </a>
                                    <?php } ?>
                                    

                                    <?php if($header_transaksi->status_pengiriman == "Belum Dikirim" || $header_transaksi->status_pengiriman == "Diterima"){
                                        echo '<a href="#" class="btn btn-warning btn-sm disabled"> <i class="fa fa-check"></i> Pesanan Diterima </a>';
                                    }else{ ?>
                                        <a href="<?php echo base_url('profil/terima/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Pastikan produk sudah diterima dengan baik. Konfirmasi pesanan diterima?')">
                                        <i class="fa fa-check"></i> Pesanan Diterima
                                        </a>
                                    <?php } ?>
                                </div>
                                </td>
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