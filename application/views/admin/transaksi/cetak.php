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
        h1{
            text-align: center;
            font-size: 18px;
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
        h1{
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
        }
    </style>
</head>
<body onload="print()">
    <div class="cetak">
        <h1>FAKTUR <?php echo $site->namaweb ?></h1>
        <!-- <table class="table table-bordered" style="border: solid thin #000;">
            <tr>
                <td rowspan="4" style="align:center; padding: 0mm 12mm 0mm 12mm;"><img src="<?php echo base_url('assets/gambar/logo.jpg') ?>" alt="TTD" width="65"></td>
            </tr>
            <tr>
            <td style="text-align: center; padding: 0mm 22mm 0mm 0mm; font-size: 16px;">
                <b>CV. Muara Mandiri</b>
            </td> 
            </tr>
            <tr>
            <td style="text-align: center; padding: 0mm 22mm 0mm 0mm;">
                <b><?php echo $site->alamat ?></b> 
            </td> 
            </tr>
            <tr>
            <td style="text-align: center; padding: 0mm 22mm 0mm 0mm;">
                <b> email : <?php echo $site->email ?> HP. <?php echo $site->telepon ?></b> 
            </td> 
            </tr>
        </table> -->
        <table class="table" id="table">
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
                <tr>
                    <td>Alamat Penerima</td>
                    <td>: 
                        <?php echo $header_transaksi->alamat ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered" id="table" width="100%">
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

        <table width="100%">
            <tr>
                <td style="text-align:right; font-weight:bold">Hormat Kami,</td>
            </tr>
            <tr>
                <td style="text-align:right">
                    <img src="<?php echo base_url('assets/gambar/cap.jpg') ?>" alt="TTD" width="95">
                </td>
            </tr>
            <tr>
                <td style="text-align:right">...............................</td>
            </tr>
        </table>
    </div>
</body>
</html>