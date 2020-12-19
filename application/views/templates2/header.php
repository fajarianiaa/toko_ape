	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">

		 <!-- Topbar -->
		 <!-- Topbar -->
		 <div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar ">
						<div></div>
						<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook fa-2x col-md-15" ></a>
						<a href="<?php echo $site->whatsapp ?>" class="topbar-social-item fa fa-whatsapp fa-2x col-md-9 " style="color:green"></a>
					</div>
					<span class="topbar-child1 text-light">
						<?php echo $site->alamat ?>
					</span>
					<div class=" 2topbar-child text-light">
						<span class="topbar-email"><?php echo $site->email ?></span>
					</div>

					<!-- <div class="topbar-divider d-none d-sm-block">
						<?php if ($this->session->userdata('username')) { ?>
									Selamat Datang <?php echo $this->session->userdata('username') ?> |
									<?php echo anchor('login/logout',' Logout') ?>
						<?php }else{ ?>
									<?php echo anchor('login', 'Login'); ?>
						<?php } ?>
					</div> -->
				</div>
			</div>
			