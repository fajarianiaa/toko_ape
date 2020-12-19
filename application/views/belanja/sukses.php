<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg col-lg-8 w-full-md">
                <?php 
                    if($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                ?>

                <div class="text-center">
                    Terimakasih, pesanan Anda akan segera kami proses.
                </div>
            </div>
        </div>
    </div>
</section>	