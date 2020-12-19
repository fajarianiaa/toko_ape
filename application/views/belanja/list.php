<!-- breadcrumb -->
<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-100 p-lr-0-lg">
			<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--85 m-lr-0-xl">
                    <h2 class="mtext-105 cl2"><?php echo $title ?></h2><hr><br>
                    <?php 
                        if($this->session->flashdata('sukses')) {
                            echo '<div class="alert alert-warning">';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                        }
                    ?>  
                    <div class="wrap-table-shopping-cart"> 
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">GAMBAR</th>
                                <th class="column-2">PRODUK</th>
                                <th class="column-3">HARGA</th>
                                <th class="column-4">JUMLAH</th>
                                <th class="column-5">SUBTOTAL</th>
                                <th class="column-6">AKSI</th>
                            </tr>
                            <?php               
                                foreach($keranjang as $keranjang) { 
                                //ambil data produk
                                $id_produk  = $keranjang['id'];
                                $produk     = $this->ProdukModel->detail($id_produk);
                                //form update
                                echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
                                //hidden input
                                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['id']);
                                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['rowid']);
                                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['name']);
                                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['price']);
                                
                            ?>
                            <tr class="table_row ">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo $keranjang['name']?></td>
                                <td class="column-3"><?php echo number_format($keranjang['price'],'0',',','.')?></td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>" min="1" max="<?php echo $produk->stok ?>">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">
                                    <?php 
                                        $subtotal = $keranjang['price'] * $keranjang['qty'];
                                        echo number_format($subtotal,'0',',','.');
                                    ?>
                                </td>
                                <td>
                                    <button type="submit" name="update" class="btn btn-info btn-sm m-r-20" >
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                   
                                    <a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-dark btn-sm m-t-10 ">
                                    <i class="fa fa-trash-o"></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php
                            //form close 
                            echo form_close();
                            //end looping
                            }    
                            ?>
                            
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            
                        </div>

                        <!-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            <button type="submit" name="update">
                                <i class="fa fa-edit"></i>
                                    Update Cart
                                </button>
                            
                        </div> -->
                        <a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-lg flex-c-m stext-101 cl2 size-119 bg8 bor13 p-lr-15 trans-04 pointer m-tb-10">
                            <i class="fa fa-trash-o p-lr-5"></i> Kosongkan Keranjang
                        </a>
                    </div>
                </div>
            </div>

        
            <div class="col-sm-10 col-lg-2 col-xl-5 m-lr-auto m-b-50">    
                <div class="clearfix p-t-63"></div><br>
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Total Belanja
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        
                    </div>


                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                <?php $total = number_format($this->cart->total(),'0',',','.'); ?>
                                Rp. <?php echo $total ?>
                            </span>
                        </div>
                    </div>

                    <a href="<?php echo base_url('belanja/checkout')?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        <i class="fa fa-shopping-cart p-lr-10"></i> Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>