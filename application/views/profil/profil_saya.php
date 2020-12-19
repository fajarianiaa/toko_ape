<!-- Content page -->
<section class="bgwhite p-t-120 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-2 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    
                <?php 
                if($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }
                ?>
                <?php 
                //error
                echo validation_errors('<div class="alert alert-warning">', '</div>');
                
                //form
                echo form_open(base_url('profil/profil_saya'));
                ?>
                    <h4 class="mtext-105 cl2 p-b-30">
                        <?php echo $title ?>
                    </h4>
                    <label class="stext-111 font-weight-bold">Nama Lengkap</label>
                    <div class="bor8 m-b-20 how-pos4-parent">              
                        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30"type="text" placeholder="Masukkan Nama Anda" 
                        name="nama_pelanggan" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
                    </div>

                    <label class="stext-111 font-weight-bold">Email</label>
                    <div class="bor8 m-b-30">
                        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" type="email" placeholder="Masukkan Email Anda" 
                        name="email" value="<?php echo $pelanggan->email ?>" readonly>
                    </div>

                    <label class="stext-111 font-weight-bold">Password</label>
                    <span class="text-danger">Masukkan minimal 6 karakter untuk mengubah password. Jika tidak akan diubah, biarkan kosong.</span>
                    <div class="bor8 m-b-30">
                        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" type="password" placeholder="Masukkan Password Anda" 
                        name="password" value="<?php echo set_value('password') ?>">
                    </div>
                    

                    <label class="stext-111 font-weight-bold">No. Telepon/HP</label>
                    <div class="bor8 m-b-30">
                        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" type="text" placeholder="Masukkan No. Telepon/HP Anda" 
                        name="telepon" value="<?php echo $pelanggan->telepon ?>" required>
                    </div>

                    <label class="stext-111 font-weight-bold">Alamat Lengkap</label>
                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="alamat" placeholder="Masukkan Alamat Lengkap Anda"><?php echo $pelanggan->alamat ?></textarea>
                    </div>

                    <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Update Profil
                    </button>
                <?php echo form_close(); ?>
            </div>
</section>