<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg col-lg-8 w-full-md">
                <?php 
                    //notif error / salah akun atau belum regis
                    if($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }
                    if($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                ?>
                <?php 
                //error
                echo validation_errors('<div class="alert alert-warning">', '</div>');
                
                //form
                echo form_open(base_url('masuk'));
                ?>
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        <?php echo $title ?>
                    </h4>

                    <label class="stext-111 font-weight-bold">Email</label>
                    <div class="bor8 m-b-30">
                        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" type="email" placeholder="Masukkan Email Anda" 
                        name="email" value="<?php echo set_value('email') ?>" required>
                    </div>

                    <label class="stext-111 font-weight-bold">Password</label>
                    <div class="bor8 m-b-30">
                        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" type="password" placeholder="Masukkan Password Anda" 
                        name="password" value="<?php echo set_value('password') ?>" required>
                    </div>

                    <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Login
                    </button>
                <?php echo form_close(); ?>
                <div class="text-center">
                    <a class="small" href="<?php echo base_url('registrasi') ?>">Belum Punya Akun? Silakan Registrasi!</a>
                </div>
            </div>
        </div>
    </div>
</section>	