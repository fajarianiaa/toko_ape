<!-- DataTales Example -->
<div class="container-fluid">
    <!-- <button class="btn btn-sm btn-primary mb-3" onclick="window.location.href='user/tambah'"><i class="fas fa-plus fa-sm"></i> Tambah <?php echo $title ?> </button> -->
    <!-- notif -->
    <?php 
      if($this->session->flashdata('sukses')){
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
    ?>
    
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?php echo $title ?></h6>
    </div>    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>ALAMAT</th>
                    <th>TELEPON</th>
                    <!-- <th>AKSI</th> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                $no =1;
                foreach($pelanggan as $pelanggan) :  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $pelanggan->nama_pelanggan ?></td>
                        <td><?php echo $pelanggan->email ?></td>
                        <td><?php echo $pelanggan->alamat ?></td>
                        <td><?php echo $pelanggan->telepon ?></td>
                        <!-- <td>
                          <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                          <a href="<?php echo base_url('admin/user/hapus/'.$user->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td> -->
                    </tr>
                	<?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah User </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/user/tambah' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" placeholder="Masukkan Nama Pengguna" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Masukkan Alamat Email" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo set_value('password') ?>" placeholder="Masukkan Password" required>
            </div>
            <div class="form-group">
                <label>Level Akses</label>
                <select name="role_id" class="form-control">
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
