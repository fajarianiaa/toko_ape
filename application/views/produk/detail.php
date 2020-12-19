<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-100 p-lr-0-lg">
        <a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="<?php echo base_url('produk') ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Produk
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="<?php echo base_url('produk/kategori/'.$produk->slug_kategori) ?>" class="stext-109 cl8 hov-cl1 trans-04">
            <?php echo $kategori ?>
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            <?php echo $title ?>
        </span>
    </div>
</div>
    

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <?php 
                            if($gambar) { 
                                foreach($gambar as $gambar){ ?>
                            <div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" alt="<?php echo $gambar->judul_gambar ?>">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <?php 
                                }  
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h1 class="mtext-109 cl2 js-name-detail p-b-13">
                        <?php echo $title ?>
                    </h1>

                    <?php 
                        //form proses belanja
                        echo form_open(base_url('belanja/add')); 
                        //item yang dibawa
                        echo form_hidden('id', $produk->id_produk);
                        // echo form_hidden('qty', 1);
                        echo form_hidden('price', $produk->harga);
                        echo form_hidden('name', $produk->nama_produk);
                        //redirect
                        echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
                    ?> 
                    <span class="mtext-106 cl2">
                        Rp. <?php echo number_format($produk->harga, '0', ',', '.' ) ?>
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        <?php echo $produk->keterangan ?>
                    </p>
                    <p class="stext-102 cl3 p-t-10">
                        Stok : <?php echo $produk->stok ?>
                    </p>
                    
                    <!--  -->
                    <div class="p-t-15">
                    <div class="flex-w flex-r-m p-b-10">
                        <div class="size-204 flex-w flex-m respon6-next">
                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>

                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1" min="1" max="<?php echo $produk->stok ?>">

                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                            </div>

                            <?php if($produk->stok == "0"){
                                echo '<a href="#" class="btn flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-10 trans-04 disabled"> Add To Cart </a>';
                            }else{ ?>
                                <button type="submit" name="submit" value="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-10 trans-04 js-addcart-detail">
                                    Add to cart
                                </button>
                            <?php } ?> 
                            <!-- <button type="submit" name="submit" value="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-10 trans-04 js-addcart-detail">
                                Add to cart
                            </button> -->
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="<?php echo $site->facebook ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="<?php echo $site->whatsapp ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Whatsapp">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        
</section>

<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
            <?php foreach($produk_related as $produk_related) { ?>
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                <?php 
                    //form proses belanja
                    echo form_open(base_url('belanja/add')); 
                    //item yang dibawa
                    echo form_hidden('id', $produk_related->id_produk);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $produk_related->harga);
                    echo form_hidden('name', $produk_related->nama_produk);
                    //redirect
                    echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
                ?> 
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="<?php echo base_url('assets/upload/image/'.$produk_related->gambar) ?>" alt="<?php echo $produk_related->nama_produk ?>" style="max-height: 200px;">
                        <!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a> -->
                        <?php if($produk_related->stok == "0"){
                            echo '<a href="#" class="btn block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 disabled"> Add To Cart </a>';
                        }else{ ?>
                            <button type="submit" value="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                Add To Cart
                            </button>
                        <?php } ?> 
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?php echo $produk_related->nama_produk ?>
                            </a>

                            <span class="stext-105 cl3">
                                Rp. <?php echo number_format($produk_related->harga, '0', ',', '.' ) ?>
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="<?php echo base_url() ?>assets/template2/images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?php echo base_url() ?>assets/template2/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </section>