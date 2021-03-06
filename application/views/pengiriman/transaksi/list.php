<!-- DataTales Example -->
<div class="container-fluid">
    <?php 
      if($this->session->flashdata('sukses')){
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
    ?>
    
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Data <?php echo $title ?></h6>
    </div>    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
            <thead>
                <tr class="bg-dark">
                    <th class="text-white" style="font-size:small">NO</th>
                    <th class="text-white" style="font-size:small">PELANGGAN</th>
                    <th class="text-white" style="font-size:small">KODE</th>
                    <th class="text-white" style="font-size:small">TANGGAL PESAN</th>
                    <th class="text-white" style="font-size:small">JUMLAH ITEM</th>
                    <!-- <th class="text-white" style="font-size:small">JUMLAH TOTAL</th> -->
                    <th class="text-white" style="font-size:small">STATUS BAYAR</th>
                    <th class="text-white" style="font-size:small">STATUS PENGIRIMAN</th>
                    <th class="text-white" style="font-size:small">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($header_transaksi as $header_transaksi){ ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td width="300">
                        <?php echo $header_transaksi->nama_pelanggan ?><hr>
                        <small>
                            Telepon : <?php echo $header_transaksi->telepon ?><br>
                            Email   : <?php echo $header_transaksi->email ?><br>
                            Alamat  : <?php echo nl2br($header_transaksi->alamat) ?><br>
                        </small>
                    </td>
                    <td><?php echo $header_transaksi->kode_transaksi ?></td>
                    <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                    <td><?php echo $header_transaksi->total_item ?></td>
                    <!-- <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td> -->
                    <td><?php echo $header_transaksi->status_bayar ?></td>
                    <td><?php echo $header_transaksi->status_pengiriman ?></td>
                    <td width="200">
                        <div class="btn-group p-1">
                            <a href="<?php echo base_url('pengiriman/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                        </div>
                        <div class="btn-group p-1">
                            <?php if($header_transaksi->status_bayar == "Belum Bayar" || $header_transaksi->status_bayar == "Menunggu Verifikasi" || $header_transaksi->status_pengiriman == "Diterima"){
                                echo '<a href="#" class="btn btn-info btn-sm disabled"> <i class="fa fa-check"></i> Konfirmasi Pengiriman </a>';
                            }else{ ?>
                                <a href="<?php echo base_url('pengiriman/transaksi/konfirm/'.$header_transaksi->id_header) ?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-check"></i> Konfirmasi Pengiriman
                                </a>
                            <?php } ?>                            
                        </div>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->