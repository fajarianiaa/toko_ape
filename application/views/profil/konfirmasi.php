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
                                <td>Jumlah Bayar</td>
                                <td>: Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            </tr>
                            <tr>
                                <td>Status Bayar</td>
                                <td>: <?php echo $header_transaksi->status_bayar ?></td>
                            </tr>
                            <tr>
                                <td>Bukti Bayar</td>
                                <td>: 
                                    <?php if($header_transaksi->bukti_bayar != "") { ?>
                                        <img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
                                    <?php }else{ echo 'Belum upload bukti pembayaran.'; } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <?php 
                        //upload error
                        if (isset($error)) {
                            echo '<p class="alert alert-warning">'.$error.'</p>';
                        }
                        //notif errornya
                        echo validation_errors('<p class="alert alert-warning">','</p>');

                        //form
                        echo form_open_multipart(base_url('profil/konfirmasi/'.$header_transaksi->kode_transaksi));
                    ?>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="30%">Pembayaran ke</td>
                                <td>
                                    <select name="id_rekening" class="form-control">
                                        <?php foreach($rekening as $rekening){ ?>
                                        <option value="<?php echo $rekening->id_rekening ?>" <?php if($header_transaksi->id_rekening == $rekening->id_rekening){ echo "selected"; } ?>>
                                            <?php echo $rekening->nama_bank ?> (No. Rekening: <?php echo $rekening->no_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
                                        </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Bayar</td>
                                <td>
                                    <input type="text" name="tanggal_bayar" class="form-control" 
                                    placeholder="dd-mm-yyyy" value="<?php  
                                        if(isset($_POST['tanggal_bayar'] )){
                                            echo set_value('tanggal_bayar');
                                        }elseif($header_transaksi->tanggal_bayar != ""){
                                            echo $header_transaksi->tanggal_bayar;
                                        }else{
                                            echo date('d-m-Y');  
                                        } ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Total Pembayaran</td>
                                <td>
                                    <input type="number" name="jumlah_bayar" class="form-control" 
                                    placeholder="Jumlah Pembayaran" value="<?php 
                                        if(isset($_POST['jumlah_bayar'])) { 
                                            echo set_value('jumlah_bayar'); 
                                        }elseif($header_transaksi->jumlah_bayar != ""){
                                            echo $header_transaksi->jumlah_bayar;
                                        }else{ 
                                            echo $header_transaksi->jumlah_transaksi; 
                                        } ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Dari Bank</td>
                                <td>
                                    <input type="text" name="nama_bank" class="form-control" value="<?php echo $header_transaksi->nama_bank ?>" placeholder="Nama Bank">
                                    <small>Misal : BANK BCA</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Dari No. Rekening</td>
                                <td>
                                    <input type="text" name="rek_pembayaran" class="form-control" value="<?php echo $header_transaksi->rek_pembayaran ?>" placeholder="No. Rekening">
                                    <small>Misal : 4245673</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Pemilik Rekening</td>
                                <td>
                                    <input type="text" name="rek_pelanggan" class="form-control" value="<?php echo $header_transaksi->rek_pelanggan ?>" placeholder="Nama pemilik rekening">
                                </td>
                            </tr>
                            <tr>
                                <td>Unggah Bukti Bayar</td>
                                <td>
                                    <input type="file" name="bukti_bayar" class="form-control" placeholder="Unggah Bukti Pembayaran">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-success btn" type="submit" name="submit"><i class="fa fa-upload"></i> Simpan </button>
                                        <button class="btn btn-info btn" type="reset" name="reset"><i class="fa fa-times"></i> Reset </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>                    
                    
                    <?php 
                    //end form
                    echo form_close();
                    }else{ ?>
                        <p class="alert alert-success">
                            <i class="fa fa-warning"></i> Anda belum melakukan transaksi.
                        </p>
                    <?php } ?>
            </div>
</section>