<?php
//ambil data menu
$nav_produk 		= $this->KonfigurasiModel->nav_produk();
$nav_produk_mobile 	= $this->KonfigurasiModel->nav_produk();
?>

<div class="wrap-menu-desktop">
	<nav class="limiter-menu-desktop container">
		
		<!-- Logo desktop -->		
		<a href="<?php echo base_url() ?>" class="logo">
			<img src="<?php echo base_url('assets/upload/image/'. $site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?> ">
		</a>

		<!-- Menu desktop -->
		<div class="menu-desktop">
			<ul class="main-menu">
			<!-- Home -->
				<li>
					<a href="<?php echo base_url() ?>">Beranda</a>
				</li>
				<li class="">
					<a href="<?php echo base_url('produk') ?>">Produk</a>
					<ul class="sub-menu">
						<?php foreach($nav_produk as $nav_produk) { ?>
						<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>">
							<?php echo $nav_produk->nama_kategori ?>
						</a></li>
						<?php } ?>
					</ul>
				</li>

				<li>
					<a href="<?php echo base_url('pesanan_khusus') ?>">Pesanan Khusus</a>
				</li>

				<li>
					<a href="<?php echo base_url('tentang') ?>">Tentang</a>
				</li>

				<li>
					<a href="<?php echo base_url('kontak') ?>">Kontak</a>
				</li>
			</ul>
		</div>	

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m">
			<?php if($this->session->userdata('email')){ ?>
				<a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-gray-600 small "><?php echo $this->session->userdata('nama_pelanggan')?></span>
					<i class="fa fa-user icon-header-item cl2 hov-cl1 trans-04 "></i>
				</a>
				<!-- dropdown -->
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="<?php echo base_url('profil') ?>">
						<i class="fa fa-dashboard fa-sm fa-fw mr-2 text-gray-400"></i>
						Profil
					</a>	
					<a class="dropdown-item" href="<?php echo base_url('masuk/logout') ?>">
						<i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i>
						Logout
					</a>
              	</div>
			<?php }else{ ?>
				<a href="<?php echo base_url('masuk') ?>">
					<i class="fa fa-user icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"></i>
				</a>
			<?php } ?>

			<?php $keranjang = $this->cart->contents(); ?>
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo count($keranjang) ?>">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
		</div>
	</nav>
</div>	
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
<!-- Logo moblie -->		
<div class="logo-mobile">
	<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/upload/image/'. $site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>"></a>
</div>

<!-- Icon header -->
<div class="wrap-icon-header flex-w flex-r-m m-r-15">
	<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
		<i class="zmdi zmdi-search"></i>
	</div>

	<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo count($keranjang) ?>">
		<i class="zmdi zmdi-shopping-cart"></i>
	</div>

	<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
		<i class="zmdi zmdi-favorite-outline"></i>
	</a>
</div>

<!-- Button show menu -->
<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
	<span class="hamburger-box">
		<span class="hamburger-inner"></span>
	</span>
</div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">
<ul class="topbar-mobile">
	<li>
		<div class="right-top-bar flex-w h-full">
			<div class=" 2topbar-child text-light">
				<span class="topbar-email"><?php echo $site->email ?></span>
			</div>
		</div>
	</li>
	<li class="item-topbar-mobile p-l-10">
		<div class="topbar-social-mobile">
			<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook fa-lg " ></a>
			<a href="<?php echo $site->whatsapp ?>" class="topbar-social-item fa fa-whatsapp fa-lg  " style="color:green"></a>
		</div>
	</li>
</ul>

<ul class="main-menu-m bg-secondary">
	<li>
		<a href="<?php echo base_url() ?>">Beranda</a>
	</li>
	<li>
		<a href="<?php echo base_url('produk') ?>">Produk</a>
		<ul class="sub-menu-m">
			<?php foreach($nav_produk_mobile as $nav_produk_mobile) { ?>
			<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk_mobile->slug_kategori) ?>">
				<?php echo $nav_produk_mobile->nama_kategori ?>
			</a></li>
			<?php } ?>
		</ul>
		<span class="arrow-main-menu-m">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
		</span>
	</li>
	<li>
		<a href="about.html">Tentang</a>
	</li>

	<li>
		<a href="<?php echo base_url('kontak') ?>">Kontak</a>
	</li>
</ul>
</div>

<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
<div class="container-search-header">
	<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
		<img src="<?php echo base_url() ?>assets/template2/images/icons/icon-close2.png" alt="CLOSE">
	</button>

	<form class="wrap-search-header flex-w p-l-15">
		<button class="flex-c-m trans-04">
			<i class="zmdi zmdi-search"></i>
		</button>
		<input class="plh3" type="text" name="search" placeholder="Search...">
	</form>
</div>
</div>
</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
<div class="s-full js-hide-cart"></div>

<div class="header-cart flex-col-l p-l-65 p-r-25">
<?php
//cek data belanja
$keranjang = $this->cart->contents();

?>
<div class="header-cart-title flex-w flex-sb-m p-b-8">
	<span class="mtext-103 cl2">
		Keranjang Belanja
	</span>

	<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
		<i class="zmdi zmdi-close"></i>
	</div>
</div>

<div class="header-cart-content flex-w js-pscroll">
	<ul class="header-cart-wrapitem w-full">
		<?php 
		//kondisi tidk ada data
		if (empty($keranjang)) { ?>
			<li class="header-cart-item flex-w flex-t m-b-12">
				<p class="alert alert-success">Keranjang Belanja Kosong. Ayo Belanja!</p>
			</li>
		<?php }else{ 
			//total belanja
			$total = 'Rp. '.number_format($this->cart->total(),'0',',','.');
			//tampil data belanja
			foreach($keranjang as $keranjang) {
				$id_produk = $keranjang['id'];
				//ambil data produk
				$data_produk =$this->ProdukModel->detail($id_produk);
		?>
		<li class="header-cart-item flex-w flex-t m-b-12">
			<div class="header-cart-item-img">
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$data_produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
			</div>

			<div class="header-cart-item-txt p-t-8">
				<a href="<?php echo base_url('produk/detail/'.$data_produk->slug_produk) ?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
					<?php echo $keranjang['name']?>
				</a>

				<span class="header-cart-item-info">
					<?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.')?>
					= Rp. <?php echo number_format($keranjang['subtotal'],'0',',','.')?>
				</span>
			</div>
		</li>
	<?php 
		} //end foreach
	} ?>
	</ul>
	
	<div class="w-full">
		<div class="header-cart-total w-full p-tb-40">
			<?php 
			//kondisi tidk ada data
			if (empty($keranjang)) { ?>

			<?php }else{ 
			//total belanja
			$total = 'Rp. '.number_format($this->cart->total(),'0',',','.');
			?>
			Total : <?php echo $total ?>
			<?php } ?>
		</div>

		<div class="header-cart-buttons flex-w w-full">
			<a href="<?php echo base_url('belanja')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
				View Cart
			</a>

			<a href="<?php echo base_url('belanja/checkout')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
				Check Out
			</a>
		</div>
	</div>
</div>
</div>
</div>