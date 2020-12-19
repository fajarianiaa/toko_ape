<body class="bg-gradient-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-2">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-5">Login</h1>
                  </div>
                  
                  <?php 
                    //notif ggal login
                    if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }

                    //notiflogout
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    //form login
                    echo form_open(base_url('login'));
                  ?>

                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan username">
                      <?php echo form_error('username', '<div class="text-danger small ml-2">','</div>'); ?>
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan password">
                      <?php echo form_error('password', '<div class="text-danger small ml-2">','</div>'); ?>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <button class="btn btn-info form-control" type="submit">Login</button>
                 <?php echo form_close(); ?>


                  <hr>
                
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


</html>
