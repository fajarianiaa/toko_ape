<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <style type="text/css" media="print">
        body{
            font-family: Arial;
            font-size: 12px;
        }
        .cetak{
            width: 19cm;
            height: 27cm;
            padding: 1cm;
        }
        #table{
            border: solid thin #000;
            border-collapse: collapse;
        }
        td,th{
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: top;
        }
        th{
            background-color: $F5F5F5;
            font-weight: bold;
        }
        h3{
            text-align: center;
            font-size: 16px;
            text-transform: uppercase;
        }
    
    </style>
    <style type="text/css" media="screen">
        body{
            font-family: Arial;
            font-size: 12px;
        }
        .cetak{
            width: 19cm;
            height: 27cm;
            padding: 1cm;
        }
        #table{
            border: solid thin #000;
            border-collapse: collapse;
        }
        td,th{
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: top;
        }
        th{
            background-color: #F5F5F5;
            font-weight: bold;
        }
        h3{
            text-align: center;
            font-size: 16px;
            text-transform: uppercase;
        }
    </style>
</head>
<body onload="print()">
<div class="container-fluid">
<div class="x_panel">
 
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

<table class="table table-bordered" style="border: solid thin #000;">
                  <tr>
                     <td rowspan="4" style="align:center; padding: 0mm 12mm 0mm 12mm;"><img src="<?php echo base_url('assets/gambar/logo.jpg') ?>" alt="TTD" width="65"></td>
                  </tr>
                  <tr>
                    <td style="text-align: center; padding: 0mm 23mm 0mm 0mm; font-size: 16px;">
                       <b>CV. Muara Mandiri</b>
                    </td> 
                  </tr>
                  <tr>
                    <td style="text-align: center; padding: 0mm 23mm 0mm 0mm;">
                       <b><?php echo $site->alamat ?></b> 
                    </td> 
                  </tr>
                  <tr>
                    <td style="text-align: center; padding: 0mm 23mm 0mm 0mm;">
                       <b> email : <?php echo $site->email ?> HP. <?php echo $site->telepon ?></b> 
                    </td> 
                  </tr>
            </table>
        <div class="col-md-10 col-sm-12 col-md-offset-1">
            <h3>Laporan Bulan <?php echo $Bulan ?> Tahun <?php echo $thn ?></h3>
        </div>

         <div class="col-md-12 col-sm-12">
         
            <table border="1" class="table table-bordered">
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
      </div>
      <table width="100%">
            <tr>
                <td style="text-align:right">
                    <img src="<?php echo base_url('assets/gambar/cap.jpg') ?>" alt="TTD" width="95">
                </td>
            </tr>
            <tr>
            <td style="text-align:right">Ahmad Nawawi</td>
                <!-- <td style="text-align:right">...............................</td> -->
            </tr>
        </table>
      </div>
   </div>
</div>
</div>
</body>
</html>

