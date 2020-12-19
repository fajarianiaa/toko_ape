<div class="container-fluid">
<div class="x_panel">
   <div class="x_title">
      <h2>Laporan Penjualan</h2>
      <div class="clearfix"></div>
      <?= validation_errors('<p style="color:red">','</p>'); ?>
      <form class="form-horizontal row" action="" method="post">
 
         <div class="form-group col-md-3 col-sm-12">
            <select class="form-control" name="bln">
               <option value="01" <?php if($bln == 01){echo 'selected';}?> >Januari</option>
               <option value="02" <?php if($bln == 02){echo 'selected';}?> >Februari</option>
               <option value="03" <?php if($bln == 03){echo 'selected';}?> >Maret</option>
               <option value="04" <?php if($bln == 04){echo 'selected';}?> >April</option>
               <option value="05" <?php if($bln == 05){echo 'selected';}?> >Mei</option>
               <option value="06" <?php if($bln == 06){echo 'selected';}?> >Juni</option>
               <option value="07" <?php if($bln == 07){echo 'selected';}?> >Juli</option>
               <option value="08" <?php if($bln == 08){echo 'selected';}?> >Agustus</option>
               <option value="09" <?php if($bln == 09){echo 'selected';}?> >September</option>
               <option value="10" <?php if($bln == 10){echo 'selected';}?> >Oktober</option>
               <option value="11" <?php if($bln == 11){echo 'selected';}?> >November</option>
               <option value="12" <?php if($bln == 12){echo 'selected';}?> >Desember</option>
            </select>
         </div>
 
         <div class="form-group col-md-3 col-sm-12">
            <select class="form-control" name="thn">
               <?php for ($i = 2016; $i <= 2035; $i++) { ?>
                  <option value="<?=$i;?>" <?php if($thn == $i){echo 'selected';}?> >
                    <?=$i;?>
                  </option>
               <?php } ?>
            </select>
         </div>
 
         <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm m-2" >Submit</button>
      </form>
   </div>
 
   <div class="x_content">
      <div class="row">
      <?php 
        switch ($bln) {
            case '01':
                $Bulan = 'Januari';
                break;
            case '02':
                $Bulan = 'Februari';
                break;
            case '03':
                $Bulan = 'Maret';
                break;
            case '04':
                $Bulan = 'April';
                break;
            case '05':
                $Bulan = 'Mei';
                break;
            case '06':
                $Bulan = 'Juni';
                break;
            case '07':
                $Bulan = 'Juli';
                break;
            case '08':
                $Bulan = 'Agustus';
                break;
            case '09':
                $Bulan = 'September';
                break;
            case '10':
                $Bulan = 'Oktober';
                break;
            case '11':
                $Bulan = 'November';
                break;
            case '12':
                $Bulan = 'Desember';
                break;
        }
      ?>
         <div class="col-md-10 col-sm-12">
            <h3>Laporan Bulan <?php echo $Bulan ?> Tahun <?php echo $thn ?></h3>
         </div>
         <div class="col-md-1 col-sm-12 col-md-offset-1">
            <a href="<?=base_url();?>transaksi/cetaklaporan/<?=$bln;?>/<?=$thn;?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i></a>
         </div>
 
         <div class="col-md-12 col-sm-12">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Kode</th>
                     <th>Nama Pemesan</th>
                     <th>Tanggal</th>
                     <th>Total Bayar</th>
                     <th>Pendapatan</th>
                  </tr>
               </thead>
               <tbody>
                <?php
                    $no =1;
                    $pendapatan =0;
                    foreach($data as $key) :
                        $pendapatan += $key->jumlah_bayar;
                ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $key->kode_transaksi; ?></td>
                     <td><?php echo $key->nama_pelanggan; ?></td>
                     <td><?php echo date('d-m-Y', strtotime($key->tanggal_transaksi)) ?></td>
                     <td>
                        <span style="float:left">Rp.</span>
                        <span style="float:right"><?php echo number_format($key->jumlah_bayar,0,',','.'); ?>,-</span>
                     </td>
                     <td>
                        <span style="float:left">Rp.</span>
                        <span style="float:right"><?php echo number_format($key->jumlah_bayar,0,',','.'); ?>,-</span>
                     </td>
                  </tr>
                    <?php endforeach; ?>
                  <tr>
                     <td colspan="5" style="text-align:center"><b>Pendapatan</b></td>
                     <td>
                        <b>
                           <span style="float:left">Rp.</span>
                           <span style="float:right"><?php echo number_format($pendapatan,0,',','.'); ?>,-</span>
                        </b>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
 
         <div class="col-md-6 col-sm-6">
            <a href="<?php echo base_url('penjualan/transaksi') ?>" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a>
         </div>
 
      </div>
   </div>
</div>
</div>