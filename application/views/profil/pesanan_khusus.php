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
                        if($pesanan_khusus){ 
                    ?>
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-white">NO</th>
                                <th class="text-white">NAMA</th>
                                <th class="text-white">TANGGAL</th>
                                <th class="text-white">DESKRIPSI PRODUK</th>
                                <th class="text-white">STATUS PRODUKSI</th>
                                <th class="text-white">STATUS PENGIRIMAN</th>
                                <th class="text-white">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($pesanan_khusus as $pesanan_khusus){ ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $pesanan_khusus->nama_pelanggan ?></td>
                                <td><?php echo date('d-m-Y', strtotime($pesanan_khusus->tanggal_update)) ?></td>
                                <td><?php echo $pesanan_khusus->deskripsi ?></td>
                                <td><?php echo $pesanan_khusus->status_produksi ?></td>
                                <td><?php echo $pesanan_khusus->status_pengiriman ?></td>

                                <td>
                                <div class="btn-group">   
                                    <?php if($pesanan_khusus->status_pengiriman == "Belum Dikirim" || $pesanan_khusus->status_pengiriman == "Diterima"){
                                        echo '<a href="#" class="btn btn-warning btn-sm disabled"> <i class="fa fa-check"></i> Pesanan Diterima </a>';
                                    }else{ ?>
                                        <a href="<?php echo base_url('profil/terima_khusus/'.$pesanan_khusus->id_pesanan) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Pastikan produk sudah diterima dengan baik. Konfirmasi pesanan diterima?')">
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