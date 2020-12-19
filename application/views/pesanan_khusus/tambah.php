<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?php echo base_url() ?>assets/gambar/sampul3.jpg);">
    <h2 class="ltext-105 cl0 txt-center">
        Form <?php echo $title ?>
    </h2>
</section>

<div class="bg0 p-t-120 p-b-85" >
<div class="container">
<div class="row">
<div class="col-lg-10 col-xl-7  m-b-50">
    <div class="m-l-25 m-r--85 m-lr-0-xl">
        <!-- notif -->
        <?php 
        if($this->session->flashdata('sukses')){
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        
        //notif error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        echo form_open_multipart(base_url('pesanan_khusus/tambah'), ' class="form-horizontal"');
        ?>
        <div class="card-body container-fluid w3-margin">
            <div class="form-group form-gruop-lg">
            <label class="stext-111 font-weight-bold">Nama Pemesan</label>
                <div class="bor8 m-b-20 how-pos4-parent">        
                    <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30 form-control" type="text" placeholder="Masukkan Nama Anda" 
                    name="nama_pelanggan" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
                </div>
            </div>

            <div class="form-group form-gruop-lg">
            <label class="stext-111 font-weight-bold">Email Pemesan <br><small>Email aktif yang dapat dihubungi.</small></label>
                <div class="bor8 m-b-30">
                    <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30 form-control" type="email" placeholder="Masukkan Email Anda" 
                    name="email" value="<?php echo $pelanggan->email ?>" required>
                </div>
            </div>

            <div class="form-group form-gruop-lg">
            <label class="stext-111 font-weight-bold">No. Telepon/HP Pemesan <br><small>No HP aktif yang dapat dihubungi.</small></label>
                <div class="bor8 m-b-30">
                    <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30 form-control" type="text" placeholder="Masukkan No. Telepon/HP Anda" 
                    name="telepon" value="<?php echo $pelanggan->telepon ?>" required>
                </div>
            </div>

            <div class="form-group form-gruop-lg">
            <label class="stext-111 font-weight-bold">Deskripsi Produk</label>
                <div class="bor8 m-b-30">
                    <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25 form-control" name="deskripsi" placeholder="Deskripsikan produk yang Anda inginkan." required></textarea>
                </div>
            </div>

            <!-- <div class="form-group form-gruop-lg">
            <label class="stext-111 font-weight-bold">Gambar Produk (Jika Ada)</label>
                <div class="bor8 m-b-30">
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div> -->
            
            
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div>
                    <button type="submit" name="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Pesan Sekarang
                    </button>
                </div>
            </div>
        </div>
        <?php echo form_close();?>   
    </div>
</div>
</div>
</div>
</div>