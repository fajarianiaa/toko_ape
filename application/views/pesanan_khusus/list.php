<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?php echo base_url() ?>assets/gambar/sampul3.jpg);">
    <h2 class="ltext-105 cl0 txt-center">
        Pesanan Khusus
    </h2>
</section>
    
<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
<?php 
        if($this->session->flashdata('sukses')){
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        
        //notif error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
    ?>
<div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Pesanan Khusus
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Jika ingin memesan produk khusus sesuai keinginan silakan hubungi <a href="<?php echo base_url('kontak') ?>">kontak</a> kami atau melalui form di bawah.
                    </p>

                    <a class="flex-c-m stext-101 cl0 size-116 bg3 bor1 hov-btn3 trans-04 pointer" href="<?php echo base_url('pesanan_khusus/tambah') ?>">
                        <i class="fa fa-list col-md-1"></i>Formulir Pesanan Khusus
                    </a>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="<?php echo base_url() ?>assets/gambar/sampul2.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>	

<!-- <form class="bg0 p-t-120 p-b-85">
<div class="container">
<div class="row">
<div class="m-b-50">
    <div class="m-l-25 m-r--85 m-lr-0-xl">

    <?php 
        if($this->session->flashdata('sukses')){
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        
        //notif error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        ?>

        <div>
            <h4 class="smtext-111 cl2 plh3 size-116">Pesanan Khusus ini</h4>
        </div>
        
        <h5 class="smtext-111 cl2 plh3 size-116">Jika ingin memesan produk khusus sesuai keinginan silakan hubungi <a href="<?php echo base_url('kontak') ?>">kontak</a> kami atau melalui form di bawah.</h5>
             
        <a class="flex-c-m stext-101 cl0 size-116 bg3 bor1 hov-btn3 trans-04 pointer" href="<?php echo base_url('pesanan_khusus/tambah') ?>">
            <i class="fa fa-list col-md-1"></i>Formulir Pesanan Khusus
        </a>

    </div>
</div>
</div>
</div>
</form> -->