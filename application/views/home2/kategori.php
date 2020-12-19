<?php $kategori 	= $this->KonfigurasiModel->nav_produk(); ?>
<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
        <?php foreach($kategori as $kategori) { ?>
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="<?php echo base_url() ?>assets/gambar/sampul2.jpg" alt="IMG-BANNER">

                    <a href="<?php echo base_url('produk/kategori/'.$kategori->slug_kategori) ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                <?php echo $kategori->nama_kategori?>
                            </span>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    <?php echo $kategori->nama_kategori?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Pesanan Khusus -->
                <div class="block1 wrap-pic-w">
                    <img src="<?php echo base_url() ?>assets/gambar/sampul4.jpg" alt="IMG-BANNER">
                    <a href="<?php echo base_url('/pesanan_khusus') ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                Pesanan Khusus
                            </span>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                Pesanan Khusus
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>