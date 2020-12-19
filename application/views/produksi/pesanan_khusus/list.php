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
        <h6 class="m-0 font-weight-bold text-info">Data <?php echo $title ?></h6>
    </div>    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
            <thead>
                <tr class="bg-dark">
                    <th class="text-white" style="font-size:small">NO</th>
                    <th class="text-white" style="font-size:small">PEMESAN</th>
                    <th class="text-white" style="font-size:small">TANGGAL</th>
                    <th class="text-white" style="font-size:small">STATUS PRODUKSI</th>
                    <th class="text-white" style="font-size:small">STATUS PENGIRIMAN</th>
                    <th class="text-white" style="font-size:small">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($pesanan_khusus as $pesanan_khusus){ ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td width="300">
                        <?php echo $pesanan_khusus->nama_pelanggan ?><hr>
                        <small>
                            Telepon : <?php echo $pesanan_khusus->telepon ?><br>
                            Email   : <?php echo $pesanan_khusus->email ?><br>
                        </small>
                    </td>
                    <td><?php echo date('d-m-Y', strtotime($pesanan_khusus->tanggal_update)) ?></td>
                    <td><?php echo $pesanan_khusus->status_produksi ?></td>
                    <td><?php echo $pesanan_khusus->status_pengiriman ?></td>
                    <td width="200">
                        <div class="btn-group p-1">
                            <a href="<?php echo base_url('produksi/pesanan_khusus/detail/'.$pesanan_khusus->id_pesanan) ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                        </div>
                        <div class="btn-group p-1">
                            <?php if($pesanan_khusus->status_pengiriman == "Diterima" || $pesanan_khusus->status_pengiriman == "Sedang Dikirim"){
                                echo '<a href="#" class="btn btn-info btn-sm disabled"> <i class="fa fa-check"></i> Konfirmasi Produksi </a>';
                            }else{ ?>
                                 <a href="<?php echo base_url('produksi/pesanan_khusus/konfirm/'.$pesanan_khusus->id_pesanan) ?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-check"></i> Konfirmasi Produksi
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